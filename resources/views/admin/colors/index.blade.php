@extends('layouts.admin')

@section('page_title')
    Colors
@endsection

@section('content')
    <div class="container">
        <div class="text-center pt-5 pb-5">
            <h1 style="color: #f98e54;" class="fw-bold text-uppercase fst-italic">Colors</h1>
        </div>
        <div class="row pb-5">
            @foreach ($colors as $color)
                <div class="col-12 col-sm-12 col-md-3 col-lg-2 mt-4 mb-4">
                    <div class="card w-100 h-100 mx-auto" style="background-color: #B7FAF2">
                        <div class="card-body">
                            <div class="card-title text-uppercase fw-bold text-center pt-2">
                                <a href="#" class="text-decoration-none text-dark">
                                    <span style="color: #f98e54;">Color Name:</span>
                                    <div>
                                        {{ $color->colorName }}
                                    </div>
                                </a>
                            </div>
                            <div class="card-text text-center">
                                <div>Hex Value: <span class="text-secondary">{{ $color->hexValue }}</span></div>
                            </div>
                            <div class="text-center pt-3">
                                <a href="#"><i style="color: #f98e54;" class="fa-solid fa-droplet fs-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
