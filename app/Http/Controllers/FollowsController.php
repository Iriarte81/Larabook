<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Jobs\FollowUserJob;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Redirect;

class FollowsController extends Controller
{

    /**
     * Follow a user.
     *
     * @return Response
     */
    public function store()
    {
        $userId = array_add(Input::get(), 'userId', Auth::id());
        $this->dispatch(new FollowUserJob($userId));
        Flash::success('You are now following this user.');
        return Redirect::back();
    }


    /**
     *  Unfollow a user
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
