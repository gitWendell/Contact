<?php

namespace App\Http\Actions\Contact;

use App\Http\Resources\SearchedContactCollection;
use App\Models\Contact;

class GetContactsBySearch {

    public static function execute($search) {
        
        $data = Contact::where(function ($query) use ($search) {
            $query->orWhereRaw('LOWER(name) LIKE ?', ['%' . strtolower($search) . '%'])
                ->orWhereRaw('LOWER(company) LIKE ?', ['%' . strtolower($search) . '%'])
                ->orWhereRaw('LOWER(phone) LIKE ?', ['%' . strtolower($search) . '%'])
                ->orWhereRaw('LOWER(email) LIKE ?', ['%' . strtolower($search) . '%']);
        })->where('users_id', session('users_id'))->get();

        return SearchedContactCollection::collection($data);
    }
}
