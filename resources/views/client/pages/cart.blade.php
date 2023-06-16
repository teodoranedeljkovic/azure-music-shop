@extends('client.layout')

@section('title') Azure - Cart @endsection
@section('description') Your cart.
@endsection
@section('keywords') cart, music,artist,singer,group @endsection

@section('content')

    <main id="main">
        <br><br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    @if(session()->has("cartItems") && count(session()->get("cartItems")))
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <div class="panel-title">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
                                        </div><p>&nbsp;</p>
                                        <div class="col-xs-6">
                                            <a type="button" href="{{ route("home.albums") }}" class="btn btn-primary btn-sm btn-block">
                                                Continue shopping
                                            </a><p>&nbsp;</p>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                @php
                                    //session()->forget('cartItems');
                                    //dd(session()->get("cartItems"))
                                @endphp
                                <div class="container">
                                    <div class="row d-flex justify-content-between">
                                        @foreach(session()->get("cartItems") as $item)
                                            <div class="col-sm-5 mb-lg-5">
                                                <div data-id="{{ $item->album->id }}" data-price="{{ $item->album->price->price }}" class="col-sm-5 album" id="cart_item_{{ $item->album->id }}">
                                                    <div class="col-xs-2"><img class="img-responsive" style="width:350px; height: 350px" src="{{ asset('/storage/images/'.$item->album->image) }}">
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <h4 class="product-name"><strong>{{ $item->album->name }}</strong></h4><h4></h4>
                                                    </div>
                                                    <div class="col-xs-6">
                                                        <div class="col-xs-6 text-right">
                                                            <h6><strong>{{ $item->album->price->price }} $</strong> </h6>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <input type="number" id="input_{{ $item->album->id }}" onblur="changeAlbumQuantity({{$item->album->id}})" class="form-control input-sm" value="{{ $item->quantity }}">
                                                        </div>
                                                        <div class="col-xs-2 mt-lg-3">
                                                            <button type="button" class="btn btn-outline-info" onclick="removeFromCart({{ $item->album->id }})">
                                                                <span class="glyphicon glyphicon-trash">Remove From Cart</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                </div>
                                <div class="panel-footer">
                                    <div class="row text-center">
                                        <div class="col-xs-9">
                                            @php
                                                $totalPrice = 0;
                                                foreach(session()->get("cartItems") as $item) {
                                                        $totalPrice += $item->quantity * $item->album->price->price;
                                                    }

                                        @endphp
                                        <h4 class="text-right">Total <strong id="total">$ {{ $totalPrice }}</strong></h4>
                                    </div>
                                    <div class="col-xs-3 mb-lg-5">
                                        <div class="form-group">
                                            <a href="{{ route('order') }}" class="btn btn-outline-info">Order</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                    @else
                        <p class="lead mb-lg-5">Your cart is empty.</p>
                    @endif

                </div>

    </main><!-- End #main -->

@endsection

@section("scripts")
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
