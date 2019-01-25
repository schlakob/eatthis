<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
    public function dashboard()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('pages/dashboard')->with('recipes', $user->recipes);
    }
}
