<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Fetch all services from the database
        $services = Service::all();

        // Pass the services data to the view
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the view for creating a new service
        return view('admin.services.create');
    }

    /**
     * Store a newly created service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);

        // Create a new service instance with the validated data
        $service = new Service();
        $service->name = $request->name;
        // Assign other request data to corresponding model properties

        // Save the service to the database
        $service->save();

        // Redirect the user to the index page with a success message
        return response()->json(['success' => true, 'message' => 'Service created successfully']);

    }

    // Add more controller methods as needed for updating, deleting, etc.
}
