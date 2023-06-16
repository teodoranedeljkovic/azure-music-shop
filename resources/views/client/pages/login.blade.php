@extends('client.layout')

@section('title') Azure - Login @endsection
@section('description') Login to add albums to your lists, rate and save them for later.
@endsection
@section('keywords') login @endsection

@section('content')

    <main id="main">
        <section>
            <div class="container">
                <h2>Login</h2>
                <form class="m-5" action=" {{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div><br/>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div><br/>
                    <button type="submit" class="btn btn-primary">Login</button>
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
