<div>
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        @foreach($dorm['images'] as $index => $image)            
        <div data-image-src="{{ asset('storage/' . str_replace('public/', '', $image['path'])) }}" class="carousel-item @if($index === 0) active @endif " data-bs-toggle="modal" data-bs-target="#myModal">
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <img id="modal-image" src="" class="img-fluid">
      </div>
    </div>
  </div>
</div>


<script>
  var carouselItems = document.querySelectorAll('.carousel-item');
  var modalImage = document.getElementById('modal-image');

  carouselItems.forEach(function(item) {
    item.addEventListener('click', function() {
      var imageSrc = item.getAttribute('data-image-src');
      modalImage.setAttribute('src', imageSrc);
    });
  });
</script>
