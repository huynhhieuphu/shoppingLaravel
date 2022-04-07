<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => '12345678',
            'phone' => '0123456789',
            'email' => 'admin@domain.com',
            'role' => 1, // 1- super admin
            'first_name' => 'admin',
            'last_name' => 'super',
            'avatar' => null,
            'gender' => 1, // 1- male
            'birthday' => '1970-01-01',
            'address' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
            'last_login' => null
        ]);
    }
}
