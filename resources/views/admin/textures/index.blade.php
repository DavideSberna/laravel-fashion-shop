@extends('layouts.app')
@section('content')
    <div class="container">
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
            <!-- {{-- <div class="pagination">
                {{$texture->links('pagination::bootstrap-4')}}
            </div> --}} -->
        </div>
    </div>
@endsection
