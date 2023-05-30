<?php

namespace App\Http\Actions\Contact;

use App\Models\Contact;
use Exception;
use Illuminate\Support\Facades\DB;

class Update {
    protected $id;
    protected $data;

    //
    public function __construct(array $data, int $id) {
        $this->data = $data;
        $this->id = $id;
    }

    public function execute() {
        $id = $this->id;
        $data = $this->data;

        try {
            DB::transaction(function() use($data, $id){
                Contact::where('id', $id)->update($data);
            });

            return redirect()->route('home');
        } catch(Exception $e) {

            return $e->getMessage();
        }
    }
}
