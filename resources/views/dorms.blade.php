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
</div>

<div class="d-flex align-items-center">
  <h4 class="fw-bold px-3 ms-5 pt-2 fs-2">Filter by:</h4>
  <form class="d-flex flex-wrap mx-3" method="GET" action="{{ route('filter') }}">
    @csrf
    <div class="form-group mx-2 mb-2">
      <select name="ratingType" id="ratingType" class="form-control filter-button">
        <option value="location">Location</option>
        <option value="internet">Internet</option>
        <option value="bathroom">Bathroom</option>
        <option value="security">Security</option>
        <option value="overall">Overall</option>
      </select>
    </div>
    <div class="form-group mx-2 mb-2">
      <select name="ratingValue" id="ratingValue" class="form-control filter-button">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2"><i class="fa-solid fa-filter" style="color: #99c1f1;"></i></button>
  </form>  
</div>

<div class="d-flex flex-row flex-wrap gap-4 justify-content-center"  id="dorms-container">
    @foreach ($dorms['data'] as $dorm) 
      <x-dorm-list :dorm="$dorm"></x-dorm-list>  
    @endforeach
</div>
@if ($dorms['total'] == 0) 
  <div style="height: 25vh;" class="px-5 d-flex flex-row align-items-center justify-content-center">
    <h1 class="fw-bold text-center">No dorms found</h1>
  </div>
@endif


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
