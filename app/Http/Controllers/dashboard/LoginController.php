<?php

namespace App\Http\Controllers\dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\helper\Message;

class LoginController extends Controller {

    /**
     * return login view
     */
    public function index() {
        return view("dashboard.login");
    }

    /**
     * login 
     */
    public function login(Request $request) {
        $error = Message::$LOGIN_ERROR;
        try {
            $credentials = $request->only('email', 'password'); 

            if (Auth::attempt($credentials)) {
                // Authentication passed...
                return redirect('dashboard');
            } 
        } catch (Exception $ex) {}
        return redirect("dashboard/login?status=0&msg=$error");
    }
    
    /**
     * logout 
     * 
     */
    public function logout() {
        Auth::logout();
        return redirect("dashboard/login");
    }

}
