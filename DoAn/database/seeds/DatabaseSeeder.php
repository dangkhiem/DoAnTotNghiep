<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name'=> 'khiem1',
            'email' => 'khiem1@gmail.com',
            'password' => bcrypt('123456'),
            'phone' => '123456789',
            'role_id'=>'2',
        ],
            [
                'name'=> 'khiem2',
                'email' => 'khiem2@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '123456789',
                'role_id'=>'2',],
            [
            'name'=> 'khiem3',
                'email' => 'khiem3@gmail.com',
                'password' => bcrypt('123456'),
                'phone' => '123456789',
                'role_id'=>'2',],
         [
             'name'=> 'khiem4',
             'email' => 'khiem4@gmail.com',
             'password' => bcrypt('123456'),
             'phone' => '123456789',
             'role_id'=>'2',]
            );
    }
}
