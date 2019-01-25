<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoggedInController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function control()
    {
        return view('pages.control');
    }
}
