<?php 
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory('App\User', 50)->create();
        // TestDummy::times(20)->create('App\Post');
    }
}
