@extends('client.layout')

@section('title') Azure - Login @endsection
@section('description') Login to add albums to your lists, rate and save them for later.
@endsection
@section('keywords') login @endsection

@section('content')

    <main id="main">
        <section>
            <div class="container">
                <div>
                    <p>Welcome, </p><h1>{{ session()->get('user')->first_name . ' ' . session()->get('user')->last_name}}</h1>
                </div>
                @if(count($orders) > 0)
                    <div class="table-responsive mt-5 mb-5">
                        <table class="table stylish-table no-wrap">
                            <thead>
                            <tr>
                                <th class="border-top-0">Album</th>
                                <th class="border-top-0">Country</th>
                                <th class="border-top-0">Quantity</th>
                                <th class="border-top-0">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td class="align-middle">
                                        <h6>{{ $order->albums->name }}</h6>
                                    </td>
                                    <td class="align-middle">{{ $order->country }}</td>
                                    <td class="align-middle">{{ $order->quantity }}</td>
                                    <td class="align-middle">{{ $order->albums->price->price }}$</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div>
                        <h2>You have no orders.</h2>
                        <a href="{{ route('home.albums') }}">Check out albums in our collection!</a>
                    </div>
                @endif

            </div>
        </section>
    </main>

@endsection
