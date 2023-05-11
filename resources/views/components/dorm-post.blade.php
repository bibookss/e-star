<div>
    <div class="card rounded-4 " style="width: 45rem;" >
        <div class="card-body list-group-item pt-4 ps-4 fw-bold container dorm-post">
            <div class="row align-items-start">
                <div class="col-4">
                    {{-- <span class="ms-3 px-3 py-1 rounded-5 text-white fs-2 grn-rating" id="number" data-color="{{$post['overallRating']}}">{{$post['overallRating']}} </span> --}}
                    <p class="ms-3 px-3 py-1 rounded-5 text-white fs-4 d-inline-flex" data-color="{{$post['overallRating']}}" >{{$post['overallRating']}}</p>
                    <div class="pt-3 ps-2">{{ $post['datePosted'] }}</div>
                    <div class="pt-3 ps-2">
                        @if ($post['isVerified'] == 1)
                            <i class="fa-sharp fa-solid fa-circle-check" style="color: #2ec27e;"></i>                      
                            Verified Student
                        @endif
                    </div>
                </div>
                <div class="col d-flex justify-content-start">
                    <div>
                        {{ $post['review'] }}
                    </div>
                    
                </div>

            </div>
            <div class="row">
                <div class="col-4">
                </div>
                <div class="col-6 pt-2 ps-0 pb-2">
                    {{-- <x-star-rating></x-star-rating> --}}
                </div>
            </div>
            {{-- @if(Route::is('profile') && Auth::check() && Auth::user()->id == $post['userId']) --}}
            @if(Auth::check() && Auth::user()->id == $post['userId'])
                {{-- <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>               
                </form> --}}
                <div class=" d-flex justify-content-end gap-1 me-2 mb-1">
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