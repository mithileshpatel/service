<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $room = new Room();
        $room->name = $request->name;
        $room->description = $request->description;

        $images = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $image->getClientOriginalName();
                $path = $image->storeAs('public/images', $imageName);
                $images[] = $imageName;
            }
        }
        $room->image = json_encode($images);
        $room->save();

        return redirect('/admin/rooms')->with('success', 'Room created successfully.');
    }

    public function edit($id)
    {
        $room = Room::find($id);
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $room = Room::find($id);
        $room->name = $request->name;
        $room->description = $request->description;

        $images = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $imageName = $image->getClientOriginalName();
                $path = $image->storeAs('public/images', $imageName);
                $images[] = $imageName;
            }
            $room->image = json_encode($images);
        }

        $room->save();

        return redirect('/admin/rooms')->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Room::find($id);
        $images = json_decode($room->image, true);
        foreach ($images as $image) {
            Storage::delete('public/images/' . $image);
        }
        $room->delete();
        return redirect('/admin/rooms')->with('success', 'Room deleted successfully.');
    }
}
