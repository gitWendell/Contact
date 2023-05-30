<?php

namespace App\Http\Actions\Contact;

use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\DB;

class Delete {
    protected $id;

    //
    public function __construct(int $id) {
        $this->id = $id;
    }

    public function execute() {
        $id = $this->id;

        try {
            return DB::transaction(function() use( $id){
                Contact::where('id', $id)->delete();
            });

        } catch(Exception $e) {

            return $e->getMessage();
        }
    }
}
