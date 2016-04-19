<?php namespace genesis50\Http\Controllers;

use Illuminate\Auth\Guard;
use Illuminate\Support\Facades\Redirect;

use genesis50\Http\Requests;
use genesis50\Http\Controllers\Controller;
use genesis50\Entities\Ticket;
use genesis50\Entities\TicketComment;

use Illuminate\Http\Request;

class TicketsController extends Controller {

	protected function selectTicketList()	
	{
		return Ticket::selectRaw(
			'tickets.*, '
			. '(select count(*) from ticket_comments where ticket_comments.ticket_id = tickets.id) as num_commnents,'
			. '(select count(*) from ticket_votes where ticket_votes.ticket_id = tickets.id) as num_votes'
		)->with('author');
	}


	public function latest()
	{	

		// select t.*,	(select count(*) from ticket_comments c where c.ticket_id = t.id) as num_commnents,
		// 			(select count(*) from ticket_votes v where v.ticket_id = t.id) as num_votes    
		// from tickets t 
		// where 1

		$tickets = $this->selectTicketList()
			->orderBy('created_at', 'DESC')
			->paginate(20);

		return view('tickets/list', compact('tickets'));
	}
	public function popular()
	{
		$tickets = Ticket::all();
		dd($tickets);
		return view('tickets/list');

		$tickets = $this->selectTicketList()
			->orderBy('created_at', 'DESC')
			->paginate(2);
	}
	public function open()
	{
		$tickets = $this->selectTicketList()
			->where('status', 'open')
			->orderBy('created_at', 'DESC')
			->paginate(20);
		return view('tickets/list', compact('tickets'));		
	}
	public function closed()
	{
		$tickets = $this->selectTicketList()
			->where('status', 'closed')
			->orderBy('created_at', 'DESC')
			->paginate(20);
		return view('tickets/list', compact('tickets'));
	}
	public function details($id)
	{
		$ticket = Ticket::findOrFail($id);
		// $comments = TicketComment::select('ticket_comments.*', 'users.name')
		// 	->join('users', 'ticket_comments.user_id', '=', 'users.id')
		// 	->where('ticket_id', $id)
		// 	->get();
		// return view('tickets/details', compact('ticket', 'comments'));
		return view('tickets/details', compact('ticket'));
	}

	public function create()
	{
		return view('tickets.create');
	}

	public function store(Request $request, Guard $auth)
	{
		$this->validate($request, [
			'title'		=>	'required|max:120'
		]);

		$ticket = $auth->user()->tickets()->create([
			'title'		=>	$request->get('title'),
			'status'	=>	'open'
		]);

		// $ticket = new Ticket();
		// $ticket->title = $request->get('title');
		// $ticket->status = 'open';
		// $ticket->user_id = $auth->user()->id;
		// $ticket->save();

		return Redirect::route('tickets.details', $ticket->id);
	}


}
 