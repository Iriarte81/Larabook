<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;

class PagesController extends Controller
{
 public function home() {

    return View::make('pages.home');

 } 
}
