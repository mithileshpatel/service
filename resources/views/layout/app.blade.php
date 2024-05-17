<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Include any CSS or meta tags here -->
</head>
<body>
    @include('layouts.partials.header')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('layouts.partials.sidebar')
            </div>
            <div class="col-md-9">
                <div class="content">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

    @include('layouts.partials.footer')
    <!-- Include any JavaScript files here -->
</body>
</html>
