<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\StoreRequest;
use App\Models\AssoGroupUser;
use App\Models\Group;
use App\Models\User;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $request->groupExists();
        $post = $request->validated();

        $messagesFlash = [];
        //

        //        if(Group::where('name',$this->input('createGroup'))->get()->toArray()==!null)

        if ($post['group'] == 'Non') {
            $nameGroup = $post['createGroup'];
            $group = Group::create(['name' => $nameGroup]);
            $messagesFlash[] = "Vous avez créé le groupe $nameGroup";

        } else {
            $nameGroup = $post['group'];
            $group = Group::where('name', '=', $nameGroup)->first();
        }

        foreach ($post['users_id'] as $userId) {

            $user = User::find($userId);

            if (AssoGroupUser::select()
                ->where('user_id', $userId)
                ->where('group_id', $group->id)
                ->first() == null
            ) {

                AssoGroupUser::create([
                    'user_id' => $userId,
                    'group_id' => $group->id,
                    'Resp_Group' => false,
                ]);

            } else {
                $messagesFlash[] = "$user->name est deja dans ce groupe";
            }
        }

    }
}
