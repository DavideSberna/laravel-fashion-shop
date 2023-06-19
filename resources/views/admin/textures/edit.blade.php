@extends("layouts.admin")

@section('title')
    Edit
@endsection

@section('content')
    <h1 class="text-center pb-5">Edit - {{ $texture->name }}</h1>

    <form action="{{ route('admin.textures.update', $texture->slug) }}" enctype="multipart/form-data" method="POST"
        class="d-flex justify-content-center">

        @csrf
        @method("PUT")

        <div class="d-flex flex-column gap-4 border border-secondary px-5 py-3">

            <div class="d-flex flex-column align-items-start gap-1 pt-4">

                <label for="name" class="cursor-pointer">Nome</label>
                <input type="text" name="name" id="name" value="{{$texture->name}}" placeholder="Nome..." class="form-control @error('name') is-invalid @enderror">
                
                @if ($errors->has("name"))
                <strong class="text-danger">
                    {{ $errors->first('name') }}
                </strong>
                @endif

            </div>
    
            <input type="submit" value="Modifica Texture" class="gold-button mt-5">
        </div>

    </form>
@endsection
