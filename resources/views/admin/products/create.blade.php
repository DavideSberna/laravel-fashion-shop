@extends('layouts.admin')
@section('content')






    <div class="container">
        <div class="row mt-5">
            <div class="mb-4 icon">
                <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary"
                    href="{{ route('admin.products.index') }}"><i
                        class="fa-solid fa-circle-chevron-left text-secondary"></i></a>
            </div>
            <!-- <div class="mb-3">
                <h3>Aggiungi nuovi progetti</h3>
                @if ($errors->any())
    <div class="alert alert-danger">
                    <ul class="">
                        @foreach ($errors->all() as $error)
    <li class="list-group-item">-{{ $error }}</li>
    @endforeach
                    </ul>
                </div>
    @endif
            </div> -->
            <div class="col-6">
                <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="name"
                            id="name" aria-describedby="emailHelp" value="{{ old('name') }}">
                    </div>
                    <div class="mb-3">
                        <label for="cover_image">Image</label>
                        <input type="file" class="form-control" name="cover_image" id="cover_image">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror"
                            name="description" id="description" value="{{ old('description') }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">price</label>
                        <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                            id="price" value="{{ old('price') }}">
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Seleziona categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="brand_id">Brand</label>
                        <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                            <option value="">Seleziona brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>



@endsection
