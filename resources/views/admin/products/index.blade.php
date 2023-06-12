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


                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td><img class="post-img-size img-table" src="{{ $product->cover_image }}" alt="{{ $product->name }}">
                        </td>
                        <td>{{ Str::limit($product->description, 40, '...') }}</td>
                        <td>{{ $product->price }} euro</td>
                        <td>{{ $product->category ? $product->category->name : 'Senza categoria' }}</td>

                        <td>
                            <a href="http://">Edit</a>
                            <a href="{{ route('admin.products.show', $product->slug) }}">Show</a>
                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete">
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
