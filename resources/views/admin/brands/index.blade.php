@extends('layouts.admin')

@section('page_title')
    Brands
@endsection

@section('content')
    <div class="mt-5 d-flex align-items-center">

        <h3 class="m-0 me-3">Tabella Brands</h3>
        <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary icon" href=""><i
                class="fa-solid fa-circle-plus"></i></a>

    </div>
    <div class="mt-3">
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
                            <a href="{{route('admin.brands.edit', $brand->slug)}}">Edit</a>
                            <a href="{{ route('admin.brands.show', $brand->slug) }}">Show</a>
                            <form action="{{ route('admin.brands.destroy', $brand->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <i onclick="window.Func.submitForm(event)" class="fa-solid fa-trash text-danger cursor-pointer"></i>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $brands->links('pagination::bootstrap-4') }}
        </div>
        
    </div>
@endsection
