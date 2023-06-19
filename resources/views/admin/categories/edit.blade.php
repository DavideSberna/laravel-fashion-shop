@extends("layouts.admin")

@section('title')
    Edit
@endsection

@section('content')
    <h1 class="text-center pb-5">Edit - {{ $category->name }}</h1>

    <form action="{{ route('admin.categories.update', $category->slug) }}" enctype="multipart/form-data" method="POST"
        class="d-flex justify-content-center">

        @csrf
        @method("PUT")

        <div class="d-flex flex-column gap-4 border border-secondary px-5 py-3">

            <div class="d-flex flex-column align-items-start gap-1 pt-4">

                <label for="name" class="cursor-pointer">Nome</label>
                <input type="text" name="name" id="name" value="{{$category->name}}" placeholder="Nome..." class="form-control @error('name') is-invalid @enderror">
                
                @if ($errors->has("name"))
                <strong class="text-danger">
                    {{ $errors->first('name') }}
                </strong>
                @endif

            </div>
    
            <div class="d-flex flex-column align-items-start gap-1">
                <label for="image" class="cursor-pointer">Image</label>
                <input type="file" name="image" id="image">

                @if ($category->image == null)
                
                    <span class="w-100 text-center pt-2">Nessuna immagine inserita</span>

                @else
                    <div class="w-100 d-flex justify-content-center mt-3">
                        <img src="{{ asset('storage/' . $category->image)}}" alt="{{ $category->name }}" class="img-table">
                    </div>

                @endif
            </div>
    
            <input type="submit" value="Modifica Categoria" class="gold-button mt-5">
        </div>

    </form>
@endsection
