<?php

namespace App\Http\Actions\Contact;

use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\DB;

class Create {
    protected $data;

    //
    public function __construct(array $data) {
        $data['users_id'] = session('users_id');
        $this->data = $data;
    }

    public function execute() {
        $data = $this->data;

        try {
            DB::transaction(function() use($data){
                Contact::create($data);
            });

            return redirect()->route('home');
        } catch(Exception $e) {

            return $e->getMessage();
        }
    }
}
