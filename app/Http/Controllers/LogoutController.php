<?php

namespace App\Http\Controllers;

use App\Models\UserAction;
use Illuminate\Http\Request;

class LogoutController extends MyController
{
    public function logout(Request $request){
        $userAction = new UserAction;

        $userAction->user_id = session()->get('user')->id;
        $userAction->action = 'logout';
        $userAction->save();

        $request->session()->remove('user');
        return redirect()->route('home');
    }
}
