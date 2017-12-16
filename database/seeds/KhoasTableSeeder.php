<?php

use Illuminate\Database\Seeder;

class KhoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Khoa::insert([
            ['makhoa' => 'CNTT', 'tenkhoa' => 'Công nghệ thông tin'],
            ['makhoa' => 'ĐHVT', 'tenkhoa' => 'Đại học viễn thông'],
        ]);
    }
}
