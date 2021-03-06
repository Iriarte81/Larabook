<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;
use Auth;
use Flash;
use Redirect;

class SessionsController extends Controller
{
    

    /**
     * Display a form for signing in
     *
     * @return Response
     */
    public function create()
    {
        return View::make('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(\App\Http\Requests\SignInRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->has('remember'))) {
            flash()->success('Welcome Back!');
            return redirect()->intended(route('statuses_path'));
        }
        flash()->error('Invalid Credentials. We were unable to sign you in. Please check your credentials and try again!');
        return redirect()->route('login_path')->withInput();

    }

    public function destroy() {

        Auth::logout();

        Flash::message('You have now been logged out');

        return Redirect::home();

    }

}