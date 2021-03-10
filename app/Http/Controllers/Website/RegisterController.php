<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\helper\Message;
use App\helper\Helper; 
use Session;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        return view("website.register");
    }

    ///login form 
    public function login(Request $request)
    {
        
            $credentials = $request->only('email', 'password'); 
            $user = User::where('email', $request->email)->where("password", $request->password)->where('active', '1')->first();
           
           
            $credentials = $request->only('email', 'password'); 
 
            
            if (Auth::attempt($credentials)) {
               if (Auth::user()->active) {
               
                    Session::flash('success', 'You Login Successfuly  :)');
                    // Authentication passed...
                    return redirect('home');
               }
            } 
            Auth::logout();
            Session::flash('error', 'Make Sure your data is correct or your account not active :)');
        
            return redirect('register');
       
    }
    /// logout 
    public function logout()
    {
        Auth::logout();
        Session::flash('success', 'You Logout Successfuly  :)');
        
        return redirect('home');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = validator()->make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users',
           
            'password' => 'required|min:8', 
        ], [
            "name.required" => 'name is required',
            "email.required" => 'email is required',
            "password.required" => 'password is required',
            "password.min" => 'your password must be at least 8 characters',
            'email.unique' => 'email already exist :)',
        ]);

        if ($validator->fails()) {

            Session::flash('error', $validator->errors()->first());
            return redirect('register');
              
        }
     
        $data = $request->all();
       
        $user = User::create($data); 
        $user->password = bcrypt($data['password']);
        $code = time();
        
        $user->confirm_code = $code;
        $user->update();
        session(["user" => $user->id, "confirm_code" => $code]);
        
        Helper::sendMail($user->email, "email confirmation", "please visit <a href='" . url('/confirm/') . "/" . $code . "' >" . url('/confirm/') . "/" . $code . "</a> to confirm your account", "admin@nogal-furnture.com");
        
        Session::flash('success', 'You Register Successfuly check your mail to confirm your account :)');
        return redirect('home');

     
        
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
