<?php

use Illuminate\Database\Seeder;

class DiemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Diem::insert([
            ['diemcc' =>10,'diemtx'=>10,'diemgk'=>10,'diemck'=>10,'diemtb'=>null,'diemrl'=>null,'hesodiemcc'=>null,'hesodiemtx'=>null,'hesodiemgk'=>null,'hesodiemck'=>null,'monhoc_id'=>1,'sinhvien_id'=>1],
        ]);
    }
}
