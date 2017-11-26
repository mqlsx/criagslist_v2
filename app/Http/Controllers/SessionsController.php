<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
       $credentials = $this->validate($request, [
           'username' => 'required|max:255',
           'password' => 'required'
       ]);

       if (Auth::attempt($credentials)) {
           session()->flash('success', 'welcome back！');
           return redirect()->route('users.show', [Auth::user()]);
       } else {
           session()->flash('danger', 'sorry, either your username or password is not correct');
           return redirect()->back();
       }
    }

    public function destroy()
    {
        Auth::logout();
        session()->flash('success', 'Log out successfully！');
        return redirect('login');
    }
}