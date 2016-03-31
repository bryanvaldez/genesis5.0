<?php 

namespace genesis50\Entities;

class TicketVote extends Entityt 
{
	public function user()
	{
		return $this->belongsTo(User::getClass());
	}

	public function ticket()
	{
		return $this->belongsTo(Ticket::getClass());
	}
	

}
