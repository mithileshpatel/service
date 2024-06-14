<!-- resources/views/categories/show.blade.php -->

@extends('layout')

@section('content')
    
<p>Category Name: {{ $category->name }}</p>
    @foreach($services as $service)
    @if($service->category == $category->id)
     
     
    <div class="row">
        <div class="card h-100 m-2 p-2">
            <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top" alt="Service Image" style="height: 200px;">
            <div class="card-body">
                <p class="card-title" style="font-size: 14px;">{{ $service->title }}</p>
            </div>
            <!-- <div class="card-footer">
                <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-primary btn-sm">View Details</a>
            </div> -->
        </div>
    </div>
   
    <!-- Add other details as needed -->
    @endif
    @endforeach
   
@endsection