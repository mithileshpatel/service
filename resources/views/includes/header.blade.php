<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laravel Header Menu with Bootstrap</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom styles */
    .services-section {
      background-color: #f8f9fa; /* Light gray */
      padding: 50px 0;
    }
    .service-card {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      transition: box-shadow 0.3s ease;
    }
    .service-card:hover {
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }
    .service-card .card-body {
      padding: 20px;
    }
    .service-card h3 {
      color: #333;
    }
    .service-card p {
      color: #666;
    }
  </style>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Service Company</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item{{ Request::is('/') ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item{{ Request::is('about') ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/about') }}">About</a>
          </li>
          <li class="nav-item{{ Request::is('services') ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/services') }}">Services</a>
          </li>
          <li class="nav-item{{ Request::is('contact') ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
          </li>
          <li class="nav-item{{ Request::is('login') ? ' active' : '' }}">
            <a class="nav-link" href="{{ url('/login') }}">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS (optional, if you want to use Bootstrap JavaScript features) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

