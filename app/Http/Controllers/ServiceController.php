<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all(); // Fetch all services from the database
        return view('admin.services.index', compact('services')); // Pass services data to the view
    }

    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(); // Retrieve all categories
        return view('admin.services.create', ['categories' => $categories]); // Pass $categories to the view
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
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'description' => 'required|string',
            'category' => 'required|numeric',
          
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Maximum 10 images with maximum size of 2MB each
        ], [
            'images.*.image' => 'The file must be an image.',
            'images.*.mimes' => 'Only JPG, PNG, JPEG, and GIF files are allowed.',
            'images.*.max' => 'The image size cannot be greater than 2MB.',
        ]);

        // Upload and store images
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image and get its path
                $imageName = $image->getClientOriginalName();
                $path = $image->storeAs('public/images', $imageName); // You may want to customize the storage path
                $imagePaths[] = $imageName;
            }
        }

        // Create a new service instance with the validated data
        $service = Service::create([
            'title' => $validatedData['title'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'images' => $imagePaths, // Store image paths directly without JSON encoding
            
            'category' => $validatedData['category'],
        ]);

        // Redirect back or wherever you want
        return redirect()->back()->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $categories = Category::all();
        return view('admin.services.edit', compact('service', 'categories'));
    }
    

    /**
     * Update the specified service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    // Find the service by its ID
    $service = Service::findOrFail($id);

    // Validate the request data
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'description' => 'required|string',
        'category' => 'required|numeric',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'images.*.image' => 'The file must be an image.',
        'images.*.mimes' => 'Only JPG, PNG, JPEG, and GIF files are allowed.',
        'images.*.max' => 'The image size cannot be greater than 2MB.',
    ]);

    // Upload and store images
    $imagePaths = $service->images; // Get existing images
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            // Store each image and get its path
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('public/images', $imageName); // Customize the storage path if needed
            $imagePaths[] = $imageName;
        }
    }

    // Update the service instance with the validated data
    $service->update([
        'title' => $validatedData['title'],
        'price' => $validatedData['price'],
        'description' => $validatedData['description'],
        'images' => $imagePaths, // Store image paths directly without JSON encoding
        'category' => $validatedData['category'],
    ]);

    // Redirect back or wherever you want
    return redirect()->back()->with('success', 'Service updated successfully.');
}

    /**
     * Remove the specified service from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        // Delete the service
        $service->delete();

        // Redirect back or wherever you want
        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

    /**
     * Remove an image from the specified service.
     *
     * @param  \App\Models\Service  $service
     * @param  string  $image
     * @return \Illuminate\Http\Response
     */
   // ServiceController.php
public function removeImage(Service $service, $image)
{
    // Remove the image from storage
    Storage::delete('public/images/' . $image);

    // Remove the image from the service's images array
    $images = $service->images;
    if (($key = array_search($image, $images)) !== false) {
        unset($images[$key]);
        $service->update(['images' => array_values($images)]); // Re-index the array
    }

    // Redirect back or wherever you want
    return redirect()->back()->with('success', 'Image removed successfully.');
}


    /**
     * Display the specified service.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }
}
