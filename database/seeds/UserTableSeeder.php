<?php
use Illuminate\Database\Seeder;
use genesis50\Entities\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder{

	public function run()
	{
		$this->createAdmin();
		$this->createUsers(50);
	}

	private function createAdmin()
	{
		User::create([
			'name'		=> 	'bryan valdez',
			'email' 	=> 	'bryan@gmail.com',
			'password' 	=>	bcrypt('admin')
		]);
	}

	private function createUsers($total)
	{
		$faker = Faker::create();

		for($i = 1; $i <= $total;  $i++)
		{
			User::create([
				'name'		=> 	$faker->name,
				'email' 	=> 	$faker->email,
				'password' 	=>	bcrypt('secret')				
			]);
		}
	}

}