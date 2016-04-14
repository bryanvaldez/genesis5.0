<?php 

namespace genesis50\Entities;

class Ticket extends Entity 
{
	protected $fillable = ['title', 'status'];

	public function author()
	{
		return $this->belongsTo(User::getClass(), 'user_id');
	}

	public function comments()
	{
		return $this->hasmany(ticketComment::getClass());
	}

	public function voters()
	{
		return $this->belongsToMany(User::getClass(), 'ticket_votes');
	}

	public function getOpenAttribute()
	{	
		return $this->status == 'open';
	}

}
