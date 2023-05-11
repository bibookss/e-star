<div>
    <div class="card rounded-4 px-3" style="width: 45rem;" >
        <div class="card-body list-group-item p-4 container dorm-post">
            <div class="row">
                <div class="col-5 d-flex align-items-center fw-bold">
                    <p style="min-width: 75px;" class="text-center px-3 py-1 rounded-5 text-white fs-4" data-color="{{$post['overallRating']}}" >{{$post['overallRating']}}</p>
                    <div class="ms-3">{{ $post['datePosted'] }}</div>
                </div>
                <div class="col-7">
                    <div class="pt-3 ps-2 text-end">
                        @if ($post['isVerified'] == 1)
                            <i class="fa-sharp fa-solid fa-circle-check" style="color: #2ec27e;"></i>                      
                            Verified Student
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div>
                    {{ $post['review'] }}
                </div>
            </div>
            @if(Auth::check() && Auth::user()->id == $post['userId'])
                <div class=" d-flex justify-content-end gap-1 pt-3">
                    <x-edit-post :post="$post" />
                    <form method="POST" action="{{ route('delete-post', ['post' => $post['postId']]) }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn ylw-btn" type="submit">Delete</button>
                    </form>
                </div>
            @endif
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
</div>