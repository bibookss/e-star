{{-- <link href="{{ asset('css/starability-basic.css') }}" rel="stylesheet">
<form class="container">
  <div class="row">
    <span class="p-2 fs-4 col-9 mt-2 fw-bold">Room</span>
    <fieldset class="starability-basic col ms-5 mt-4">
      <input type="radio" id="no-rate" class="input-no-rate" name="rating" value="0" checked aria-label="No rating." />
      <input type="radio" id="rate1" name="rating" value="1" />
      <label for="rate1">1 star.</label>
      <input type="radio" id="rate2" name="rating" value="2" />
      <label for="rate2">2 stars.</label>
      <input type="radio" id="rate3" name="rating" value="3" />
      <label for="rate3">3 stars.</label>
      <input type="radio" id="rate4" name="rating" value="4" />
      <label for="rate4">4 stars.</label>
      <input type="radio" id="rate5" name="rating" value="5" />
      <label for="rate5">5 stars.</label>
      <span class="starability-focus-ring"></span>     
    </fieldset>
  </div>
</form> --}}
<style>
  .rating {
  display: inline-block;
  font-size: 24px;
}

.rating .fa {
  color: #ddd;
  cursor: pointer;
}

.rating .fa:hover {
  color: #FFD700;
}

.rating .fa-star {
  color: #FFD700;
}

</style>
<div class="rating" id="rating-1"></div>
<div class="rating" id="rating-2"></div>
<div class="rating" id="rating-3"></div>
<div class="rating" id="rating-4"></div>

<script>
  // Find all rating elements and loop through them
document.querySelectorAll('.rating').forEach(function(rating) {
  // Create the star rating icons using Font Awesome
  for (var i = 1; i <= 5; i++) {
    var star = document.createElement('span');
    star.classList.add('fa', 'fa-star-o');
    star.dataset.rating = i;
    rating.appendChild(star);
  }

  // Add event listeners to handle hover and click events
  rating.addEventListener('mouseover', function(e) {
    if (e.target.classList.contains('fa-star-o')) {
      e.target.classList.remove('fa-star-o');
      e.target.classList.add('fa-star');
      e.target.previousSiblings.forEach(function(sibling) {
        if (sibling.classList.contains('fa-star-o')) {
          sibling.classList.remove('fa-star-o');
          sibling.classList.add('fa-star');
        }
      });
    }
  });

  rating.addEventListener('mouseout', function(e) {
    if (e.target.classList.contains('fa-star')) {
      e.target.classList.remove('fa-star');
      e.target.classList.add('fa-star-o');
      e.target.previousSiblings.forEach(function(sibling) {
        if (sibling.classList.contains('fa-star')) {
          sibling.classList.remove('fa-star');
          sibling.classList.add('fa-star-o');
        }
      });
    }
  });

  rating.addEventListener('click', function(e) {
    if (e.target.classList.contains('fa-star-o')) {
      e.target.classList.remove('fa-star-o');
      e.target.classList.add('fa-star');
      e.target.previousSiblings.forEach(function(sibling) {
        if (sibling.classList.contains('fa-star-o')) {
          sibling.classList.remove('fa-star-o');
          sibling.classList.add('fa-star');
        }
      });
    } else {
      e.target.classList.remove('fa-star');
      e.target.classList.add('fa-star-o');
      e.target.previousSiblings.forEach(function(sibling) {
        if (sibling.classList.contains('fa-star')) {
          sibling.classList.remove('fa-star');
          sibling.classList.add('fa-star-o');
        }
      });
    }
  });
});

</script>
  
{{-- <div>
  <div class="rating-box">
    <button id="myBtn">Try it</button>
    <p id="demo"></p>

    <div class="stars">
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
      <i class="fa-solid fa-star"></i>
    </div>
  </div>
</div>
<script>
  // Select all elements with the "i" tag and store them in a NodeList called "stars"
  const stars = document.querySelectorAll(".stars i");
  // Loop through the "stars" NodeList
  stars.forEach((star, index1) => {
    // Add an event listener that runs a function when the "click" event is triggered
    star.addEventListener("click", () => {
      // Loop through the "stars" NodeList Again
      stars.forEach((star, index2) => {
        // Add the "active" class to the clicked star and any stars with a lower index
        // and remove the "active" class from any stars with a higher index
        index1 >= index2 ? star.classList.add("active") : star.classList.remove("active");
      });
    });
  });
</script> --}}