<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $categories = Category::all();
        return view('welcome', compact('categories','services'));
        
    }

}
