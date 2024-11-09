<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Azs;

class AzsSeeder extends Seeder
{
    public function run()
    {
        Azs::insert([
            ['code' => 'AZS001', 'address' => 'Main St, 1', 'owner' => 'Shell', 'fuel_stock' => 5000, 'fuel_price' => 1.25],
            ['code' => 'AZS002', 'address' => 'Green St, 10', 'owner' => 'BP', 'fuel_stock' => 3000, 'fuel_price' => 1.20],
            ['code' => 'AZS003', 'address' => 'Lake Rd, 23', 'owner' => 'Shell', 'fuel_stock' => 7000, 'fuel_price' => 1.30],
            ['code' => 'AZS004', 'address' => 'Hill Ave, 5', 'owner' => 'Lukoil', 'fuel_stock' => 10000, 'fuel_price' => 1.15],
            ['code' => 'AZS005', 'address' => 'River St, 3', 'owner' => 'BP', 'fuel_stock' => 2000, 'fuel_price' => 1.28],
        ]);
    }
}
