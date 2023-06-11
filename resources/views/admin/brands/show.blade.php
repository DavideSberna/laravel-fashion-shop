@extends('layouts.admin')
@section('content')



    <div class="row mt-5">
        <div class="mb-4 icon">           
            <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary" href="{{ route('admin.products.index') }}"><i class="fa-solid fa-circle-chevron-left text-secondary"></i></a>
        </div>
        <!-- @if (session()->has('message'))
    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
    @endif -->
        <div class="col">
            <div class="card">
                <img src="{{ $product->cover_image }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h3 class="card-title">{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>Price: {{ $product->price }} euro</p>
                    <p>Brand: {{ $product->brand->name }}</p>
                    <p>category: {{ $product->category->name }}</p>



                    <div>
                        <span class="btn btn-success"><a
                                class="link-offset-2 link-underline link-underline-opacity-0 text-white"
                                href="">Edit</a></span>
                        <span class="btn btn-danger"><a
                                class="link-offset-2 link-underline link-underline-opacity-0 text-white"
                                href="">Delete</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
