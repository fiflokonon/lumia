<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }


    public function index()
    {
        if (auth()->user()->isNotClient()){
            return view('pages.dashboard.home');
        }else{
            return view('pages.dashboard.client_home');
        }
    }
}
