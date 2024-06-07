@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ $category->description }}" required>
                            </div>

                            <div class="form-group">
                                <label for="fileUpload">Image Upload</label>
                                @if ($category->image)
                                    <div class="mb-3">
                                        <img src="{{ $category->image }}" alt="{{ $category->name }}" style="width: 100px; height: auto;">
                                        <a href="{{ route('categories.removeImage', $category->id) }}" class="btn btn-sm btn-danger">Remove Image</a>
                                    </div>
                                @endif
                                <input type="file" class="form-control" id="fileUpload" name="image" accept="image/*">
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
