<?php

namespace Database\Seeders;

use App\Models\DataUserModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataUserModel::create([
            'name' => 'Admin System',
            'email' => 'admin@admin.com',
            'date' => now(),
            'phone' => '085159079010',
            'address' => 'JLN. Ciwatu',
            'password' => bcrypt('password'),
        ]);
    }
}