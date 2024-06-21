@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
    
            <div class="card">
                <div class="card-header">All Services</div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Title</th>
                                    
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Images</th>
                                    <th>Created At</th>
                                    <th>Modified At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->title }}</td>
                                   
                                    <td>{{ $service->category }}</td> <!-- Display category ID -->
                                    <td>{{ $service->categoryName() }}</td> <!-- Display category name -->
                                    <td>
                                        @if(is_string($service->images))
                                            @foreach(json_decode($service->images) as $image)
                                                <img src="{{ asset('storage/images' . $image) }}" alt="Image" style="width: 100px; height: auto;">
                                            @endforeach
                                        @elseif(is_array($service->images))
                                            @foreach($service->images as $image)
                                                <img src="{{ asset('storage/images/' . $image) }}" alt="Image" style="width: 100px; height: auto;">
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>{{ $service->created_at }}</td>
                                    <td>{{ $service->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('services.edit', $service->id) }}" target="_blank" class="btn btn-sm btn-primary">Edit</a>

                                        
                                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                                            
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  
@endsection
