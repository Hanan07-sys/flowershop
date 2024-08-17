<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function change_password()
    {
        $user = Auth::user();
        return view('change_password', compact('user'));
    }
    
    public function save_password(Request $request){

        $request->validate([
            'new_password' => 'required|min:8|confirmed'
        ]);
    
        
        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        $request->session()->flash('massage', 'Berhasil mengubah password');
        return Redirect::back();
    }
}
