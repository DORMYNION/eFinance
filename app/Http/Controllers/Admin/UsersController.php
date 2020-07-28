<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use App\LoanRepayment;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:admin']);
    }

    public function index()
    {
        $users = Role::where('name', 'User')->first()->users()->get();

        return view('admin.users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user->load('userDocuments', 'userLoans');

        $current_loan = $user->userLoans->last();

        if ($current_loan) {
            $current_loan->load('LoanRepayments');
            $current_loan->load(['loanAmounts' => function($query) {
                $query->where('status', '!=', 'Paid')->latest();
            }]);
            // dd($current_loan);
        }

        return view('admin.users.show', compact('user', 'current_loan'));
    }
}