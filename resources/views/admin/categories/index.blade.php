@extends('layouts.admin')

@section('page_title')
    Categories
@endsection

@section('content')
    <div class="mt-5 d-flex align-items-center">
        <h3 class="m-0 me-3">Tabella Category</h3>
        <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary icon" href=""><i
                class="fa-solid fa-circle-plus"></i></a>
    </div>
    <div class="mt-3">
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
                            <a href="{{route('admin.categories.edit', $category->slug)}}">Edit</a>
                            <a href="{{ route('admin.categories.show', $category->slug) }}">Show</a>
                            <form action="{{route('admin.categories.destroy', $category->slug)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                
                                <i onclick="window.Func.submitForm(event)" class="fa-solid fa-trash text-danger cursor-pointer"></i>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="pagination">
                {{$categories->links('pagination::bootstrap-4')}}
            </div> --}}
    </div>
@endsection
