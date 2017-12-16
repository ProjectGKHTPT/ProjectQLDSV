<?php

use Illuminate\Database\Seeder;

class Monhoc_LopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('monhoc_lop')->insert([
            ['monhoc_id' => '1', 'lop_id' => '1'],
            ['monhoc_id' => '1', 'lop_id' => '2'],
            ['monhoc_id' => '1', 'lop_id' => '3'],
            ['monhoc_id' => '1', 'lop_id' => '4'],

            ['monhoc_id' => '2', 'lop_id' => '1'],
            ['monhoc_id' => '2', 'lop_id' => '2'],
            ['monhoc_id' => '2', 'lop_id' => '3'],
            ['monhoc_id' => '2', 'lop_id' => '4'],

            ['monhoc_id' => '3', 'lop_id' => '1'],
            ['monhoc_id' => '3', 'lop_id' => '2'],
            ['monhoc_id' => '3', 'lop_id' => '3'],
            ['monhoc_id' => '3', 'lop_id' => '4'],

            ['monhoc_id' => '4', 'lop_id' => '1'],
            ['monhoc_id' => '4', 'lop_id' => '2'],
            ['monhoc_id' => '4', 'lop_id' => '3'],
            ['monhoc_id' => '4', 'lop_id' => '4'],

            ['monhoc_id' => '5', 'lop_id' => '1'],
            ['monhoc_id' => '5', 'lop_id' => '2'],
            ['monhoc_id' => '5', 'lop_id' => '3'],

            ['monhoc_id' => '6', 'lop_id' => '1'],
            ['monhoc_id' => '6', 'lop_id' => '2'],
            ['monhoc_id' => '6', 'lop_id' => '3'],

            ['monhoc_id' => '7', 'lop_id' => '1'],
            ['monhoc_id' => '7', 'lop_id' => '2'],
            ['monhoc_id' => '7', 'lop_id' => '3'],

            ['monhoc_id' => '8', 'lop_id' => '4'],
            ['monhoc_id' => '9', 'lop_id' => '4'],
            ['monhoc_id' => '10', 'lop_id' => '4'],
            ['monhoc_id' => '11', 'lop_id' => '4'],
        ]);
    }
}
