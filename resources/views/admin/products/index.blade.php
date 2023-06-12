@extends('layouts.admin')
@section('content')
    <div class="mt-5 d-flex align-items-center">
        <h3 class="m-0 me-3">Tabella Product</h3>
        <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary icon"
            href="{{ route('admin.products.create') }}"><i class="fa-solid fa-circle-plus"></i></a>
    </div>
    <div class="mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>

                    <th>Id</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Action</th>


                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img class="post-img-size img-table" src="{{ $product->cover_image }}" alt="{{ $product->name }}"></td>
                        <td>{{ Str::limit($product->description, 40, '...') }}</td>
                        <td>{{ $product->price }} euro</td>
                        <td>{{ $product->category ? $product->category->name : 'Senza categoria' }}</td>
                        <td>{{ $product->brand ? $product->brand->name : 'Senza Brand' }}</td>
                        <td>
                            @if(count($product->colors) !== 0)
                                @foreach ( $product->colors as $color)
                                    {{ $color->colorName . ',' }}
                                @endforeach
                            @else
                                <p>Senza colori</p>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('admin.products.edit', $product->slug) }}">Edit</a>
                            <a href="{{ route('admin.products.show', $product->slug) }}">Show</a>
                            <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="delete-button btn btn-danger text-white"
                                    data-item-title="{{ $product->name }}"> <i class="fa-solid fa-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
