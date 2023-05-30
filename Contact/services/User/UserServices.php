<?php

namespace Services\User;

use App\Models\User;
use Illuminate\Validation\ValidationException;

class UserServices {

    public function validate_login(String $email, String $password) {
        $user = User::where('email', $email)->first();

        if(!$user) throw ValidationException::withMessages(['email' => 'User not found.']);

        if (!password_verify($password, $user->password)) throw ValidationException::withMessages([
            'password' => 'Invalid password.'
        ]);
        
        return $user;
    }
    
}