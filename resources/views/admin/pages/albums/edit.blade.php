@extends('admin.layout')

@section('title') Azure - Edit Album @endsection
@section('description') Edit Album.
@endsection
@section('keywords') edit albums @endsection

@section('content')

    <main id="main">
        <section>
            <div class="container">
                <form class="m-5" action="{{ route('albums.update',['album' => $album->id]) }}" method="POST" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{ $album->name }}">
                    </div><br/>
                    <div class="form-group">
                        <input type="text" name="dateReleased" class="form-control" value="{{ $album->dateReleased }}">
                    </div><br/>
                    <div class="form-group">
                        <input type="file" name="image" class="form-control">
                    </div><br/>
                    <div class="form-group">
                        <input type="text" name="length" class="form-control" value="{{ $album->length }}">
                    </div><br/>
                    <div class="form-group">
                        <textarea name="description" class="form-control">{{ $album->description }}</textarea>
                    </div><br/>
                    <div class="form-group">
                        <select name="genres" class="form-control">
                            @foreach($genres as $genre)
                                <option {{ $genre->id == $album->genre_id ? "selected" : "" }} value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </div><br>
                    <div class="form-group">
                        <select name="artists" class="form-control">
                            @foreach($artists as $artist)
                                <option {{ $artist->id == $album->artist_id ? "selected" : "" }} value="{{ $artist->id }}">{{ $artist->first_name.' '.$artist->last_name }}</option>
                            @endforeach
                        </select>
                    </div><br>
                     <div class="form-group">
                        <input type="submit" class="form-control" value="Edit">
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
