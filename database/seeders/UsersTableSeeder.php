<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filepath = storage_path('data/users.php');
        require $filepath;
        $storesPath = storage_path('data/stores.php');
        require $storesPath;
        $usersData = [];
        foreach ($users as $user) {
            $collectStores = collect($stores);
            $whereHouse = $collectStores->firstWhere('id',$user['store_id']);
            $warehouse = Warehouse::query()->where('name',$whereHouse['name'])->first();
            $role = Role::first();
            $usersData[] = [
                'name'=>$user['name'],
                'email'=>'default1@email.com',
                'password'=>$user['password'],
                "phone"=>$user['mobile'],
                "role_id"=>$role->id,
                "warehouse_id"=>$warehouse->id,
                "is_active"=>1,
                "is_deleted"=>0
            ];
        }
        User::query()->insert($usersData);
    }
}
