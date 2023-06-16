<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends MyController
{
    public function index(Request $request){
        return view('client.pages.order');
    }

    public function order(OrderRequest $request){
        $id = $request->get('id');

        $cartItems = session()->get("cartItems");

        $country = $request->get('country');
        $city = $request->get('city');
        $address = $request->get('address');
        $phone = $request->get('phone');

        if(!$cartItems) {
            $cartItems = [];
        }

        try{
            $order = new Order();

            foreach($cartItems as $index => $item) {
                $order->user_id = $request->session()->get('user')->id;
                $order->album_id = $item->album->id;
                $order->quantity = $item->quantity;
                $order->country = $country;
                $order->city = $city;
                $order->address = $address;
                $order->phone = $phone;

                $order->save();
            }

            $request->session()->forget('cartItems');
            return redirect()->route('home.albums')->with('order','Successfully ordered.');
        }
        catch (\Exception $ex){
            Log::error($ex->getMessage());
            return redirect()->route('home.albums')->with('order','Error while ordering.');
        }
        //dd($cartItems);

    }
}
