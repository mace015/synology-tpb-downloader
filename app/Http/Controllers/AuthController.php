<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth, Redirect, View;

class AuthController extends Controller
{

	public function loginForm() {

		return View::make('login');

	}

	public function login() {

		$login = Auth::attempt([
			'username' => request()->username,
			'password' => request()->password
		]);

		if (!$login) {
			return Redirect::back()->withErrors('I\'m sorry, we could not find your account!');
		}

		return Redirect::route('index');

	}

	public function logout() {

		Auth::logout();

		return Redirect::back();

	}

}
