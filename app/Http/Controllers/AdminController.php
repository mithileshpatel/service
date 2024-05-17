<?php



namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index'); // Load admin dashboard view
    }
}
