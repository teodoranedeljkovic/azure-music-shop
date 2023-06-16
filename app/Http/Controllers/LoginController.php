<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends MyController
{
    public function index(){
        return view('client.pages.login');
    }

    public function login(LoginRequest $request){
        try{
            $email = $request->input('email');
            $password = md5($request->input('password'));

            $user = User::where('email',$email)
                    ->where('password',$password)
                    ->first();

            if($user){
                $request->session()->put('user',$user);

                $userAction = new UserAction;

                $userAction->user_id = $user->id;
                $userAction->action = 'login';

                $userAction->save();

                if($user->role_id == 1){
                    return redirect()->route('admin.home');
                }
                else{
                    return redirect()->route('home');
                }
            }

            return back()->with('loginFail', 'Username or password incorrect.');
        }
        catch(\Exception $ex){
            Log::error($ex->getMessage());
            return back()->with('loginFail', $ex);
        }
    }
}
