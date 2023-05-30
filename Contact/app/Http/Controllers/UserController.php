<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreate;
use App\Http\Actions\User\Create;
use App\Http\Actions\User\Login;
use App\Http\Actions\User\Logout;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login() {

        return view('user.login');
    }

    public function register() {

        return view('user.register');
    }

    public function authenticate(Request $request) {
        
        return Login::execute($request->only('email', 'password'));
    }

    public function logout() {
        
        return Logout::execute();
    }

    public function create(UserCreate $request) {
        $action = new Create($request->except('password_confirmation'));

        return $action->execute();
    }
}
