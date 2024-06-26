@extends('layout')

@section('content')

<div class="card m-2 p-2">
<h2>Home services at your doorstep</h2>
    <div class="row">
        
    <div class="card   m-5 p-2">
        <div class="col-lg-12 mb-4">
        <h5> What are you looking for?</h5>
            <div class="row">
             
                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card img justify-content-center align-items-center" id="openService" onclick="navigateToLink({{ $category->id }})">
                         <a href="#">   <img  src="{{ $category->image }}" alt="{{ $category->name }}" class="card-img-top" style="width: 50px; height: 50px;  object-fit: cover;"></a>
                            <p class="card-text">
                            <a href="#" class=" text-dark"> <!-- Adding Bootstrap classes to remove default link styles -->
                                {{ $category->name }}
                            </a>
                        </p>
                        </div>
                    </div>
                @endforeach
            </div>
            </div>
        </div>
        <div class="col-lg-5 mb-4">
            <div class="card m-2 p-2">
                <img src="{{ asset('storage/images/collage.png') }}" class="card-img-top" alt="Service Image">
            </div>
        </div>
    </div>
        
</div>

<div class="card m-2 p-2">
    <h1 class="text-center">Spa for women's</h1>
    <div class="row">
   
        @foreach($services as $service)
            @if($service->category == '2')
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100  m-2 p-2">
                        <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top" alt="Service Image" style="height: 200px;">
                        <div class="card-body">
                            <p class="card-title" style="font-size: 14px;">{{ $service->title }}</p>
                        </div>
                        <!-- <div class="card-footer">
                            <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-primary btn-sm">View Details</a>
                        </div> -->
                    </div>
                </div>
            @endif
        @endforeach
    </div>
  
</div>

<div class="card m-2 p-2">
    <h1 class="text-center">Salon for Men's</h1>
    <div class="slider-container position-relative">
        <div class="slider-wrapper" id="slider-wrapper">
            @foreach($services as $service)
                @if($service->category == '1')
                    <div class="slide">
                        <div class="card h-100 m-2 p-2">
                            <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top" alt="Service Image" style="height: 200px;">
                            <div class="card-body">
                                <p class="card-title" style="font-size: 14px;">{{ $service->title }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
        <a href="javascript:void(0)" class="slide-arrow left" onclick="moveLeft()">&#9664;</a>
        <a href="javascript:void(0)" class="slide-arrow right" onclick="moveRight()">&#9654;</a>
    </div>
</div>

<div class="card m-2 p-2">
    <h1 class="text-center">Ac  & Appliance repair</h1>
    <div class="row">
       
        @foreach($services as $service)
            @if($service->category == '3')
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100 m-2 p-2">
                        <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top" alt="Service Image" style="height: 200px;">
                        <div class="card-body">
                            <p class="card-title" style="font-size: 14px;">{{ $service->title }}</p>
                            <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-primary btn-sm">View Details</a>
                        </div>
                        <!-- <div class="card-footer">
                            
                        </div> -->
                    </div>
                </div>
            @endif
        @endforeach
    </div>
   
</div>
@endsection
