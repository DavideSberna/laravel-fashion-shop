@extends('layouts.app')
@section('content')






    <div class="container mb-5">
        <div class="row">
            <div class="mt-5">
                <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary" href="{{ route('home') }}"><i class="fa-solid fa-circle-chevron-left text-secondary"></i> Torna alla Homepage</a>
            </div>
            <div class="col-sm-12 pt-5">
                <div class="card mb-4">
                    <a href="#!"><img class="card-img-top" src="{{ $product->cover_image }}" alt="{{ $product->name }}" /></a>
                    <div class="card-body">
                        <h2 class="card-title">{{$product->name}}</h2>
                        <p class="small text-muted">Data di creazione: {{$product->created_at}}</p>
                        <p class="card-text">{{$product->description}}</p>
                        <a class="btn btn-primary btn-lg" href="#">Acquista ora</a>
                    </div>
                </div>
                <div>
                    <h4>Dettagli del prodotto</h4>
                    <p>{{$product->description}}</p>
                </div>
            </div>
        </div>
        @if(count($relatedProducts) !== 0)
        <div class="d-none d-sm-block">
            <div class="row mt-5">
                <h4>Prodotti correlati</h4>
                @foreach ($relatedProducts as $relatedProduct)
                    <div class="col-md-4 col-lg-3">
                        <div class="card mb-4">
                            <a href="{{ route('show', $relatedProduct->slug) }}">
                                <img class="card-img-top card-img" src="{{ $relatedProduct->cover_image }}" alt="{{ $relatedProduct->name }}" />
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                                <p class="small text-muted">{{ $relatedProduct->created_at }}</p>
                                <p class="card-text">{{ Str::limit($relatedProduct->description, 80, '...') }}</p>
                                <a class="btn btn-primary btn-sm" href="{{ route('show', $relatedProduct->slug) }}">Dettagli</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="carouselExample" class="carousel slide d-sm-none">
            <div class="carousel-inner ps-3 pe-3 mt-5">
                <h4>Prodotti correlati</h4>
                @foreach ($relatedProducts as $relatedProduct)
                <div class="card mt-2 carousel-item{{ $loop->first ? ' active' : '' }}">
                    <a href="{{ route('show', $relatedProduct->slug) }}">
                        <img class="card-img-top card-img" src="{{ $relatedProduct->cover_image }}" alt="{{ $relatedProduct->name }}">
                    </a>
                    <div class="card-body p-3">
                        <h5 class="card-title">{{ $relatedProduct->name }}</h5>
                        <p class="small text-muted">{{ $relatedProduct->created_at }}</p>
                        <p class="card-text">{{ Str::limit($relatedProduct->description, 80, '...') }}</p>
                        <a class="btn btn-primary btn-sm" href="{{ route('show', $relatedProduct->slug) }}">Dettagli</a>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        @endif
    </div>




@endsection