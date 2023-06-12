@extends('layouts.admin')

@section('content')
    <h1 class="my-4">Dashboard</h1>

    <hr>
    <hr>

    <h2 class="pt-5">Prodotti</h2>

    <hr>

    <div class="row px-4 border-start border-end border-secondary">

        @foreach ($products as $product)
            <div
                class="col-12 col-md-6 col-lg-4 col-xl-3 col-xxl-2 d-flex justify-content-center justify-content-md-start border-end border-secondary border-bottom pb-3 mb-3">
                <img src="{{ $product->cover_image }}" alt="No image found" class="img-size">
            </div>

            <div
                class="col-12 col-md-6 col-lg-8 col-xl-9 col-xxl-10 d-flex flex-column gap-1 justify-content-center border-bottom  border-secondary pb-3 mb-3">

                <h4>{{ $product->name }}</h4>

                <span>{{ $product->description }}</span>

                <span><small class="text-decoration-underline">Categoria</small>: {{$product->category->name}}</span>

                <span><small class="text-decoration-underline">Brand</small>: {{$product->brand->name}}</span>

                <span><small class="text-decoration-underline">Prezzo</small>: {{$product->price}} €</span>


                <div class="align-self-end d-flex gap-3 pt-4">
                    <a href="{{route('admin.products.edit', $product->slug)}}">
                        <i class="fa-solid fa-edit al-icon"></i>
                    </a>

                    <a href="{{route('admin.products.show', $product->slug)}}">
                        <i class="fa-solid fa-eye al-icon hover-yellow"></i>
                    </a>

                    <a href="{{route('admin.products.destroy', $product->id)}}">
                        <i class="fa-solid fa-trash al-icon hover-red"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <div class="pagination py-3">
        {{ $products->links('pagination::bootstrap-4') }}
    </div>


    <hr class="pb-5">


    <h2 class="pb-1">Brands</h2>

    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Logo</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td>
                        <img class="post-img-size img-table" src="{{ $brand->logo }}" alt="{{ $brand->name }}">
                    </td>

                    <td>
                        <a href="http://">Edit</a>
                        <a href="{{ route('admin.brands.show', $brand->slug) }}">Show</a>
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
        {{ $brands->links('pagination::bootstrap-4') }}
    </div>



    <hr class="pb-5">


    <h2 class="pb-1">Categorie</h2>

    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Last Update</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>

                    <td>
                        <a href="http://">Edit</a>
                        <a href="{{ route('admin.categories.show', $category->slug) }}">Show</a>
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
        {{ $categories->links('pagination::bootstrap-4') }}
    </div>


    <hr class="pb-5">


    <h2 class="pb-1">Textures</h2>

    <table class="table table-bordered">
        <thead>
            <tr>

                <th>Id</th>
                <th>Name</th>
                <th>Last Update</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($textures as $texture)
                <tr>
                    <td>{{ $texture->id }}</td>
                    <td>{{ $texture->name }}</td>

                    <td>
                        <a href="http://">Edit</a>
                        <a href="{{ route('admin.textures.show', $texture->slug) }}">Show</a>
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
        {{ $categories->links('pagination::bootstrap-4') }}
    </div>

@endsection
