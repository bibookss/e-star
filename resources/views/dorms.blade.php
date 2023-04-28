@extends('layouts.app')

@section('content')
<div class="landing container-fluid px-5 pt-3">
    <br><br>
    <div class="row container-fluid">
        <div class="col my-5 d-flex justify-content-center pt-3">
            <input type="text" class="address-input rounded-4 w-25 mx-5" id="fname" name="address" placeholder="   Enter address">
            <button class="ylw-btn text-white px-4 py-2 fw-bold rounded-4">Search now</button>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-1 ms-5">
                <h4 class="fw-bold">Sort by:</h4>
            </div>
            <div class="col">
                <div class="dropdown d-grid gap-2 col-2">
                    <button class="sort-dropdown dropdown-toggle btn-outline-dark rounded-4 h-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Most Likes
                    </button>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Rating</a></li>
                    <li><a class="dropdown-item" href="#">Recent</a></li>
                    <li><a class="dropdown-item" href="#">Most Likes</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <x-dorm-list></x-dorm-list>
</div>
<x-footer></x-footer>
@endsection