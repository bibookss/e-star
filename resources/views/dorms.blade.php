@php
  use Illuminate\Http\Request;
@endphp


@extends('layouts.app')

@section('content')
<div class="container-fluid px-5 pt-3">
    <br><br>
    <div class="row container-fluid">
      <form method="GET" action="{{ route('search') }}">
      <div class="col my-5 d-flex justify-content-center pt-3">
          @csrf
          <input type="text" class="address-input rounded-4 w-25 mx-5 ps-3" id="fname" name="q" placeholder="Enter address" value="<?php echo $_GET['q'] ?? ''; ?>">
          <button class="ylw-btn text-white px-4 py-2 fw-bold rounded-4">Search now</button>
        </form>  
        @auth
          <x-create-dorm></x-create-dorm>          
        @endauth
    </div>
</div>

<div class="d-flex">
    {{-- <h4 class="fw-bold px-3 pt-2 fs-2">Sort by:</h4>
    <div class="dropdown">
        <button class="dropdown-btn dropdown-btn2">Most Likes<i class="fa-solid fa-caret-down fa-lg ps-2"></i></button>
        <div class="dropdown-options">
          <a href="#">Most Likes</a>
          <a href="#">Rating</a>
          <a href="#">Recent</a>
        </div>
    </div> --}}
    <h4 class="fw-bold px-3 pt-2 fs-2">Filter</h4>
    <div class="dropdown">
        <button class="dropdown-btn dropdown-btn2">by<i class="fa-solid fa-caret-down fa-lg ps-2"></i></button>
        <div class="dropdown-options">
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Internet</span></label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Air Conditioner</span></label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Parking</span></label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">Kitchen</span></label>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
            <label class="form-check-label" for="flexSwitchCheckDefault"><span class="ps-2">CCTV</span></label>
          </div>
        </div>
      </div>
  </div>
  <div class="d-flex flex-row flex-wrap gap-4 justify-content-center"  id="dorms-container">
      @foreach ($dorms['data'] as $dorm) 
        <x-dorm-list :dorm="$dorm"></x-dorm-list>  
      @endforeach
  </div>
  {{-- if no dorms
  <div class="vh-100 d-flex justify-content-center">
    <x-create-dorm></x-create-dorm>
  </div>
</div> --}}
<form action="{{ request()->routeIs('search') ? route('search', ['perPage' => $perPage, 'page' => $page+1])  : route('dorms', ['perPage' => $perPage, 'page' => $page+1]) }}" method="GET">  <div class="d-flex justify-content-end py-3 px-5 me-3 mb-3">
  <input type="hidden" name="q" value="{{  request()->query('q') }}">  <p class="col-4 fw-bold pt-4 ">Showing {{count($dorms['data'])}} of {{ $dorms['total'] }} dorms</p>
    @if (count($dorms['data']) < $perPage * ($page+1) && count($dorms['data']) < $dorms['total'])
      <input type="hidden" name="page" value="{{ $page+1 }}">
      <input type="hidden" name="perPage" value="{{ $perPage }}">
      <button type="submit" class="col-2 blue-btn text-white rounded-4">Load More</button>
    @endif
  </div>
</form>





<x-footer></x-footer>
@endsection
