<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;
use Redirect;

class RegistrationController extends Controller
{
 
    // show a form to register the user

    public function create()
    {
        return View::make('registration.create');
    }

    // create a new larabook user
     public function store()
    {
        return Redirect::home();
    }


}
