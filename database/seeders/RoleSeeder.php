<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['user', 'admin', 'superadmin'];
        foreach($roles as $role) {
            Role::insert([
                'role_name' => $role
            ]);
        }
    }
}
