<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request){
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        $user = User::query()->create($input);

        UserRegistered::dispatch($user);

        return new UserResource($user);
    }
}
