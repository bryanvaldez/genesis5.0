<?php namespace genesis50\Http\Controllers;

use genesis50\Http\Requests;
use genesis50\Http\Controllers\Controller;
use genesis50\Entities\TicketComment;
use genesis50\Entities\Ticket;

use Illuminate\Http\Request;
use Illuminate\Auth\Guard;

class CommentsController extends Controller {

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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function submit($id, Request $request, Guard $auth)
	{
		$this->validate($request, [
			'comment'	=>	'required|max:250',
			'link'		=>	'url'
		]);

		$comment = new TicketComment($request->only(['comment', 'link']));
		$comment->user_id = $auth->id();

		$ticket = Ticket::findOrFail($id);
		$ticket->comments()->save($comment);

		session()->flash('success', 'Tu comentario fue guardado exitosamente');
		return redirect()->back();
	}
}
