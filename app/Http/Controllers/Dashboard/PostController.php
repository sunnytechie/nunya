<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->get();
        return view('admin.news.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.news.create');
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

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle errors
            return redirect()->back()->with('failed', "Validation failed")->withErrors($e->validator->errors())->withInput();
        }

        //Manager driver for image Processing
        $manager = new ImageManager(new Driver());

        //if has thumbnail
        //if has thumbnail
        if($request->hasFile('thumbnail')) {

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
            $post = new Post();
            $post->title = $request->title;
            $post->description = $request->description;
            if ($request->hasFile('thumbnail')) {
                $post->thumbnail = "uploads/posts/" . $thumbnailName;
            }
            $post->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error creating post, please try again later.');
        }

        return redirect()->back()->with('success', 'Post created successfully.');
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
        return view('admin.news.edit');
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
                'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle errors
            return redirect()->back()->with('failed', "Validation failed")->withErrors($e->validator->errors())->withInput();
        }

        //if has thumbnail
        if($request->hasFile('thumbnail')) {

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
            $post = Post::find($id);
            $post->title = $request->title;
            $post->description = $request->description;
            if ($request->hasFile('thumbnail')) {
                $post->thumbnail = "uploads/posts/" . $thumbnailName;
            }
            $post->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error updating post, please try again later.');
        }

        return redirect()->back()->with('success', 'Post updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $post = Post::find($id);
            //delete the thumbnail
            if ($post->thumbnail) {
                $thumbnailPath = public_path("/uploads/posts/{$post->thumbnail}");
                if (File::exists($thumbnailPath)) {
                    File::delete($thumbnailPath);
                }
            }
            $post->delete();
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error deleting post, please try again later.');
        }

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }
}
