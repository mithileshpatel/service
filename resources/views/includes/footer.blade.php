<!-- resources/views/layouts/footer.blade.php -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; {{ date('Y') }} Service Company. @ All rights reserved.</p>
                <p>
                    <a href="{{ url('/') }}">Home</a> |
                    <a href="{{ url('/about') }}">About</a> |
                    <a href="{{ url('/services') }}">Services</a> |
                    <a href="{{ url('/contact') }}">Contact</a> |
                    <a href="{{ url('/privacy') }}">Privacy Policy</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<style>
    /* Footer styles */
    .footer {
        background-color: #343a40; /* Dark background */
        color: #fff;
        padding: 20px 0;
    }
    .footer a {
        color: #f8f9fa;
        text-decoration: none;
    }
    .footer a:hover {
        text-decoration: underline;
    }
</style>
