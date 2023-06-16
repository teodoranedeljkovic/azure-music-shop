@extends('client.layout')

@section('title') Azure - Login @endsection
@section('description') Login to add albums to your lists, rate and save them for later.
@endsection
@section('keywords') login @endsection

@section('content')

    <main id="main">
        <section>
            <div class="container">
                <h2>Order Details</h2>
                <form class="m-5" action=" {{ route('order') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="country" class="form-control" placeholder="Country">
                    </div><br/>
                    <div class="form-group">
                        <input type="text" name="city" class="form-control" placeholder="City">
                    </div><br/>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Address">
                    </div><br/>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Phone">
                    </div><br/>
                    <button type="submit" class="btn btn-primary">Order</button>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('loginFail'))
                    <div class="alert alert-danger">
                        {{ session()->get('loginFail')}}
                    </div>
                @endif
            </div>
        </section>
    </main>

@endsection
