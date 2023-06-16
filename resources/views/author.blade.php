@extends('client.layout')

@section('title') Alb - Author Page @endsection
@section('description') Author.
@endsection
@section('keywords') author, azure @endsection

@section('content')

    <main id="main">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-7">
                    <h1>Author</h1>
                </div>
                <div class="col-sm-7 mb-lg-4">
                    <img src="{{ asset('assets/img/author.jpg')}}" alt="author" />
                </div>
                <div class="col-sm-7">
                    <p>My name's Teodora Nedeljković. In 2018 I entered ICT College of Vocational Studies. I was first introduced to web design here and since the start have been trying my best to learn.</p><br><br>
                    <p>Check out my portfolio <a href="#">here.</a></p><br>
                </div>

            </div>
        </div>
    </main><!-- End #main -->

@endsection
