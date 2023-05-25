@extends('layouts.parent')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Edit Data Buku</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('listbook.update', $listBook->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">Nama Buku</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ $listBook->name }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">Penulis</label>
                        <input type="text" name="writer" class="form-control" id="writer"
                            value="{{ $listBook->writer }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">Penerbit</label>
                        <input type="text" name="publisher" class="form-control" id="publisher"
                            value="{{ $listBook->publisher }}">
                    </div>

                    <label class="col-md-2 col-form-label">Pilih Kategori</label>
                    <div class="col-md-20 mb-4">

                        <select class="form-select" name="categoryBook">
                            @if ($listBook->category)
                                <option selected value="{{ $listBook->category->id }}">{{ $listBook->category->name }}
                                </option>
                            @else
                                @foreach ($categoryBook as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            @endif
                        </select>

                    </div>

                    <label class="form-label" for="formrow-firstname-input">Deskripsi Buku</label>
                    <div class="form-floating ">
                        <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description"
                            style="height: 100px">{{ $listBook->description }}</textarea>
                        <label for="floatingTextarea2">Deskripsi Buku</label>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Update</button>
                    </div>
                </form><!-- end form -->
            </div>
        </div>
    </div>
@endsection
