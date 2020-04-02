<?php

namespace App\Http\Controllers;

use App\Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function edit()
    {
        return view('edit');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->only('username'));

        $user_details = auth()->user()->details;
        $user_details->update($request->except('username'));

        return redirect()->route('home')->with('status', 'Your details have been updated.');
    }

    public function showChangePasswordForm()
    {
        return view('auth.passwords.change');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();
        $password = Hash::make($request->input('password'));
        $user->update(['password' => $password]);

        return redirect()->route('home')->with('status', 'Your password has been changed.');
    }

    public function destroy()
    {
        $user = auth()->user();
        auth()->logout();
        $user->delete();

        return redirect()->route('login')->with('status', 'Your account has been deleted.');
    }
}
