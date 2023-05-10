<div class="p-1">
    <div class="  py-5">
        <div class="justify-content-center ">
            <a class="btn" href="/dorms/{{$dorm["dormId"]}}" role="button">
                <div class="card fw-bold rounded-4 dorm-card" style="border-bottom: #000000 solid 4px;">
                    @if (count($dorm['images']) > 0)
                        <img class="card-img-top img-card" src={{ asset('storage/' . str_replace('public/', '', $dorm['images'][0]['path'])) }} alt="...">
                    @endif
                    @if (count($dorm['images']) == 0)
                        <img class="card-img-top img-card" src="/assets/image1.jpg" alt="...">
                    @endif
                    <div class="card-body ">
                        <div class="d-flex">
                            <h6 class="card-title fw-bold dorm-left flex-grow-1">{{ $dorm["name"] }}</h6>
                            <div class="mx-auto"></div>
                            <div class="" style="font-size: 12px;font-family: 'DM Sans', sans-serif;">{{ $dorm["postCount"] }} reviews</div>
                            
                        </div>
                        <div class=" pt-3">
                            <p class=" px-3 py-1 rounded-4 fw-bold text-white d-inline-flex dorm-left" data-color="{{$dorm['overallRating']}}" style="font-size: 12px;"> {{ $dorm['overallRating'] }}</p>
                            <span class="pt-1 dorm-right" style="font-size: 11px;font-family: 'DM Sans', sans-serif;"> {{ $dorm["location"]["street"] }}</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.7.2.js"></script>
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
    });
</script>