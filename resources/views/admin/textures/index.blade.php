@extends('layouts.admin')

@section('page_title')
    Textures
@endsection

@section('content')
    <div class="">
        <div class="mt-5 d-flex align-items-center">
            <h3 class="m-0 me-3">Tabella Texture</h3>
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
                    @foreach ($textures as $texture)
                        <tr>
                            <td>{{ $texture->id }}</td>
                            <td>{{ $texture->name }}</td>

                            <td>
                                <a href="{{route('admin.textures.edit', $texture->slug)}}">Edit</a>
                                <a href="{{ route('admin.textures.show', $texture->slug) }}">Show</a>
                                <form action="{{route('admin.textures.destroy', $texture->slug)}}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <i onclick="window.Func.submitForm(event)" class="fa-solid fa-trash text-danger cursor-pointer"></i>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- {{-- <div class="pagination">
                {{$texture->links('pagination::bootstrap-4')}}
            </div> --}} -->
        </div>
    </div>
@endsection
