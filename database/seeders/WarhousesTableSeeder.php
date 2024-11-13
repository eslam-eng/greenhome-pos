<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarhousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filepath = storage_path('data/stores.php');
        require $filepath;
        $warehousesData = [];
        foreach ($stores as $store) {
            $warehousesData[] = [
                'name' => $store['name'],
                'address' => $store['name'],
                'is_active' => 1,
            ];
        }
        Warehouse::query()->insert($warehousesData);
    }
}
