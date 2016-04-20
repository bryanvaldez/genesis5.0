<?php

namespace genesis50\Repositories;

use genesis50\Entities\Ticket;


class ticketRepository extends BaseRepository{
	

	public function getModel()
	{
		return new Ticket();
	}


	protected function selectTicketList()
	{
		return Ticket::selectRaw(
			'tickets.*, '
			. '(select count(*) from ticket_comments where ticket_comments.ticket_id = tickets.id) as num_commnents,'
			. '(select count(*) from ticket_votes where ticket_votes.ticket_id = tickets.id) as num_votes'
		)->with('author');		
	}

	public function paginateLatest()
	{
		return $this->selectTicketList()
			->orderBy('created_at', 'DESC')
			->paginate(20);		
	}

	public function paginateOpen()
	{
		return $this->selectTicketList()
			->where('status', 'open')
			->orderBy('created_at', 'DESC')
			->paginate(20);		
	}

	public function paginateClose()
	{
		return $this->selectTicketList()
			->where('status', 'closed')
			->orderBy('created_at', 'DESC')
			->paginate(20);		
	}

	public function findOrFail($id)
	{
		return  Ticket::findOrFail($id);
	}			
}