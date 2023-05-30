<?php

namespace App\Http\Actions\User;

class Logout {

    public static function execute() {
        session()->invalidate();

        return redirect('login');
    }
}
