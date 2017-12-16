<?php

use Illuminate\Database\Seeder;

class MonhocsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Monhoc::insert([
            ['mamon' => 'ĐT5607', 'tenmon' => 'Kỹ năng mềm','sotinchi'=>2,'sotiet'=>30],
            ['mamon' => 'ĐT5502', 'tenmon' => 'Đường lối cách mạng của ĐCS VN','sotinchi'=>3,'sotiet'=>45],
            ['mamon' => 'ĐT1302', 'tenmon' => 'Tiếng Anh cơ bản 2','sotinchi'=>3,'sotiet'=>45],
            ['mamon' => 'ĐT1202', 'tenmon' => 'Vật lý 2 và thí nghiệm','sotinchi'=>3,'sotiet'=>45],
            ['mamon' => 'ĐT4104', 'tenmon' => 'Toán rời rạc','sotinchi'=>2,'sotiet'=>30],
            ['mamon' => 'ĐT4204', 'tenmon' => 'Cơ sở dữ liệu','sotinchi'=>3,'sotiet'=>45],
            ['mamon' => 'ĐT3306', 'tenmon' => ' Bóng chuyền ','sotinchi'=>1,'sotiet'=>45],


            ['mamon' => 'ĐT1108', 'tenmon' => 'Toán kỹ thuật','sotinchi'=>2,'sotiet'=>30],
            ['mamon' => 'ĐT2101', 'tenmon' => 'Cấu kiện điện tử','sotinchi'=>2,'sotiet'=>30],
            ['mamon' => 'ĐT2201', 'tenmon' => 'Lý thuyết mạch','sotinchi'=>2,'sotiet'=>30],
            ['mamon' => 'ĐT3308', 'tenmon' => 'Cầu lông ','sotinchi'=>1,'sotiet'=>45],

        ]);
    }
}
