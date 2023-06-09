@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<div>
<div class="d-flex" id=wrapper>
        {{-- @include('partials.sidebar') --}}
        <div class="container-fluid px-4">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">Descrizione</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Texture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->name }}</td>
                            <td>
                                @if ($product->cover_image)
                                    <img src="{{ $product->cover_image }}" alt="Immagine di copertina">
                                @else
                                    Nessuna immagine
                                @endif
                            </td>
                            <td>{{ $product->description ?: 'Nessuna descrizione disponibile' }}</td>
                            <td>{{ $product->price ? '€' . $product->price : 'Prezzo non disponibile' }}</td>
                            <td>{{ $product->brand ? $product->brand->name : 'Nessun brand associato' }}</td>
                            <td>{{ $product->category ? $product->category->name : 'Nessuna categoria associata' }}</td>
                            <td>{{ $product->texture ? $product->texture->name : 'Nessuna texture associata' }}</td>
                            <td>{{ $product->created_at }}</td>
                            <td>{{ $product->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $projects->links('vendor.pagination.bootstrap-5') }} --}}
        </div>
    </div>
    </div>
</div>
@endsection
