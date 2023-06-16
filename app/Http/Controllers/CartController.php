<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class CartController extends MyController
{
    public function index(){
        return view("client.pages.cart");
    }

    public function store(Request $request){
        $id = $request->get('id');

        $album = Album::find($id);

        $cartItems = session()->get("cartItems");

        if(!$cartItems) {
            $cartItems = [];
        }

        $existingIndex = null;

        foreach($cartItems as $index => $item) {
            if($item->album->id == $id) {
                $existingIndex = $index;
                break;
            }
        }

        if($existingIndex !== null) {
            $cartItems[$existingIndex]->quantity++;
        }
        else {
            $cartItem = new \stdClass();
            $cartItem->quantity = 1;
            $cartItem->album = $album;

            array_push($cartItems, $cartItem);
        }

        session()->put("cartItems", $cartItems);

    }

    public function destroy(Request $request) {

        $id = $request->get('id');
        $existingIndex = null;

        $cartItems = session()->get("cartItems");

        if(!$cartItems) {
            $cartItems = [];
        }

        foreach($cartItems as $index => $item) {
            if($item->album->id == $id) {
                $existingIndex = $index;
                break;
            }
        }

        if($existingIndex !== null) {
            unset($cartItems[$existingIndex]);
            session()->put("cartItems", $cartItems);
        }

    }

    public function changeQuantity(Request $request) {
        $id = $request->get("id");
        $quantity = $request->get("quantity");

        $existingIndex = null;

        $cartItems = session()->get("cartItems");

        if(!$cartItems) {
            $cartItems = [];
        }

        foreach($cartItems as $index => $item) {
            if($item->album->id == $id) {
                $existingIndex = $index;
                break;
            }
        }

        if($existingIndex !== null) {
            $cartItems[$existingIndex]->quantity = $quantity;
            session()->put("cartItems", $cartItems);
            return response()->json([], 204);
        }

        return response()->json(["message" => "Cannot be changed."], 409);
    }

}


