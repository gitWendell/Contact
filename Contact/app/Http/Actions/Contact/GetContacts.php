<?php

namespace App\Http\Actions\Contact;

use App\Models\Contact;

class GetContacts {

    public static function execute() {
        
        return Contact::with('creator')
            ->where('users_id', session('users_id'))
            ->orderBy('name')
            ->get();
    }
}
