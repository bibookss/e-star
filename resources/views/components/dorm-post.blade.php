<div>
    <div class="card rounded-4" style="width: 50rem;" >
        <div class="card-body list-group-item pt-4 ps-4 fw-bold container">
            <div class="row align-items-start">
                <div class="col-4">
                    <span class="rating-bg ms-2 px-2 py-1 rounded-5 text-white fs-1"> {{$post['overallRating']}} </span>
                    <div class="pt-3 ps-2">{{ $post['datePosted'] }}</div>
                </div>
                <div class="col d-flex justify-content-start">
                    {{ $post['review'] }}
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-6 pt-2 ps-0 pb-2">
                    <x-star-rating></x-star-rating>
                </div>
            </div>
        </div>
    </div>

</div>