<?php

use Illuminate\Database\Seeder;

class SinhviensTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Sinhvien::insert([
            ['masv' => '16ĐC002', 'hosv' => 'Lê Hoàng','tensv'=>'Đạo','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC003', 'hosv' => 'Hoàng Lê Kiên','tensv'=>'Cường','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC004', 'hosv' => 'Phạm Ninh','tensv'=>'Dung','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC005', 'hosv' => 'Nguyễn Ngọc','tensv'=>'Hiền','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC006', 'hosv' => 'Đào Lê Duy','tensv'=>'Hùng','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC007', 'hosv' => 'Nguyễn Thế Quốc','tensv'=>'Khang','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC008', 'hosv' => 'Trần Thị Thanh','tensv'=>'Kiều','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC009', 'hosv' => 'Lý Thị Bích','tensv'=>'Liên','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC0010', 'hosv' => 'Đỗ Quang','tensv'=>'Minh','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],
            ['masv' => '16ĐC0011', 'hosv' => 'Nguyễn Trọng','tensv'=>'Nghĩa','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'1'],

            ['masv' => '16ĐC0023', 'hosv' => 'Nguyễn Đức','tensv'=>'Anh','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0024', 'hosv' => 'Trần Minh','tensv'=>'Ân','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0025', 'hosv' => 'Nguyễn Thành','tensv'=>'Công','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0026', 'hosv' => 'Phạm Công','tensv'=>'Danh','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0027', 'hosv' => 'Nguyễn Văn','tensv'=>'Duy','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0028', 'hosv' => 'Hoàng Thị Mỹ','tensv'=>'Duyên','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0029', 'hosv' => 'Nguyễn Hùng','tensv'=>'Hào','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0030', 'hosv' => 'Lê Thị Thu','tensv'=>'Hiền','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0031', 'hosv' => 'Nguyễn Huy','tensv'=>'Hoàng','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],
            ['masv' => '16ĐC0032', 'hosv' => 'Hoàng Huy','tensv'=>'Hùng','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'2'],

            ['masv' => '16ĐC0053', 'hosv' => 'Nguyễn Hoàng','tensv'=>'Anh','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0055', 'hosv' => 'Vũ Gia','tensv'=>'Bảo','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0056', 'hosv' => 'Nhữ Gia','tensv'=>'Hoàng','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0057', 'hosv' => 'Trần Quốc','tensv'=>'Toản','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0058', 'hosv' => 'Cao Trung','tensv'=>'Thành','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0059', 'hosv' => 'Nguyễn Gia Khánh','tensv'=>'Tùng','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0060', 'hosv' => 'Hoàng Tiến','tensv'=>'Thành','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0061', 'hosv' => 'Trần Hoàng ','tensv'=>'Anh','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0062', 'hosv' => 'Nguyễn Thị Trà','tensv'=>'My','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],
            ['masv' => '16ĐC0063', 'hosv' => 'Phan Quang','tensv'=>'Nam','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'3'],

            ['masv' => '16ĐV001', 'hosv' => 'Võ Thị Hoàng','tensv'=>'Anh','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV002', 'hosv' => 'Nguyễn Hoàng','tensv'=>'Anh','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV003', 'hosv' => 'Lê Văn','tensv'=>'Bảo','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV004', 'hosv' => 'Nguyễn Đức','tensv'=>'Duy','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV005', 'hosv' => 'Huỳnh Lê','tensv'=>'Đăng','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV006', 'hosv' => 'Hoàng Văn','tensv'=>'Đức','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV007', 'hosv' => 'Nguyễn Quang','tensv'=>'Long','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV008', 'hosv' => 'Nguyễn Lê Hoàng ','tensv'=>'Sơn','gioitinh'=>'1','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV009', 'hosv' => 'Nguyễn Thị Thủy','tensv'=>'Tiên','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],
            ['masv' => '16ĐV010', 'hosv' => 'Đặng Thị Hồng','tensv'=>'Như','gioitinh'=>'0','ngaysinh'=>'2017-12-11','quequan'=>'...','lop_id'=>'4'],


        ]);
    }
}
