<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('admin.event.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            // validate request
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'time' => 'required',
                'location' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // If validation passes, continue with your logic here

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle errors
            return redirect()->back()->with('failed', "Validation failed")->withErrors($e->validator->errors())->withInput();
        }

        //if has thumbnail
        if ($request->hasFile('thumbnail')) {
             //Manager driver for image Processing
            $manager = new ImageManager(new Driver());

            //save the thumbnail
            $thumbnail = $manager->read($request->file('thumbnail')->getRealPath());
            $thumbnail->scaleDown(370, 240);

            $thumbnailName = $request->file('thumbnail')->hashName();
            //storeAs
            $file = $request->file('thumbnail')->storeAs('uploads/posts', $thumbnailName, 'public');
        }
        else {
            $thumbnailPath = null;
        }

        //db try
        try {
            $event = new Event();
            $event->title = $request->title;
            $event->description = $request->description;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->location = $request->location;
            if ($request->hasFile('thumbnail')) {
                $event->thumbnail = "uploads/events/" . $thumbnailName;
            }
            $event->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error creating event');
        }

        return redirect()->back()->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.event.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // validate request
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'date' => 'required',
                'time' => 'required',
                'location' => 'required',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // If validation passes, continue with your logic here

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle errors
            return redirect()->back()->with('failed', "Validation failed")->withErrors($e->validator->errors())->withInput();
        }

        //if has thumbnail
        if ($request->hasFile('thumbnail')) {
             //Manager driver for image Processing
            $manager = new ImageManager(new Driver());

            //save the thumbnail
            $thumbnail = $manager->read($request->file('thumbnail')->getRealPath());
            $thumbnail->scaleDown(370, 240);

            $thumbnailName = $request->file('thumbnail')->hashName();
            //storeAs
            $file = $request->file('thumbnail')->storeAs('uploads/posts', $thumbnailName, 'public');
        }


        //db try
        try {
            $event = Event::find($id);
            $event->title = $request->title;
            $event->description = $request->description;
            $event->date = $request->date;
            $event->time = $request->time;
            $event->location = $request->location;
            if ($request->hasFile('thumbnail')) {
                $event->thumbnail = "uploads/events/" . $thumbnailName;
            }
            $event->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating event');
        }

        return redirect()->back()->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //delete
        try {
            $event = Event::find($id);
            //delete the thumbnail
            $thumbnail = public_path("/uploads/events/" . $event->thumbnail);
            if (File::exists($thumbnail)) {
                File::delete($thumbnail);
            }
            $event->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting event');
        }

        return redirect()->back()->with('success', 'Event deleted successfully');
    }
}
