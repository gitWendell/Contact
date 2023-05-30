<?php

namespace App\Http\Actions\User;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class Create {
    protected $data;

    //
    public function __construct(array $data) {
        $data['password'] = Hash::make($data['password']);
        $this->data = $data;
    }

    public function execute() {
        $data = $this->data;

        try {
            DB::transaction(function() use($data){
                $result = User::create($data);
                
                Authenticate::execute($result->toArray());
            });

            return view('success-registration');
        } catch(Exception $e) {

            return $e->getMessage();
        }
    }
}
