<?php

namespace App\Http\Actions\User;

use Services\User\UserServices;

class Login {

    public static function execute(array $credentials) {
        $services = new UserServices;

        $user = $services->validate_login($credentials['email'], $credentials['password']);

        Authenticate::execute($user->toArray());
        return redirect()->route('home');
    }
}
