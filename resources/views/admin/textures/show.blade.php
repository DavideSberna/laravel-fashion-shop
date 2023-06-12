@extends('layouts.admin')

@section('page_title')
    Texture
@endsection

@section('content')
    <div class="">
        <div class="row mt-5">
            <div class="mb-4 icon">
                <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary"
                    href="{{ route('admin.textures.index') }}"><i
                        class="fa-solid fa-circle-chevron-left text-secondary"></i></a>
            </div>
            <!-- @if (session()->has('message'))
    <div class="alert alert-success">
                            {{ session()->get('message') }}
                        </div>
    @endif -->
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">{{ $texture->name }}</h3>
                        <p>{{ $texture->updated_at }}</p>



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
    </div>
@endsection
