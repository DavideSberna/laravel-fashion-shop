@extends('layouts.admin')
@section('content')



    <div class="mt-5 d-flex align-items-center">

        <h3 class="m-0 me-3">Tabella Brands</h3>
        <a class="link-offset-2 link-underline link-underline-opacity-0 text-secondary icon" href=""><i class="fa-solid fa-circle-plus"></i></a>

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
        
    </div>


@endsection
