<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;    

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@gmail.com',
            'role' => '1',
            'status' => 1,
            'hp' => '081291890304',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'nama' => 'User',
            'email' => 'ibnu@gmail.com',
            'role' => '0',
            'status' => 1,
            'hp' => '081291890102',
            'password' => bcrypt('ibnu'),
        ]);
        User::create([
            'nama' => 'Customer',
            'email' => 'rizky2@gmail.com',
            'role' => '2',
            'status' => 2,
            'hp' => '081291890506',
            'password' => bcrypt('rizky'),
        ]);
        
        #data kategori
        Kategori::create([ 
            'nama_kategori' => 'Sayur Bayam', 
        ]); 
        Kategori::create([ 
            'nama_kategori' => 'Tomat', 
        ]); 
        Kategori::create([ 
            'nama_kategori' => 'Bawang Merah', 
        ]); 
        Kategori::create([ 
            'nama_kategori' => 'Bawang Putih', 
        ]); 
        Kategori::create([ 
            'nama_kategori' => 'Cabai Merah', 
        ]); 
    }
}
