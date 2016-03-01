<?php namespace genesis50\Http\Controllers;

use genesis50\Http\Requests;
use genesis50\Http\Controllers\Controller;
use genesis50\Entities\Ticket;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	public function latest()
	{	
		$tickets = Ticket::orderBy('created_at', 'DESC')->get();
		return view('tickets/list', compact('tickets'));
	}
	public function popular()
	{
		return view('tickets/list');
	}
	public function open()
	{
		return view('tickets/list');		
	}
	public function closed()
	{
		return view('tickets/list');
	}
	public function details($id)
	{
		$ticket = ticket::findOrFail($id);
		return view('tickets/details', compact('ticket'));
	}
}
 