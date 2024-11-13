<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\CustomerGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filepath = storage_path('data/customers.php');
        require $filepath;
        $customer_group_id = CustomerGroup::query()->first()->id;
        $customersData = [];
        foreach ($customers as $customer) {
            $customersData[] = [
                'customer_group_id' => $customer_group_id,
                'name' => $customer['name'],
                'phone_number' => $customer['mobile'],
                'address' => $customer['address'] ?? 'Local',
                'city' => $customer['address']?? 'Local',
                'is_active' => 1,
            ];
        }
        Customer::query()->insert($customersData);
    }
}
