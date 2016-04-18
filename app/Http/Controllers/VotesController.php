<?php namespace genesis50\Http\Controllers;

use genesis50\Http\Requests;
use genesis50\Http\Controllers\Controller;
use Illuminate\Auth\Guard;

use Illuminate\Http\Request;
use genesis50\Entities\Ticket;

class VotesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store()
	{
		//
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
		$ticket = Ticket::findOrFail($id);
		currentUser()->unvote($ticket);
		return redirect()->back();
	}

	/**
	 * Submit the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function submit($id, Guard $auth)
	{
		$ticket = Ticket::findOrFail($id);
		//$data =  auth()->user()->vote($ticket);
		currentUser()->vote($ticket);

		return redirect()->back();
	}


}
