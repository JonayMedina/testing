<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 19)->create();

        App\User::create([
        	'name' => 'Jonay Medina',
        	'email' => 'jonayjosue@gmail.com',
        	'password' => bcrypt('12345'),
            'role' =>'admin'
        ]);
    }
}
