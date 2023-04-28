@extends('layouts.app')

@section('content')

<div class="px-5 pt-5 mt-5">
  <x-image-carousel></x-image-carousel>
  <div class="d-flex py-5">
    <h2 class="fw-bold p-1 flex-grow-1">Elice Dormitory</h2>
    <button class="ylw-btn text-white px-4 py-2 fw-bold rounded-4">Write a Review</button>
  </div>
  <div class="d-flex justify-content-between">
    <x-dorm-summary></x-dorm-summary>
    <div class="d-flex flex-column gap-5">
      <x-user-dorm-rating></x-user-dorm-rating>
      <x-user-dorm-rating></x-user-dorm-rating>
    </div>
  </div>
  <div class="container-fluid row justify-content-end pb-5">
    <p class="col-5 fw-bold pt-4 ">Showing 2 of 87 reviews</p>
    <button class="col-2 blue-btn text-white fw-bold rounded-4">Load More</button>
  </div>
</div>
<x-footer></x-footer>
      
@endsection