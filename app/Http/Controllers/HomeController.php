<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $loans = Loan::all();

        dd($loans);
        // return view('home');
    }

    public function home() 
    {
        $loans = Loan::all();

        dd($loans);

    }
}
