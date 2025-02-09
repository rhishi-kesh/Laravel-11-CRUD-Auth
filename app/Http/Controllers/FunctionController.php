<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FunctionController extends Controller
{
    function index() {
        $users = User::get();
        return view('welcome', compact('users'));
    }

    function add() {

        return view('insert');
    }

    function addPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(rand()),
            'created_at' => Carbon::now()
        ]);

        return back();
    }

    function edit($id) {
        $user = User::findOrFail($id);
        return view('edit', compact('user'));
    }

    function editPost(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now()
        ]);

        return to_route('index');
    }

    function delete($id) {
        User::findOrFail($id)->delete();
        return back();
    }








    function login() {
        return view('login');
    }

    function loginPost(Request $request) {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('index');
        }
        return back()->withErrors([
            'error' => 'Email/Password is invalid',
        ]);


    }

    function logout(Request $request) {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
