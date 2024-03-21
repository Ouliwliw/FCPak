<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\User;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('group.create', [
            'users' => User::whereNot('id', auth()->id())->get(),
            'groups' => Group::all('name'),
        ]);
    }
}
