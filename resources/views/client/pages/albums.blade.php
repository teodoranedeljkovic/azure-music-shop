@extends('client.layout')

@section('title') Azure - Artists @endsection
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

                @if(session()->has('user') && session()->get('user')->role_id == 1)
                    <div class="form-group">
                        <a href="{{ route('albums.create') }}" class="btn btn-outline-info">Create new album</a>
                    </div>
                @endif

                <div class="row">
                    <div class="col-sm-2 mb-3">
                        <form method="get" action="{{ route('home.albums') }}">

                            <div class="input-group">
                                <input type="search" id="keyword" class="form-control" name="keyword" placeholder="Browse...">
                            </div>
                            <div class="input-group">
                                <select name="sort">
                                    <option value="az">A-Z</option>
                                    <option value="za">Z-A</option>
                                    <option value="newest">Newest</option>
                                    <option value="oldest">Oldest</option>
                                </select>
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



                <div class="row" id="album-container" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
                    @if(session()->has('user'))
                        <p>dskn</p>
                    @else
                        <a href="{{ route('login') }}">Login to add an album to cart</a>
                    @endif
                        @foreach($albums as $a)
                            @include('client.components.album.album',['albums' => $a])
                        @endforeach

                </div>

                {{ $albums->links() }}

            </div>

        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->

@endsection


@section('scripts')
    <script src="{{ asset('assets/js/albums.js') }}"></script>
@endsection
