<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <!-- Add your CSS links here -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

  @include('includes/header')

  @yield('content')
  @include('includes/footer')
  <!-- Bootstrap JS (optional, if you want to use Bootstrap JavaScript features) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  


  <script>
   function navigateToLink(categoryId) {
    var url = '{{ route("show", ":id") }}';
    url = url.replace(':id', categoryId);
    window.location.href = url;
}
    </script>
    <script src="{{ asset('js/slider.js') }}">
    </script>
</body>
</html>
