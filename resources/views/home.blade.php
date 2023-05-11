@extends('layouts.app')

@section('content')
<!--1st section-->
<div class="container-fluid">
    <div class="row mx-5 mt-5">
        <div class="col">
            <img class="mt-5 ml-5" src="assets/cartoon-map.png" alt="catoon-map" height="600">
        </div>
        <div class="col my-auto fs-5 lh-lg">
            <h1 class="fw-bold">Find dormitories that suit your needs</h1>
            <div class="mt-5 pe-5">
                <h4>Search across dorm reviews of our student-driven initiative 
                    to help each other decide their rest in  the city!</h4>
            </div>
            <form method="GET" action="{{ route('search') }}">
                @csrf
                <div class="my-5 align-items-center d-flex gap-5">
                    <input type="text" class="address-input rounded-4 ps-4" id="fname" name="q" placeholder="Enter address">
                    <button class="ylw-btn text-white px-4 py-2 fw-bold rounded-4" type="submit">Search now</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!--2nd section-->
<div class="offering container-fluid text-center py-5" id="about">
    <div>
        <h1 class="fw-bold">What we offer</h1>
        <br>
        <h4>Tired of endlessly scrolling through social media to find the perfect dorm for you? Well, worry no more!</h4>
        <br>
    </div>
    <div class="row px-5">
        <div class="col">
            <img src="assets/rating-cartoon.png" alt="cartoon-rating" height="300">
            <h2 class="fw-bold">Rate dormitories</h2>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
        </div>
        <div class="col">
            <img src="assets/map-search-cartoon.png" alt="cartoon-rating" height="300">
            <h2 class="fw-bold">Look for dorms</h2>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
        </div>
        <div class="col">
            <img src="assets/write-cartoon.png" alt="cartoon-rating" height="300">
            <h2 class="fw-bold">Publish reviews</h2>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing sheesh.</h4>
        </div>
    </div>
</div>
<!--3rd section-->
<div class="intro-info container-fluid">
    <div class="row">
        <div class="col mx-5 p-5 fw-bold">
            <h1 class="mt-5 fw-bold">Built by Students, for Students</h1>
            <br><br>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sollicitudin nulla eu facilisis euismod. 
                Nullam facilisis sit amet velit id iaculis. Suspendisse eleifend orci vitae pharetra suscipit. </h4>
        </div>
        <div class="col">
            <img src="assets/teaching-cartoon.png" height="500">
        </div>
    </div>
    <div class="row">
        <div class="col ms-5">
            <img src="assets/comuunity-cartoon.png" height="500">
        </div>
        <div class="col m-5 px-5">
            <br><br>
            <h1 class="fw-bold mb-5">Community-driven, unbiased reviews</h1>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sollicitudin nulla eu facilisis euismod. 
                Nullam facilisis sit amet velit id iaculis. Suspendisse eleifend orci vitae pharetra suscipit. </h4>
        </div>
    </div>
</div>
<!--4th section-->
<div>
    <h1 class="text-center fw-bold pt-5">View the best reviewed dormitories in the city</h1>
</div>
<div class="container-fluid">
    <div class="d-flex flex-wrap gap-4 justify-content-center">
        @foreach ($dorms['data'] as $dorm) 
            <x-dorm-list :dorm="$dorm" />
        @endforeach
    </div>
</div>
<!--footer-->
<x-footer></x-footer>
@endsection

{{-- <script>
    const search = document.getElementById('search');
    if (search) {
        search.addEventListener('submit', function(event) {
            event.preventDefault();

            const query = new FormData(search);

            
            
        });
    }
</script> --}}
  