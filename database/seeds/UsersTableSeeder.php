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
//        password=123123
        \App\User::insert([
            ['name' => 'admin', 'email' => 'admin@gmail.com', 'password' => '$2y$10$xRFsfZBnRzl8sqiTREW7.ezlVb/Dd9DbcuQGxPjebMRgQKCZbbhv.', 'picture' => 'user.png','level'=>0],
            ['name' => 'user', 'email' => 'user@gmail.com', 'password' => '$2y$10$xRFsfZBnRzl8sqiTREW7.ezlVb/Dd9DbcuQGxPjebMRgQKCZbbhv.', 'picture' => 'user.png','level'=>1],
        ]);
    }
}
