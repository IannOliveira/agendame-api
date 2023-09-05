<?php

namespace App\Http\Controllers\Me;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;

class MeController extends Controller
{
    public function show() {

        $user = auth()->user();
        $user->loadMissing('roles');

        return new UserResource($user);
    }
}
