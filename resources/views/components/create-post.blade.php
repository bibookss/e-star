<div>
    <!-- Button trigger modal -->
    <button type="button" class="btn ylw-btn px-5 py-2 rounded-4" data-bs-toggle="modal" data-bs-target="#writeReview">
        Write a Review
    </button>
  
  <!-- Modal -->
    <div class="modal fade" id="writeReview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content modal-review">
                <div class="modal-body d-flex p-4">
                    <div class="fs-2 flex-grow-1 fw-bold ps-2"> Write your review</div>
                    <button class="btn" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-regular fa-circle-xmark fa-2xl"></i>
                    </button>
                </div>
                <div class="px-5">
                    <textarea rows="7" style="width:900px;" class=" write-review p-4 rounded-4" placeholder="Write something..." aria-label="review-text"></textarea>
                    <br>
                    {{-- <x-star-rating></x-star-rating> --}}
                    
                    <i class="fa-solid fa-star fa-bounce fa-2xl right mx-5 my-5" style="color: #ffd43b;height:10%;"></i>
                    <x-slider-rating></x-slider-rating>
                </div>
                <div class="p-4 d-flex justify-content-between">
                    <button type="button" class="btn blue-btn">Attach Images</button>
                    <button type="button" class="btn ylw-btn">Publish review</button>
                </div>
            </div>
        </div>
    </div>
</div>