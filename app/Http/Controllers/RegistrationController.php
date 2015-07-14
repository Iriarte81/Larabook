<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use View;
use Redirect;
use Input;
use App\User;
use Auth;
use App\Jobs\RegisterUserJob;
use App\Http\Requests;
use Illuminate\Support\Facades\Event;
use App\Events\UserRegistered;

class RegistrationController extends Controller
{


    // show a form to register the user

    public function create()
    {
        return View::make('registration.create');
    }

    // create a new larabook user
     public function store(Request $request)
    {

       $this->validate($request, [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
        ]);

        extract($request->only('username', 'email', 'password'));
        $user = $this->dispatch(new RegisterUserJob($username, $email, $password));

        // $user = User::create(Input::only('username', 'email', 'password'));
        Auth::login($user);

        $user = Auth::user();
        Event::fire(new UserRegistered($user));

        flash()->overlay('Glad to have you as a new Larabook member');

        return Redirect::home();
    }


}
