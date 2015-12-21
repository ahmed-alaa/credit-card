<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        //call the seeds for the user table to be used.
        $this->call(UsersTableSeeder::class);
        Model::reguard();
    }
}
