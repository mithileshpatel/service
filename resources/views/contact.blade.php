@extends('layout')

@section('content')







<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Contact US
                </div>
                <div class="card-body">
                    <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" class="form-control" name="fullname" id="fullName" placeholder="Enter Full Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" >
                        </div>
                        <div class="form-group">
                            <label for="Mono">Mobile No.</label>
                            <input type="tele" class="form-control" name="mono" id="mono" placeholder="Enter mobile no" >
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control " name="message" id="message" rows="3" placeholder="Write message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection