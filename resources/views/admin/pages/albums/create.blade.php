@extends('admin.layout')

@section('title') Azure - Create Album @endsection
@section('description') Create Album.
@endsection
@section('keywords') create albums @endsection

@section('content')

    <main id="main">
        <section>
            <div class="container">
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        <ul>
                                <li>{{ session()->get('error') }}</li>
                        </ul>
                    </div>
                @endif
                <form class="m-5" action="{{ route('albums.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control"  placeholder="Name">
                    </div><br/>
                    <div class="form-group">
                        <input type="date" name="dateReleased" class="form-control" placeholder="Date Released">
                    </div><br/>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                    </div><br/>
                    <div class="form-group">
                        <input type="text" name="length" class="form-control" placeholder="Length in minutes">
                    </div><br/>
                    <div class="form-group">
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                    </div><br/>
                    <div class="form-group">
                        <select name="genres" class="form-control">
                            <option value="0" selected>Choose genre</option>
                            @foreach($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <select name="artists" class="form-control">
                            <option value="0" selected>Choose artist</option>
                            @foreach($artists as $artist)
                                <option value="{{ $artist->id }}">{{ $artist->first_name.' '.$artist->last_name }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="form-control" value="Create new">
                    </div><br/>
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
            </div>
        </section>
    </main>

@endsection
