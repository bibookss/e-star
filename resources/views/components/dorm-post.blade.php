<div>
    <div class="card rounded-4" style="width: 50rem;" >
        <div class="card-body list-group-item pt-4 ps-4 fw-bold container">
            <div class="row align-items-start">
                <div class="col-4">
                    <span class="ms-2 px-2 py-1 rounded-5 text-white fs-1" id="ratingPost">{{$post['overallRating']}} </span>
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
    {{-- <body>
        @foreach ($components as $component)
            <p>The number is: <span id="{{ $component['id'] }}" class="num"></span></p>
        @endforeach
        <script>
            function setColorByRange(number, elem) {
                // Get the span element and set its text content
                const numElem = document.getElementById(elem);
                numElem.textContent = number;
    
                // Set the class of the span element based on the number range
                if (number >= 1 && number <= 2) {
                    numElem.classList.add("range1-2");
                } else if (number > 2 && number <= 4) {
                    numElem.classList.add("range2-4");
                } else if (number > 4 && number <= 5) {
                    numElem.classList.add("range4-5");
                } else {
                    // Handle numbers outside the range
                    console.error("Number out of range");
                }
            }
    
            // Call the function for each component
            @foreach ($components as $component)
                setColorByRange({{ $component['number'] }}, "{{ $component['id'] }}");
            @endforeach
        </script>
    </body> --}}
</div>