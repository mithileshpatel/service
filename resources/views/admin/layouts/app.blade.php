<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <!-- Add your CSS includes here -->
</head>
<body>
    <!-- Header Section -->
    @include('admin.partials.header')
    @include('admin.partials.navbar')
    <!-- Sidebar Section -->
    @include('admin.partials.sidebar')

    <!-- Main Content Section -->
    <main>
        @yield('content')
        
    </main>

    <!-- Footer Section -->
    @include('admin.partials.footer')

    <!-- Add your JS includes here -->
</body>
</html>
