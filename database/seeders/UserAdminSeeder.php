<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'avatar' => 'https://petcdn.petvn.vn/public/hienl/pug2.JPG',
            'phone' => '0989480463',
            'password' => bcrypt('admin')
        ]);
    }
}
