@extends('layouts.app')
@section('content')

<section class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Ecommerce per estetisti!</h1>
            <p class="lead mb-0">Dai un'altro volto al tuo negozio</p>
            <div class="d-sm-none">
                <!-- <select name="category" id="category">
                    <option>Scegli la categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}"><a href="{{ route('home', ['category_id' => $category->id]) }}">{{ $category->name }}</a></option>
                        @endforeach
                </select> -->

            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                @foreach ($products as $product)
                <div class="col-lg-6">
                    <div class="card mb-4">
                        <a href="{{ route('show', $product->slug) }}">
                            @if (!empty($product->cover_image))
                            <img class="card-img-top card-img" src="{{ $product->cover_image }}" alt="{{ $product->name }}" />
                            @else
                            <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="Image not available" />
                            @endif
                        </a>
                        <div class="card-body">
                            <h2 class="card-title h4">{{ $product->name }}</h2>
                            <div class="small text-muted">{{ $product->created_at }}</div>
                            <p class="card-text">{{ Str::limit($product->description, 80, '...') }}</p>
                            <p class="card-text">Price: €{{ $product->price }}</p>
                            <p class="card-text">Category: {{ $product->category->name }}</p>

                            @if (!empty($product->category->name))
                            <p class="card-text">Brand: Nessun brand collegato</p>
                            @else
                            <p class="card-text">Brand: {{ $product->brand->name }}</p>
                            @endif

                            <a class="btn btn-primary btn-hover" href="{{ route('show', $product->slug) }}">Acquista</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="{{ route('home') }}">
                                        All Products
                                    </a>
                                </li>
                                @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('home', ['category_id' => $category->id]) }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">Brands</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="{{ route('home') }}">
                                        All Products
                                    </a>
                                </li>
                                @foreach ($brands as $brand)
                                <li>
                                    <a href="{{ route('home', ['brand_id' => $brand->id]) }}">
                                        {{ $brand->name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection