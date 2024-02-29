<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('id', 'desc')->get();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.project.create');
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
                'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // If validation passes, continue with your logic here

            //Manager driver for image Processing
        $manager = new ImageManager(new Driver());

        //if has thumbnail
        //if has thumbnail
        if($request->hasFile('thumbnail')) {

            //Manager driver for image Processing
            $manager = new ImageManager(new Driver());

            //save the thumbnail
            $thumbnail = $manager->read($request->file('thumbnail')->getRealPath());
            $thumbnail->scaleDown(1920, 1080);

            $thumbnailName = $request->file('thumbnail')->hashName();
            //storeAs
            $file = $request->file('thumbnail')->storeAs('uploads/posts', $thumbnailName, 'public');
        }
        else {
            $thumbnailPath = null;
        }

        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->thumbnail = "uploads/posts/".$thumbnailName;
        $project->save();

        return redirect()->back()->with('success', 'Project created successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle errors
            return redirect()->back()->with('failed', "Validation failed")->withErrors($e->validator->errors())->withInput();
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
        return view('admin.project.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $project = Project::find($id);
            $project->delete();
            return redirect()->back()->with('success', 'Project deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error deleting project');
        }
    }
}
