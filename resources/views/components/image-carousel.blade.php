<div>
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        @foreach($dorm['images'] as $index => $image)            
        <div class="carousel-item @if($index === 0) active @endif">
              <img src="{{ asset('storage/' . str_replace('public/', '', $image['path'])) }}" class="d-block w-100">
            </div>
          @endforeach
        <button>
            <i class="fa-regular fa-image"></i>
            <span class="ps-2 fw-bold">{{ count($dorm['images']) }} Images</span>
        </button>
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
</div>
