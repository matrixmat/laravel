<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  /**
   * Create user
   *
   * @param  [string] name
   * @param  [string] email
   * @param  [string] password
   */
  public function register(Request $request)
{
    try {
        $request->validate([
            'username' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
        ]);

        $user = new User([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user->save()) {
            return redirect('/auth/login-basic')->with('success', 'Registration successful! Please log in.');
        } else {
            return back();
        }
    } catch (ValidationException $e) {
        // If the validation fails (e.g., email already exists), catch the exception
        return back()->withErrors(['email' => 'The email address is already taken.'])->withInput();
    }
}

  /**
* Login user and create token
*
* @param  [string] email
* @param  [string] password
* @param  [boolean] remember_me
*/
public function login(Request $request)
{
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    $credentials = request(['email', 'password']);
    if (Auth::attempt($credentials)) {
        return redirect('/');
    } else {
        return redirect('/auth/login-basic')->with('error', 'Invalid credentials. Please try again.');
    }
}


/**
* Logout user (Revoke the token)
*
*/
public function logout(Request $request)
{
  $request->user()->tokens()->delete();

  return redirect('/auth/login-basic');
}
}
