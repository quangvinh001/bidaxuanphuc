<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        @if (isset($slide) )
            
        
        <div class="carousel-item active">
            <img class="banner" src="{{ asset('build/images/' . $slide->image) }}" class="d-block w-100 "
                alt="...">
        </div>
        @foreach ($banners as $item)
        <div class="carousel-item">
            <img class="banner" src="{{ asset('build/images/' . $item->image) }}" class="d-block w-100 "
                alt="...">
        </div>
        @endforeach
        @else 
        <div class="banner-none"></div>
        @endif
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
