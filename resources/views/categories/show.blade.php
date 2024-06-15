<!-- resources/views/categories/show.blade.php -->

@extends('layout')

@section('content')
<div class="card m-2 p-2">
  <div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
      <div class="card m-2 p-2 shadow-lg">
        <div class="row">
          <!-- Service Cards -->
          @foreach($services as $service)
            @if($service->category == $category->id)
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card img justify-content-center align-items-center" id="openService" onclick="navigateToLink({{ $category->id }})">
                  <a href="#">
                    <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                  </a>
                  <p class="card-text text-center">
                    <a href="#" class="text-dark">
                      {{ $service->title }}
                    </a>
                  </p>
                </div>
              </div>
            @endif
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-4">
      <p class="h2">Category Name: {{ $category->name }}</p>
      <!-- Service Details -->
      @foreach($services as $service)
        @if($service->category == $category->id)
          <div class="row">
            <div class="card h-100 m-2 p-2 shadow">
              <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top rounded" alt="Service Image" style="height: 200px;">
              <div class="card-body">
                <p class="card-title text-center" style="font-size: 18px;">{{ $service->title }}</p>
              </div>
              <!--
              <div class="card-footer">
                <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-primary btn-sm">View Details</a>
              </div>
              -->
            </div>
          </div>
          <!-- Add other details as needed -->
        @endif
      @endforeach
    </div>
  </div></div>
@endsection