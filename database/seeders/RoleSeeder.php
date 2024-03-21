<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RoleEnum::cases() as $roleEnum) {
            Role::create([
                'name' => $roleEnum->value,

            ]

            );
        }
        Permission::create([
            'name' => 'group.*',
        ])->assignRole(
            Role::firstWhere('name', RoleEnum::RESP_GROUP->value)
        );
    }
}
