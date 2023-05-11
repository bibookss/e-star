@extends('layouts.app')

@section('content')

<div class="px-5 pt-5 mt-5 container">
  <x-image-carousel :dorm="$dorm['data']"/>
  
  <div class="d-flex pt-3">
    <div class="pt-5 flex-grow-1">
      <h2 class="fw-bold p-1"> {{$dorm['data']['name']}} </h2>
      <p class="ms-1 mb-2">Ateneo Avenue, Bagumbayan Norte, Naga City</p>
    </div>
    <div class="pt-5 mt-3">
      @auth
        <x-create-post dormId="{{ $dorm['data']['dormId'] }}"/>
      @endauth
    </div>
  </div>
  <div class="d-flex justify-content-between">
    <x-dorm-summary :dorm="$dorm['data']" />
    <div class="d-flex flex-column gap-5">
      @foreach ($dorm['data']['posts'] as $post) 
        <x-dorm-post :post="$post" />
      @endforeach
    </div>
  </div>
  <div class="container-fluid row justify-content-end pb-5 pt-5">
    {{-- <p class="col-5 fw-bold pt-4 ">Showing 2 of 87 reviews</p>
    <button class="col-2 blue-btn text-white rounded-4" id="load-more">Load More</button> --}}
  </div>
</div>
<x-footer></x-footer>
<script>
  let loadMoreBtn = document.querySelector('#load-more');
  let currentItem = 10;

  loadMoreBtn.onclick = () =>{
   let boxes = [document.querySelectorAll('.dorm-post')];
   for (var i = currentItem; i < currentItem + 10; i++){
      boxes[i].style.display = 'inline-block';
   }
   currentItem += 10;

   if(currentItem >= boxes.length){
      loadMoreBtn.style.display = 'none';
   }
}
</script>
@endsection