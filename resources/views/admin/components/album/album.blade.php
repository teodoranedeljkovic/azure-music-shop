<div class="col-lg-4 col-md-6 portfolio-wrap filter-app">
    <div class="portfolio-item">
        <img src="{{ asset('/storage/images/'.$a->image) }}" class="img-fluid" alt="">
        <div class="portfolio-info">
            <h3>{{ $a->name }}</h3>
            <h3>{{ date('d-M, Y', strtotime($a->dateReleased)) }}</h3>
            <h3>Genre: {{ $a->genre->name }}</h3>
            <h3>Artist: {{ $a->artist->first_name . $a->artist->last_name }}</h3>
            <div>
                <a href="{{ asset('/storage/images/'.$a->image) }}" data-galleryery="portfolioGallery" class="portfolio-lightbox" title="{{ $a->name }}"><i class="bx bx-plus"></i></a>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row mb-lg-4 justify-content-between">

        <a href="{{ route('albums.edit', ['album' => $a->id]) }}" class="btn btn-outline-info">Update</a>

        <form method="POST" action="{{ route('albums.destroy', ['album' => $a->id]) }}">
            @method('DELETE')
            @csrf
            <div class="form-group">
                <button class="btn btn-outline-info">Delete</button>
            </div>
        </form>

    </div>
</div>
