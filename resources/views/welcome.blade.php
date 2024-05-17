@extends('layout')

@section('content')

<div  style="border: 1px solid black;class="container mt-5">

    <div class="row">
        <div class="col-lg-4 col-md-6 mb-4">
            <div style="border: 1px solid black;margin:10px;padding:10px;" class="row">
        @foreach($services as $service)
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
                
                <img  src="{{ asset('storage/images/' . $service->images[0]) }}" class="img img-responsive" alt="Service Image " style="height: 200px;>
             
               <p style="font-size:10px;"class="card-title">{{ $service->title }}<p>
                  
                
               <!--  <div class="card-footer">
                    <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-primary btn-sm">View Details</a>
              </div> -->
            </div>
        </div>
        @endforeach
    </div>
</div>
    <div class="col-lg-4 col-md-6 mb-4">
        <div style="border: 1px solid black;margin:10px;padding:10px;" class="row">
            <img src="{{ asset('storage/images/service.webp') }}" class="card-img-top" alt="Service Image">
        </div></div></div>
        
</div>
<div  style="border: 1px solid black;class="container mt-5">
    <h1 class="text-center">Spa for woman</h1>
<div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div style="border: 1px solid black;margin:10px;padding:10px;" class="row">
    @foreach($services as $service)
        @if($service->category == '3')
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top" alt="Service Image" style="height: 200px;">
                    <div class="card-body">
                        <p class="card-title" style="font-size:10px;">{{ $service->title }}</p>
                    </div>
                   <!-- <div class="card-footer">
                        <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-primary btn-sm">View Details</a>
                    </div>-->
                </div>
            </div>
        @endif
    @endforeach
</div></div></div></div>
<div  style="border: 1px solid black;class="container mt-5">
    <h1 class="text-center">Spa for Mans</h1>
<div class="row">
    <div class="col-lg-4 col-md-6 mb-4">
        <div style="border: 1px solid black;margin:10px;padding:10px;" class="row">
    @foreach($services as $service)
        @if($service->category == '4')
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top" alt="Service Image" style="height: 200px;">
                    <div class="card-body">
                        <p class="card-title" style="font-size:10px;">{{ $service->title }}</p>
                    </div>
                    <!--<div class="card-footer">
                        <a href="{{ route('admin.services.show', $service->id) }}" class="btn btn-primary btn-sm">View Details</a>
                    </div>-->
                </div>
                
            </div>
        @endif
    @endforeach
</div></div></div></div>
@endsection

