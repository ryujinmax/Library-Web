@extends('layouts.parent')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama Kategori</h5>
                <a href="{{ route('category.create') }}" class="btn btn-primary mt-3">Buat Kategori</a>

                <table class="table table-striped mb-0 mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Slug</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryBook as $row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>Buku {{ $row->name }}</td>
                                <td>{{ $row->slug }}</td>
                                <td>
                                    <div class="d-sm-flex flex-column gap-2">
                                        <a href="{{ route('category.edit', $row->id) }}" class="btn btn-success">
                                            Edit
                                        </a>
                                        <form action="{{ route('category.destroy', $row->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger w-100">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody><!-- end table -->
                </table>
            </div>
        </div>
    </div>
@endsection
