@extends('layouts.app')

@section('content')

<div class="p-5 my-5 container">
    <div class="row">
        <div class="col-6">
            <div class="fs-4 fw-bold pt-3">Account Settings</div>
            <div class="py-5 ms-auto">
                <div class="card justify-content-start p-2" style="width:35rem;">
                    <div class="card-body row">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                            <input readonly type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="{{ $data['email'] }}">
                        </div>
                    </div>
                    <div class="row text-center py-2">
                        <div class="col-6">
                            <button class="btn btn-secondary fw-bold">Forgot Password?</button>
                        </div>
                        <div class="col-6">
                            <button class="fw-bold btn btn-warning">Delete Account</button>
                        </div>
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

