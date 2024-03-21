<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enum\RoleEnum;
use App\Models\AssoGroupUser;
use App\Models\Group;
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
        
        $respRole = Role::firstWhere('name', RoleEnum::RESP_GROUP->value);

        User::factory(10)->create()
            ->each(
                fn (User $user) => $user->assignRole($respRole)
            );
            
            $userRole = Role::firstWhere('name', RoleEnum::USER->value);
            
            User::factory(10)->create()
            ->each(
                fn (User $user) => $user->assignRole($userRole)
            );
            
            User::factory()->create([
                'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => 'password',
            ])
            ->assignRole(Role::firstWhere('name', RoleEnum::ADMIN->value));
            
            $groupNames = ['GROUP1', 'GROUP2', 'GROUP3'];
        foreach ($groupNames as $groupName) {
            Group::factory(1)->create(
                [
                    'name' => $groupName,
                    'description' => fake()->text,
                ],
            );
        }
        
        AssoGroupUser::factory(20)
        ->create();
        
        $this->call(EventSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
