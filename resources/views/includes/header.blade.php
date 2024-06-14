
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
