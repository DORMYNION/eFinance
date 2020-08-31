<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Controllers\Controller;
use App\Loan;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:staff']);
    }

    public function index()
    {
        $users = User::where('mobile_no_1', '!=', '')->latest('created_at')->get();

        return view('admin.users.index', compact('users'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('admin.users.index');
    }

    public function show(User $user)
    {
        $user->load('userDocuments', 'userLoans');

        $current_loan = $user->userLoans->last();

        if (isset($current_loan)) {
            $current_loan->load('LoanRepayments');
            $current_loan->load(['loanAmounts' => function($query) {
                $query->where('status', '!=', 'Paid')->latest()->first();
            }]);
        }

        // dd($current_loan->repayment_option);

        return view('admin.users.show', compact('user', 'current_loan'));
    }
}