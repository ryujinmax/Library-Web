@extends('layouts.parent')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Create Category Book</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="mb-3">
                        <label class="form-label" for="formrow-firstname-input">Category Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ex : Sosial" value="{{ old('name') }}">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form><!-- end form -->
            </div>
        </div>
    </div>
@endsection
