<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Useradmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'admin',
            'jabatan' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'type' => 'Super Admin',
            'password' => Hash::make('admin123'),
        ]);
        DB::table('users')->insert([
            'nama' => 'Yasa',
            'jabatan' => 'Admin',
            'email' => 'admin@gmail.com',
            'type' => 'Admin',
            'password' => Hash::make('admin123'),
        ]);
    }
}