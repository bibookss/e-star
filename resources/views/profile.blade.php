@extends('layouts.app')

@section('content')

<div class="p-5 my-5 container">
    <div class="row">
        <div class="col-6">
            <div class="fs-4 fw-bold pt-3">Account Settings</div>
            <div class="py-5 ms-auto">
                <div class="card justify-content-start" style="width:35rem;">
                    <div class="card-body row container">
                        <span class="col-3 pt-2 ms-2 fw-bold">Email</span>
                        <span class="col mt-2 fw-bold"> {{ $data['email'] }}</span>
                    </div>
                    <div class="row">
                        <div class="col-2 py-3 mb-3 ms-1"></div>
                        <button class="account-btn mx-auto col-4 fw-bold">Forgot Password?</button>
                        <button class="account-btn mx-auto col-3 fw-bold text-danger">Delete Account</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="fs-4 fw-bold pb-5 pt-3">Your Reviews</div>
            <div class="d-flex flex-column gap-5">
                <div class="d-flex flex-column gap-5">
                    @foreach ($data['posts'] as $post) 
                      <x-dorm-post :post="$post" />
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<x-footer></x-footer>


@endsection

