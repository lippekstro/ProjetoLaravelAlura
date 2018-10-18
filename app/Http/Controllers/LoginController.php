<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function form(){
        return view('form_login');
    }

    public function login(){
        $credenciais = Request::only('email', 'senha');
        if(Auth::attempt($credenciais)){

        }
    }
}
