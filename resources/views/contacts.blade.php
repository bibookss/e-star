@extends('layouts.app')

@section('content')
    <div class="p-5 m-5">
        <div class="m-5 card" style="width:50%;">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="/assets/reuyan-pic.jpg" class="contact-img ">
                        </div>
                        <div class="col mt-5" style="margin-left: 130px;">
                            <div class="fs-3 fw-bold">Gabriel Reuyan</div>
                            <div class="fs-4 text-warning fw-bold">Front-End</div>
                            <div class="fs-4 fw-bold">greuyan@gbox.adnu.edu.ph</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-5 card " style="width:50%;">
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-2">
                            <img src="/assets/perez-pic.png" class="contact-img">
                        </div>
                        <div class="col mt-5" style="margin-left: 130px;">
                            <div class="fs-3 fw-bold">Albert Perez</div>
                            <div class="fs-4 text-warning fw-bold">Back-End</div>
                            <div class="fs-4 fw-bold">albperez@gbox.adnu.edu.ph</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer></x-footer>
@endsection