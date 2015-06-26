<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PublishStatusRequest;
use App\Jobs\PublishStatusJob;
use App\Statuses\StatusRepository;
use View;

class StatusesController extends Controller
{

public function __construct() {
    $this->middleware('auth');
}

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(StatusRepository $repository)
    {

        $statuses = $repository->getAllForUser(Auth::user());

        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PublishStatusRequest $request)
    {
        $this->dispatch(new PublishStatusJob($request->get('body'), Auth::user()->id));

        flash()->message('Your status has been updated');

        return redirect()->refresh();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
