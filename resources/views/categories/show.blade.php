@extends('layout')

@section('content')
<div class="card m-1 p-1">
  <div class="row">
    <div class="col-lg-4 col-md-4 mb-4">
        <h5 class="m-2 p-2">What are you looking for?</h5>
      <div class="card m-2 p-2 shadow-lg">
        <div class="row">
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
      
      <div id="recommended-services">
        @foreach($services as $service)
            @if($service->category == $category->id)
                <div class="row service-detail" id="service-{{ $service->id }}" style="display: none;">
                    <div class="col-lg-6 col-md-12">
                        <img src="{{ asset('storage/images/' . $service->images[0]) }}" class="card-img-top rounded" alt="Service Image" style="height: 100px; width:100px;">
                        <p class="card-title text-left" style="font-size: 18px;">{{ $service->title }}</p>
                    </div>
                    <div class="col-lg-3 col-md-12 mb-4">
                        <div class="row m-2">
                            <p class="text-left" style="font-size: 12px;">Price: {{ $service->price }} INR</p>
                            <p class="text-left" style="font-size: 12px;">Description: {{ $service->description }}</p>
                            <div id="quantity-{{ $service->id }}" class="d-none">
                              <button onclick="updateQuantity({{ $service->id }}, -1)" class="btn btn-secondary">-</button>
                              <span id="quantity-value-{{ $service->id }}">1</span>
                              <button onclick="updateQuantity({{ $service->id }}, 1)" class="btn btn-secondary">+</button>
                          </div>
                          <form method="POST" action="{{ route('cart.add') }}" class="mt-2">
                              @csrf
                              <input type="hidden" name="service_id" value="{{ $service->id }}">
                              <input type="hidden" name="quantity" id="input-quantity-{{ $service->id }}" value="1">
                              <button type="submit" class="btn btn-primary" id="addBtn-{{ $service->id }}">Add</button>
                          </form>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
      </div>
    </div>
     <!-- Service cart -->
    <div class="card ">
      <h5 class="m-2 p-2">Cart</h5>
      <div id="cart" class="m-2 p-2">
        @if (session('cart'))
          @foreach (session('cart') as $item)
            <div class="cart-item">
              <p>{{ $item['service_title'] }} - {{ $item['quantity'] }} x {{ $item['price'] }} INR</p>
              <form method="POST" action="{{ route('cart.remove') }}">
                @csrf
                <input type="hidden" name="service_id" value="{{ $item['service_id'] }}">
                <button type="submit" class="btn btn-danger">Remove</button>
              </form>
            </div>
          @endforeach
        @else
          <p>No items in cart</p>
        @endif
      </div>
      <p id="total-price" class="m-2 p-2">Total Price: {{ session('total_price', 0) }} INR</p>
    </div>
  </div>
</div>
<div id="error-message" class="alert alert-danger" style="display: none;"></div>
@endsection

@section('scripts')
<script>
function showServiceDetails(serviceId) {
    // Show the service details
    document.querySelectorAll('.service-detail').forEach(detail => {
        detail.style.display = 'none';
    });
    document.getElementById('service-' + serviceId).style.display = 'block';
    console.log('Showing details for service ID:', serviceId);
}

function showQuantity(serviceId) {
    document.getElementById('quantity-' + serviceId).classList.remove('d-none');
    document.getElementById('addBtn-' + serviceId).classList.add('d-none');
    console.log('Showing quantity for service ID:', serviceId);
}

function updateQuantity(serviceId, change) {
    let quantityElement = document.getElementById('quantity-value-' + serviceId);
    let inputQuantityElement = document.getElementById('input-quantity-' + serviceId);
    let newQuantity = parseInt(quantityElement.innerText) + change;
    if (newQuantity < 1) newQuantity = 1;
    quantityElement.innerText = newQuantity;
    inputQuantityElement.value = newQuantity;
    console.log('Updated quantity for service ID:', serviceId, 'to:', newQuantity);
}
</script>
@endsection
