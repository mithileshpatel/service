@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Rooms</h1>
            <a href="{{ url('/admin/rooms/create') }}" class="btn btn-primary">Add New Room</a>
            <br><br>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Images</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($rooms as $room)
                            <tr>
                                <td>{{ $room->name }}</td>
                                <td>{{ $room->description }}</td>
                                <td>
                                    @if ($room->image)
                                        @foreach (json_decode($room->image) as $image)
                                            <img src="{{ asset('storage/images/' . $image) }}" alt="{{ $room->name }}" class="img-thumbnail" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/admin/rooms/' . $room->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ url('/admin/rooms/' . $room->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">No rooms found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
