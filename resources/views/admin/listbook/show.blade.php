@extends('layouts.parent')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Buku</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="formrow-firstname-input">Nama Buku</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $listBook->name }}"
                        disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="formrow-firstname-input">Penulis</label>
                    <input type="text" name="writer" class="form-control" id="writer" value="{{ $listBook->writer }}"
                        disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="formrow-firstname-input">Penerbit</label>
                    <input type="text" name="publisher" class="form-control" id="publisher"
                        value="{{ $listBook->publisher }}" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="formrow-firstname-input">Kategori</label>
                    <input type="text" name="categoryBook" class="form-control" id="categoryBook"
                        value="{{ $listBook->categoryBook }}" disabled>
                </div>

                <div class="form-floating ">
                    <textarea class="form-control" placeholder="Leave a comment here" name="description" id="description"
                        style="height: 100px" disabled>{!! $listBook->description !!}</textarea>
                </div>

                <div class="mt-4">
                    <a href="{{ route('listbook.index', $listBook->id) }}" class="btn btn-secondary">
                        Back
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
