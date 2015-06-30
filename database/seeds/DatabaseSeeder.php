<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    
    /*
    @var array
     */
    protected $tables = [
        'users',
        'statuses'
    ];

    /*
    @var array
     */
    
    protected $seeders = [
    'UsersTableSeeder',
    'StatusesTableSeeder'
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call('UserTableSeeder');
        $this->cleanDatabase();

        foreach ($this->seeders as $seedClass) {
            $this->call($seedClass);
        }

        Model::reguard();

        /*
            Clean out the database for a new seed generation
         */
    }   private function cleanDatabase()
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');

            foreach ($this->tables as $table) {
                DB::table($table)->truncate();
            }

            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory('App\User', 50)->create();
        // TestDummy::times(20)->create('App\Post');
    }
}

class StatusesTableSeeder extends Seeder
{
    public function run()
    {
        factory('App\Statuses\Status', 50)->create(); 
        // TestDummy::times(20)->create('App\Post');
    }
}