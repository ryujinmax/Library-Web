@extends('layouts.parent')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="badge bg-purple text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Boku</div>
                <h5 class="card-title">Daftar Book</h5>
                <a href="{{ route('listbook.create') }}" class="btn btn-primary mt-3">Tambah Buku</a>

                <table class="table table-striped mb-0 mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($listBook as $row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->writer }}</td>
                                <td>{{ $row->publisher }}</td>
                                <td>{{ $row->categoryBook }}</td>
                                <td>{!! Str::limit($row->description) !!}</td>
                                <td>
                                    <a href="" class="btn btn-info btn-sm mb-2">Detail</a>

                                    <a href="{{ route('listbook.edit', $row->id) }}" class="btn btn-warning btn-sm mb-2">Edit</a>

                                    <form action="{{ route('listbook.destroy', $row->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody><!-- end table -->
                </table>
            </div>
        </div>
    </div>
@endsection
