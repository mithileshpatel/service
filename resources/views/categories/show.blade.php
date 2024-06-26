@extends('layout')

@section('content')
<div class="card m-1 p-1">
  <div class="row">
    <div class="col-lg-4 col-md-4 mb-4">
        <h5 class="m-2 p-2">What are you looking for?</h5>
      <div class="card m-2 p-2 shadow-lg">
        <div class="row">
           
          <!-- Service Cards -->
          @foreach($services as $service)
            @if($service->category == $category->id)
              <div class="col-lg-4 col-md-6 mb-4">
                <div class="card img justify-content-center align-items-center service-card" data-service-id="{{ $service->id }}" onclick="showServiceDetails({{ $service->id }})">
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
    <div class="col-lg-6 col-md-6 mb-4 border">
      <h5 class="m-2 p-2">Recommended Services</h5>
      
      <p class="h6">Category Name: {{ $category->name }}</p>
      
      <!-- Service Details -->
      <div id="recommended-services">
        @foreach($services as $service)
            @if($service->category == $category->id)
                <div class="row service-detail" id="service-{{ $service->id }}" style="display: none;">
                    <div class="card h-50 w-50 m-2 p-2 shadow col-lg-6 col-md-12">
                        <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top rounded" alt="Service Image" style="height: 100px; width:100px;">
                        <div class="card-body">
                            <p class="card-title text-left" style="font-size: 18px;">{{ $service->title }}</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="row m-2">
                            <p class="text-left" style="font-size: 14px;">Price: {{ $service->price }} INR</p>
                            <p class="text-left" style="font-size: 14px;">Description: {{ $service->description }}</p>
                            <div id="quantity-{{ $service->id }}" class="d-none">
                              <button onclick="updateQuantity({{ $service->id }}, -1)" class="btn btn-secondary">-</button>
                              <span id="quantity-value-{{ $service->id }}">1</span>
                              <button onclick="updateQuantity({{ $service->id }}, 1)" class="btn btn-secondary">+</button>
                          </div>
                          <a onclick="showQuantity({{ $service->id }})" class="btn btn-primary mt-2" id="addBtn-{{ $service->id }}">Add</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
      </div>
  </div>
   </div></div>

   <script>
   
  </script>
@endsection
