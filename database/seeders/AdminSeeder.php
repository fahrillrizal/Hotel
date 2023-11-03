<?php

namespace Database\Seeders;
use App\models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'nama'     => 'Administrator',
            'email'    => 'admin@gmail.com',
            'role'     => 'admin',
            'password' => bcrypt('12345678'),
        ]);
    
        Admin::create([
            'nama'     => 'Resepsionis',
            'email'    => 'resepsionis@gmail.com',
            'role'    => 'resepsionis',
            'password' => bcrypt('12345678'),
        ]);
    
        Admin::create([
            'nama'     => 'Fahril Rizal',
            'email'    => 'fahril@gmail.com',
            'role'     => 'user',
            'password' => bcrypt('12345678'),
        ]);
    }
}
