<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\ForbiddenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\SigninRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function signin(SigninRequest $request)
    {
        $user = User::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if ($user) {
            return [
                'token' => $user->access_token,
                'uuid'  => $user->uuid,
            ];
        } else {
            throw new ForbiddenException('Access denied.');
        }
    }
}
