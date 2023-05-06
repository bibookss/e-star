@extends('layouts.app')

@section('content')
<
<div class="p-5 my-5 container row">
    <div class="col-6">
        <div class="fs-4 fw-bold pt-3">Account Settings</div>
        <div class="py-5 ms-auto">
            <div class="card justify-content-start" style="width:30rem;">
                <div class="card-body row container">
                    <span class="col-3 pt-2  ms-2 fw-bold">Email</span>
                    <input type="email" class="form-control col" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="greuyan@gbox.adnu.edu.ph">
                </div>
                <div class="row">
                    <div class="col-2 py-3 mb-3 ms-1"></div>
                    <button class="account-btn mx-auto col-4 fw-bold">Forgot Password?</button>
                    <button class="account-btn mx-auto col-3 fw-bold text-danger">Delete Account</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-2">
        <div class="fs-4 fw-bold pb-5 pt-3">Your Reviews</div>
        {{-- <div class="d-flex flex-column gap-5">
            @foreach ($dorms['data'] as $dorm) 
             <x-dorm-list :dorm="$dorm"></x-dorm-list>  
            @endforeach
        </div> --}}
    </div>
</div>
<div class="d-flex justify-content-end py-3 px-5 me-3 mb-3">
    <p class="col-4 fw-bold pt-4 ">Showing 2 of 87 reviews</p>
    <button class="col-2 blue-btn text-white rounded-4">Load More</button>
</div>
<x-footer></x-footer>


@endsection