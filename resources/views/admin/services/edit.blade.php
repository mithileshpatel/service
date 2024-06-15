@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Edit Service</div>

                <div class="card-body">
                    <!-- Edit Form -->
                    <form action="{{ route('services.update', $service->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Form fields here -->
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $service->title }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" class="form-control">{{ $service->description }}</textarea>
                        </div>
                       <div class="form-group">
    <!-- Display images -->
    <h1>IMAGES</h1>
    @if(is_array($service->images) || is_object($service->images))
        @foreach($service->images as $image)
            <div class="image-container" style="position: relative; display: inline-block; margin-bottom: 10px;">
                <img src="{{ asset('storage/images/' . $image) }}" alt="Image" style="width: 100px; height: auto;">
                <form action="{{ route('services.removeImage', ['service' => $service, 'image' => $image]) }}" method="POST" style="position: absolute; top: 0; right: 0;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> <!-- Assuming you're using Font Awesome for icons -->
                    </button>
                </form>
            </div>
        @endforeach
    @endif
</div>

                        
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary">Update Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
