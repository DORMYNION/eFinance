<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'can:user']);
    }

    public function index()
    {
        $user = Auth::user();

        $user->load(['userPayments' => function($query) {
            $query->latest()->take(3)->get();
        }]);

        return view('user.home', compact('user'));
    }
}