<?php 

namespace genesis50\Entities;


class TicketComment extends Entity
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
