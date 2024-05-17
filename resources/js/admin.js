// public/js/admin.js

// Add your JavaScript code specific to your admin panel here

// Example: Toggle sidebar
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const sidebar = document.querySelector('.sidebar');

    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('sidebar-open');
    });
});
