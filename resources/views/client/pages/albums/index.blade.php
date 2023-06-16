@extends('client.layout')

@section('title') Alb - Artists @endsection
@section('description') A comprehensive listing of albums from various artists.
@endsection
@section('keywords') music,album,lp,ep @endsection

@section('content')

    <main id="main">

        <!-- ======= Our Portfolio Section ======= -->
        <section class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Albums</h2>
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li>Albums</li>
                    </ol>
                </div>

            </div>
        </section><!-- End Our Portfolio Section -->

        <!-- ======= Portfolio Section ======= -->
        <section class="portfolio">
            <div class="container">

                <div class="row">

                    <div class="col-sm-12 mb-3">
                        <form method="get" action="{{ route('home.albums') }}">

                            <div class="form-group">
                                <input type="text" class="form-control" name="keyword" placeholder="Browse...">
                            </div><br>
                            <div class="form-group">
                                <select name="sort" class="form-control">
                                    <option value="az">A-Z</option>
                                    <option value="za">Z-A</option>
                                    <option value="newest">Newest</option>
                                    <option value="oldest">Oldest</option>
                                </select>
                            </div><br>
                            <div class="form-check">
                                @foreach($genres as $genre)
                                    <input class="form-check-input" type="checkbox" {{ in_array($genre->id, $checkedGenres) ? "checked" : "" }} name="genreIds[]" id="gcheckbox-{{$genre->id}}" value="{{ $genre->id }}" >
                                    <label for="gcheckbox-{{$genre->id}}" class="form-check-label" >{{ $genre->name }}</label><br>
                                @endforeach
                            </div><br>

                            <div class="form-group">
                                <select name="artists" class="form-control">
                                    <option value="0">Choose Artist</option>
                                    @foreach($artists as $artist)
                                        <option value="{{ $artist->id }}">{{ $artist->first_name.' '.$artist->last_name }}</option>
                                    @endforeach
                                </select><br>
                            </div><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                @if(session()->has('order'))
                    <div class="alert alert-info">
                        {{ session()->get('order') }}
                    </div>
                @endif

                @if(!session()->has('user'))
                    <div class="mb-lg-4">
                        <a href="{{ route('login') }}">Login in to add to cart</a>
                    </div>
                @endif

                <div class="row" id="album-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

                        @foreach($albums as $a)
                            @include('client.components.album.album',['albums' => $a])
                        @endforeach

                </div>

                {{ $albums->links() }}

            </div>

        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->

@endsection


@section("scripts")
    <script src="{{ asset('assets/js/cart.js') }}"></script>
@endsection
