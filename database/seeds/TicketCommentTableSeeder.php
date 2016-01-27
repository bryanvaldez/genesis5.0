<?php

use genesis50\Entities\TicketComment;
use Faker\Factory as Faker;
use Faker\Generator;

class TicketCommentTableSeeder extends BaseSeeder{

    protected $total = 250;


    public function getModel() {
        
        return new TicketComment;
    }
    
    public function getDummyData(Generator $faker, array $customValues = array()) {
        
        return[
            'user_id'   => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id,
            'comment'   => $faker->paragraph(),
            'link'      => $faker->randomElement(['', '', $faker->url]) 
        ];
    }    
    
}
