<!-- resources/views/services/edit.blade.php -->

@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
    <h1>Edit Service</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $service->title) }}" required>
        </div>
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price', $service->price) }}" required>
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ old('description', $service->description) }}</textarea>
        </div>
        
        <div class="form-group">
            <label for="images">Images</label>
            
            @if($service->images)
                <div class="mt-2">
                    @foreach($service->images as $image)
                        <img src="{{ asset('storage/images/' . $image) }}" alt="Service Image" style="width: 100px;">
                    @endforeach
                </div>
            @endif
            <input type="file" name="images[]" id="images" class="form-control" multiple>
        </div>
        
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ old('category', $service->category) }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div></div></div>
@endsection
