<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::all();
        return view('admin.slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            //validate the request...
            $request->validate([
                'title' => 'required',
                'link' => 'nullable|url',
                'description' => 'required',
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //if has thumbnail
        if ($request->hasFile('thumbnail')) {
            //Manager driver for image Processing
           $manager = new ImageManager(new Driver());

           //save the thumbnail
           $thumbnail = $manager->read($request->file('thumbnail')->getRealPath());
           $thumbnail->scaleDown(1920, 1080);

           $thumbnailName = $request->file('thumbnail')->hashName();
           //storeAs
           $file = $request->file('thumbnail')->storeAs('uploads/slides', $thumbnailName, 'public');
       }

        $slide = new Slide();
        $slide->title = $request->title;
        $slide->description = $request->description;
        $slide->link = $request->link;
        $slide->thumbnail = "uploads/slides/".$thumbnailName;
        $slide->save();

        return redirect()->route('slides.index')->with('success', 'Slide created successfully.');
        } catch (\Exception $e) {
        return redirect()->route('slides.index')->with('failed', 'An error occurred. Please try again.');
        }
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
        return view('admin.slide.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //try
        try {
            // validate request
            $request->validate([
                'title' => 'required',
                'link' => 'nullable|url',
                'description' => 'required',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            //if has thumbnail
            if ($request->hasFile('thumbnail')) {
                //Manager driver for image Processing
                $manager = new ImageManager(new Driver());

                //save the thumbnail
                $thumbnail = $manager->read($request->file('thumbnail')->getRealPath());
                $thumbnail->scaleDown(1920, 1080);

                $thumbnailName = $request->file('thumbnail')->hashName();
                //storeAs
                $file = $request->file('thumbnail')->storeAs('uploads/slides', $thumbnailName, 'public');
            }

            //db try
            try {
                $slide = Slide::find($id);
                $slide->title = $request->title;
                $slide->description = $request->description;
                $slide->link = $request->link;
                if ($request->hasFile('thumbnail')) {
                    $slide->thumbnail = "uploads/slides/" . $thumbnailName;
                }
                $slide->save();
            } catch (\Exception $e) {
                return redirect()->back()->with('failed', 'Error updating slide');
            }

            return redirect()->back()->with('success', 'Slide updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'An error occurred. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $slide = Slide::find($id);
            $slide->delete();
            return redirect()->back()->with('success', 'Slide deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'An error occurred. Please try again.');
        }
    }
}
