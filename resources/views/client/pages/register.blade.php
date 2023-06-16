@extends('client.layout')

@section('title') Azure - Register @endsection
@section('description') Register to add albums to your lists, rate and save them for later.
@endsection
@section('keywords') register @endsection

@section('content')

    <main id="main">
        <section>
            <div class="container">
                <h2>Register</h2>
                <form class="m-5" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="firstName" class="form-control" id="exampleInputName" placeholder="First Name">
                    </div><br/>
                    <div class="form-group">
                        <input type="text" name="lastName" class="form-control" id="exampleInputName" placeholder="Last Name">
                    </div><br/>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" id="exampleInputUsername" placeholder="Username">
                    </div><br/>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div><br/>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div><br/>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
                @if(session()->has('regFail'))
                    <div class="alert alert-danger">
                        {{ session()->get('regFail') }}
                    </div>
                @endif
            </div>
        </section>
    </main>

@endsection
