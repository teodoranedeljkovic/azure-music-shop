<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\UserAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RegisterController extends MyController
{
    public function index(){
        return view('client.pages.register');
    }

    public function register(RegisterRequest $request){
        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $username = $request->get('username');
        $email = $request->get('email');
        $password = md5($request->get('password'));

        try{
            $emailExists = User::where('email',$email)->get()->count();
            $usernameExists = User::where('username',$username)->get()->count();

            if($emailExists && !$usernameExists){
                return redirect()->back()->with('regFail','Email taken.');
            }
            else if(!$emailExists && $usernameExists) {
                return redirect()->back()->with('regFail','Username taken.');
            }
            else if($emailExists && $usernameExists){
                return redirect()->back()->with('regFail','Email and username taken.');
            }
            else{
                $user = new User;
                $userAction = new UserAction;

                $user->first_name = $firstName;
                $user->last_name = $lastName;
                $user->username = $username;
                $user->email = $email;
                $user->password = $password;
                $user->role_id = 2;
                $user->save();

                $userAction->user_id = $user->id;
                $userAction->action = 'register';
                $userAction->save();

                $request->session()->put('user',$user);

                return redirect()->route('home');
            }
        }
        catch (\Exception $ex){
            Log::error($ex->getMessage());
            return redirect()->back()->with('regFail','Try again.');

        }
    }
}
