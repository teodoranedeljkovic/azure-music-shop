<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactEmail;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use function GuzzleHttp\Promise\all;

class FrontController extends MyController
{
    public function home(){

        $labels = [
            array('name' =>'Epic', 'image' =>"l1.png"),
            array('name' => 'Arista', 'image' => "l2.png"),
            array('name' =>'RCA','image' => "l3.png"),
            array('name' => 'Colombia','image' => "l4.png"),

        ];
        return view('client.pages.home',['labels' => $labels, 'menu' => $this->menus ]);
    }
    public function about(){
        return view('client.pages.about');
    }

    public  function author(){
        return view('author');
    }

    public function contact(){
        return view('client.pages.contact');
    }

    public function albums(Request $request, Album $albums){

        $checkedGenres = $request->get("genreIds") ? $request->get("genreIds") : [];

        $artists = Artist::all();
        $genres = Genre::all();

        $albums = $albums->newQuery();

        if ($request->has('name')) {
            $albums->where('name', $request->input('name'));
        }

        if ($request->has('keyword')) {
            $albums->where('name','LIKE','%'. $request->input('keyword').'%');
        }

        if ($request->has('artists')) {
            if($request->get('artists') !== "0"){
                $albums->whereHas('artist', function ($query) use ($request) {
                    $query->where('artists.id', $request->input('artists'));
                });
            }
        }

        if ($request->has('genreIds')) {
            $albums->whereHas('genre', function ($query) use ($request) {
                $query->whereIn('genres.id', $request->input('genreIds'));
            });
        }

        if ($request->has('sort')) {
            if($request->get('sort') == 'az' || $request->get('sort') == 'za'){
                if($request->get('sort') == 'az'){
                    $albums->orderBy('name');
                }
                else{
                    $albums->orderBy('name','desc');
                }
            }
            else{
                if($request->get('sort') == 'newest'){
                    $albums->orderBy('dateReleased','desc');
                }
                else{
                    $albums->orderBy('dateReleased');
                }
            }
        }

        $albums = $albums->paginate(12)->withQueryString();

        return view('client.pages.albums.index',[
            'albums' => $albums,
            'artists' => $artists,
            'genres' => $genres,
            'checkedGenres' => $checkedGenres
            ]);
    }

    public function sendEmail(ContactRequest $request){
        try{
            $name = $request->get('name');
            $email = $request->get('email');
            $subject = $request->get('subject');
            $message = $request->get('message');

            $data = [
                'name' => $name,
                'email' => $email,
                'subject' => $subject,
                'message' => $message,
            ];

            $adminEmail = 'nedeljkovicteodora3@gmail.com';
            Mail::to($adminEmail)->send(new ContactEmail($data));

            return redirect()->back()->with('status','Successfully sent email.');
        }
        catch (\Exception $ex){
            Log::error($ex->getMessage());
            return redirect()->back()->with('status','Failed to send an email.');
        }
    }

    public function orders(Request $request){
        $allOrders = Order::OrderBy('id')->get();
        $user = $request->session()->get('user');

        $orders = [];

        if($allOrders !== null){
            foreach ($allOrders as $order){
                if($order->user_id == $user->id){
                    array_push($orders, $order);
                }
            }
        }

        return view('client.pages.orders',['orders' => $orders]);
    }

}

