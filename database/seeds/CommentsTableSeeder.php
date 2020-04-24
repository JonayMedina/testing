<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Comment::class, 20)->create()->each(function ($u) {
        	$u->post()->save();
    	});
    }
}
