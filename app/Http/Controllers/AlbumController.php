<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditAlbumRequest;
use App\Http\Requests\StoreAlbumRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;

class AlbumController extends MyController
{
    private $albums;

    public function __construct(){
        $this->albums = Album::all();
    }

    public function index(Request $request, Album $albums)
    {
        $checkedGenres = $request->get("genreIds") ? $request->get("genreIds") : [];

        $artists = Artist::all();
        $genres = Genre::all();

        $albums = $albums->newQuery();

        if ($request->has('name')) {
            $albums->where('name', $request->input('name'));
        }

        if ($request->has('keyword')) {
            $albums->where('name','LIKE','%'. $request->input('keyword').'%');
        }

        if ($request->has('artists')) {
            if($request->get('artists') !== "0"){
                $albums->whereHas('artist', function ($query) use ($request) {
                    $query->where('artists.id', $request->input('artists'));
                });
            }
        }

        if ($request->has('genreIds')) {
            $albums->whereHas('genre', function ($query) use ($request) {
                $query->whereIn('genres.id', $request->input('genreIds'));
            });
        }

        if ($request->has('sort')) {
            if($request->get('sort') == 'az' || $request->get('sort') == 'za'){
                if($request->get('sort') == 'az'){
                    $albums->orderBy('name');
                }
                else{
                    $albums->orderBy('name','desc');
                }
            }
            else{
                if($request->get('sort') == 'newest'){
                    $albums->orderBy('dateReleased','desc');
                }
                else{
                    $albums->orderBy('dateReleased');
                }
            }
        }
        $albums = $albums->paginate(12)->withQueryString();

        return view('admin.pages.albums.index',[
            'albums' => $albums,
            'artists' => $artists,
            'genres' => $genres,
            'checkedGenres' => $checkedGenres
        ]);
    }

    public function create()
    {
        $artists = Artist::all();
        $genres = Genre::all();
        return view('admin.pages.albums.create',[
            'artists' => $artists,
            'genres' => $genres
        ]);
    }

    public function store(StoreAlbumRequest $request)
    {
        try {
            $name = $request->get('name');
            $dateReleased = $request->get('dateReleased');
            $image = $request->file('image');
            $length = $request->get('length');
            $description = $request->get('description');
            $artistId = $request->get('artists');
            $genreId = $request->get('genres');

            $album = new Album;

            //dd($artistId);

            if($artistId ==0 || $genreId == 0){
                return redirect()->back()->with("error", "Genre or artist not chosen.");
            }
            if($image == null){
                return redirect()->back()->with("error", "Photo not uploaded.");

            }
            else{
                $imgName = uniqid()."_".time().".".$image->extension();
                $image->storeAs("public/images", $imgName);

                $album->name = $name;
                $album->dateReleased = $dateReleased;
                $album->image = $imgName;
                $album->length = $length;
                $album->description = $description;
                $album->artist_id = $artistId;
                $album->genre_id = $genreId;
            }

            $album->save();

            return redirect()->route("albums.index")->with("success", "Successfully added.");
        }
        catch(\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "There's been an error");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $artists = Artist::all();
        $genres = Genre::all();
        return view('admin.pages.albums.edit', [
            'album' => Album::find($id),
            'artists' => $artists,
            'genres' => $genres
        ]);
    }

    public function update(EditAlbumRequest $request, $id)
    {
        try {
            $name = $request->get('name');
            $dateReleased = $request->get('dateReleased');
            $image = $request->file('image');
            $length = $request->get('length');
            $description = $request->get('description');
            $artistId = $request->get('artists');
            $genreId = $request->get('genres');

            $album = Album::find($id);

            if($image == null){
                $album->name = $name;
                $album->dateReleased = $dateReleased;
                $album->length = $length;
                $album->description = $description;
                $album->artist_id = $artistId;
                $album->genre_id = $genreId;
            }
            else{
                $imgName = uniqid()."_".time().".".$image->extension();
                $image->storeAs("public/images", $imgName);

                $album->name = $name;
                $album->dateReleased = $dateReleased;
                $album->image = $imgName;
                $album->length = $length;
                $album->description = $description;
                $album->artist_id = $artistId;
                $album->genre_id = $genreId;
            }

            $album->save();

            return redirect()->route("albums.index")->with("success", "Successfully edited.");
        }
        catch(\Exception $e) {
            \Log::error($e->getMessage());
            return redirect()->back()->with("error", "There's been an error.");
        }
    }

    public function destroy($id)
    {
        try {
            Album::destroy($id);
            return redirect()->back()->with("success", "Successfully deleted.");
        }
        catch (\Exception $ex) {
            \Log::error($ex->getMessage());
            return redirect()->back()->with("error", "There was an error deleting the item.");
        }
    }
}
