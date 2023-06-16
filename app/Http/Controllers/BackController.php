<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Order;
use App\Models\User;
use App\Models\UserAction;
use Illuminate\Http\Request;

class BackController extends MyController
{
    private $data;

    public function home(){

        $this->data['albums'] = Album::count('id');
        $this->data['users'] = User::count('id');
        $this->data['orders'] = Order::count('id');

        $total = Order::all();
        $totalPrice = 0;

        if($total->count() > 0){
            foreach($total as $el){
                $totalPrice += $el->albums->price->price;
            }
        }
        $this->data['totalPrice'] = $totalPrice;

        return view('admin.pages.home', $this->data);
    }

    public function orders(){

        $orders = Order::all();
        $this->data['orders'] = $orders;

        $totalPrice = 0;

        if($orders->count() > 0){
            foreach($orders as $el){
                $totalPrice += $el->albums->price->price;
            }
        }
        $this->data['totalPrice'] = $totalPrice;

        return view('admin.pages.orders', $this->data);
    }

    public function useractions(){

        $useractions = UserAction::all();

        return view('admin.pages.useractions', ['useractions' => $useractions]);
    }
}
