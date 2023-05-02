<div>
    <div class="card rounded-4" style="width: 30rem;" >
        <div class=" list-group-flush">
            <div class="ps-3 pt-3 pb-1 ">
                <span class="rating-bg mx-2 px-2 py-1 rounded-5 fw-bold text-white fs-1">{{ $dorm['overallRating'] }}</span>
                <span class="mx-3 flex-grow-1 fw-bold"> {{ $dorm['postCount'] }} reviews</span>
                <br>
                <br>
                <span class="">
                    <div class ="summary-icons d-flex gap-5" id="summary-icons">
                        <button onclick="buttonColor()" class="btn" id="wifi-btn">
                            <iconify-icon icon="ic:round-wifi" style="font-size: 25px;"></iconify-icon></button>
                        <button onclick="buttonColor()" class="btn" id="aircon-btn">
                            <iconify-icon icon="icon-park-solid:air-conditioning" style="font-size: 25px;"></iconify-icon></button>
                        <button onclick="buttonColor()" class="btn" id="park-btn">
                            <iconify-icon icon="ri:parking-box-fill" style="font-size: 25px;"></iconify-icon></button>
                        <button onclick="buttonColor()" class="btn" id="stove-btn">
                            <iconify-icon icon="mdi:stove-burner" style="font-size: 25px;"></iconify-icon></button>
                        <button onclick="buttonColor()" class="btn" id="cctv-btn">
                            <iconify-icon icon="bxs:cctv" style="font-size: 25px;"></iconify-icon></button>
                    </div>
                </span>
            </div>
        </div>
        <div class="ps-2">
        <x-star-rating></x-star-rating>
        </div>
    </div>
    <div class="py-5">
        <img class="real-img rounded-4" src="assets/real-map.png"  style="width: 30rem; border-bottom: 4px solid black;">
    </div>
</div>