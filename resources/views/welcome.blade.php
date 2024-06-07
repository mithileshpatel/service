@extends('layout')

@section('content')

<div class="card  h-100 m-2 p-2">
<h2>Home services at your doorstep</h2>
    <div class="row">
        
    <div class="card h-100  m-2 p-2">
        <div class="col-lg-12 mb-4">
        <h5> What are you looking for?</h5>
            <div class="row">
             
                @foreach($categories as $category)
                    <div class="col-lg-4 col-md-6 mb-4">
                        
                            <img src="{{ $category->image }}" alt="{{ $category->name }}" class="card-img-top" style="width: 100px; height: 100px;  object-fit: cover;">
                            <div >
                                <p >{{ $category->name }}</p>
                            </div>
                        
                    </div>
                @endforeach
            </div>
            </div>
        </div>
        <div class="col-lg-5 mb-4">
            <div class="card m-2 p-2">
                <img src="{{ asset('storage/images/service.webp') }}" class="card-img-top" alt="Service Image">
            </div>
        </div>
    </div>
        
</div>

<div class="card m-2 p-2">
    <h1 class="text-center">Spa for Women</h1>
    <div class="row">
        @foreach($services as $service)
            @if($service->category == '3')
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
    <h1 class="text-center">Spa for Man</h1>
    <div class="row">
        @foreach($services as $service)
            @if($service->category == '1')
                <div class="col-lg-4 col-md-6 mb-4">
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
            @endif
        @endforeach
    </div>
</div>

<div class="card m-2 p-2">
    <h1 class="text-center">Ac services</h1>
    <div class="row">
        @foreach($services as $service)
            @if($service->category == '4')
                <div class="col-lg-4 col-md-6 mb-4">
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
            @endif
        @endforeach
    </div>
</div>
@endsection
