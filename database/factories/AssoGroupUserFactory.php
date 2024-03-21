<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AssoGroupUser>
 */
class AssoGroupUserFactory extends Factory
{
    public int $x = 1;
    //car l'admin est en premier

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $groupIds = Group::all('id')->toArray();
        $groupId = $groupIds[array_rand($groupIds)];
        $userIds = User::all('id')->toArray();

        $userId = $this->selectUser($userIds);

        return [

            'user_id' => $userId['id'],
            'group_id' => $groupId['id'],
            'Resp_Group' => $this->faker->boolean,

        ];
    }

    public function selectUser($userIds)
    {
        $userSelect = $userIds[$this->x];

        $this->x++;

        return $userSelect;

    }
}
