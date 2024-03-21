<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enum\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(EventSeeder::class);
        $this->call(RoleSeeder::class);

        $respRole = Role::firstWhere('name', RoleEnum::RESP_GROUP->value);

        \App\Models\User::factory(10)->create()
            ->each(
                fn (User $user) => $user->assignRole($respRole)
            );
        //        \App\Models\Group::factory(10)->create();

        $userRole = Role::firstWhere('name', RoleEnum::USER->value);

        \App\Models\User::factory(10)->create()
            ->each(
                fn (User $user) => $user->assignRole($userRole)
            );

        \App\Models\User::factory()->create([
            'name' => 'Aaadmin',
            'email' => 'admin@test.com',
        ])
            ->assignRole(Role::firstWhere('name', RoleEnum::ADMIN->value));

        $groupNames = ['GROUP1', 'GROUP2', 'GROUP3'];
        foreach ($groupNames as $groupName) {
            \App\Models\Group::factory(1)->create([
                'name' => $groupName,
                'description' => fake()->text,
            ],
            );
        }

        \App\Models\AssoGroupUser::factory(20)
            ->create();
    }
}
