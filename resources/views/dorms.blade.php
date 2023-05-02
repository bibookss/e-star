@extends('layouts.app')

@section('content')
<div class="container-fluid px-5 pt-3">
    <br><br>
    <div class=" ">
        <div class=" my-5 d-flex justify-content-center pt-3">
          <form class="mx-auto">
            <input type="text" class="address-input rounded-4 w-50 mx-5 ps-3" id="fname" name="address" placeholder="Search Dorm">
            <button type="submit" value="submit" class="ylw-btn text-white px-4 py-3 fw-bold rounded-4">Search now</button>
            <x-create-dorm></x-create-dorm>
          </form>
        </div>
    </div>
    <div class="d-flex">
        <h4 class="fw-bold px-3 pt-2 fs-2">Sort by:</h4>
        <div class="dropdown">
            <button class="dropdown-btn dropdown-btn2">Most Likes<i class="fa-solid fa-caret-down fa-lg ps-2"></i></button>
            <div class="dropdown-options">
              <a href="#">Most Likes</a>
              <a href="#">Rating</a>
              <a href="#">Recent</a>
            </div>
        </div>
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
    <div class="d-flex flex-row flex-wrap gap-4 justify-content-center">
        <x-dorm-list></x-dorm-list>
        <x-dorm-list></x-dorm-list>
        <x-dorm-list></x-dorm-list>
        <x-dorm-list></x-dorm-list>
        <x-dorm-list></x-dorm-list>
        <x-dorm-list></x-dorm-list>
    </div>
</div>
<x-footer></x-footer>
@endsection