<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function dashboard()
    {

        $user = Auth::user();

        if ($user->hasRole("admin")) {

            return view("admin.dashboard");

        } elseif ($user->hasRole("user")) {

            return view("user.dashboard");
        }
    }
}
