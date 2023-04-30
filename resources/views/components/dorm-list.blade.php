<div class="p-1">
    <div class="dorm-card  py-5">
        <div class="justify-content-center">
            <a class="btn" href="/viewDorm" role="button">
                <div class="card fw-bold rounded-4" style="border-bottom: #000000 solid 4px;">
                    <img class="card-img-top img-card" src="assets/image1.jpg" alt="...">
                    <div class="card-body">
                        <h5 class="card-title d-flex fw-bold">{{$dorm["name"]}}</h5>
                        <p class="card-text d-flex">
                            <span class="rating-bg me-1 px-2 py-1 rounded-4 fw-bold text-white">4.5</span>
                            <span class="ps-2 pt-1">{{$dorm["postCount"]}} reviews</span>
                            <span class="ms-auto pt-1"> {{$dorm["location"]["street"]}}</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>