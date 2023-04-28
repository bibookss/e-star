@extends('layouts.app')

@section('content')
<div class="px-5 pt-5 mt-5">
  <div class="d-flex py-5">
    <h2 class="fw-bold p-1 flex-grow-1">Elice Dormitory</h2>
    <button class="ylw-btn text-white px-4 py-2 fw-bold rounded-4">Write a Review</button>
  </div>
  <div class="d-flex justify-content-between">
    <x-dorm-summary></x-dorm-summary>
    <x-user-dorm-rating></x-user-dorm-rating>
  </div>
</div>
      
@endsection