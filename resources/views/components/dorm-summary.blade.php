<div>
    <div class="card rounded-4" style="width: 30rem;" >
        <div class=" list-group-flush">
            <div class="ps-3 pt-3 pb-1 ">
                {{-- <span class="mx-2 px-3 py-1 rounded-5 fw-bold text-white fs-1" id="ratingOverall">{{ $dorm['overallRating'] }}</span> --}}
                <p class="ms-3 px-3 py-1 rounded-5 text-white fs-2 d-inline-flex fw-bold" data-color="{{$dorm['overallRating']}}" >{{$dorm['overallRating']}}</p>
                <span class="mx-3 flex-grow-1 fw-bold"> {{ $dorm['postCount'] }} reviews</span>
                <br>
                <br>
                {{-- <span class="">
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
                </span> --}}
            </div>
        </div>
        <div class="ps-2">
        {{-- <x-star-rating></x-star-rating> --}}
        </div>
    </div>
    <div class="py-5">
        <div id="map" style="height: 500px;" class="real-img rounded-4"></div>
    </div>
    <script src="https://code.jquery.com/jquery-1.7.2.js"></script>
</div>
<script>
    $(document).ready(function(){
        var mc = {
            '0-2'     : 'red-rating',
            '2-3.5'    : 'ylw-rating',
            '3.5-5'   : 'grn-rating'
        };

        function between(x, min, max) {
            return x >= min && x <= max;
            }

        var dc;
        var first; 
        var second;
        var th;

        $('p').each(function(index){
            th = $(this);

            dc = parseInt($(this).attr('data-color'),10);


            $.each(mc, function(name, value){
                first = parseInt(name.split('-')[0],10);
                second = parseInt(name.split('-')[1],10);

                console.log(between(dc, first, second));

                if( between(dc, first, second) ){
                    th.addClass(value);
                }
            });
        });

        var map = L.map('map').setView([51.505, -0.09], 13);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        L.Control.geocoder().addTo(map);
    });
</script>

