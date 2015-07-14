<?php 

use Illuminate\Database\Seeder;


class StatusesTableSeeder extends Seeder
{
    public function run()
    {
		factory('App\Statuses\Status', 500)->create();
        // TestDummy::times(20)->create('App\Post');
    }
}
