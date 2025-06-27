<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Admin",
            'email' => "admin@tenant.com",
            'password' => bcrypt("password"),
            'tenant_id' => 1,
        ]);

        User::create([
            'name' => "Admin 2",
            'email' => "admin2@tenant.com",
            'password' => bcrypt("password"),
            'tenant_id' => 2,
        ]);
    }
}
