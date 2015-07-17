<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Jobs\LeaveCommentOnStatusJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentsController extends Controller
{

    /**
     * Leave new comment
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //fetch the input

        $input = array_add(Input::get(), 'user_id', Auth::id());

        //execute a command to leave a comment on a status
        $this->dispatch(new LeaveCommentOnStatusJob($input));

        //go back
        return redirect()->back();
    }


}
