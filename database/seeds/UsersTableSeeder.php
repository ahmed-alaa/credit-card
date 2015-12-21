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
        DB::table('users')->insert([
            'name' => 'Gandalf The Gray',
            'email' => 'gandalf@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
