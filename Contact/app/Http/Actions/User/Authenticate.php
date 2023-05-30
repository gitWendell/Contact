<?php

namespace App\Http\Actions\User;

class Authenticate {

    public static function execute(array $data) {

        return session([
            'users_id' => $data['id'],
            'users_name' => $data['name'],
            'users_email' => $data['email'],
        ]);
    }
}
