<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Agegroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AgeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ages = Agegroup::orderBy('id', 'desc')->get();
        return view('admin.agegrouping.index', compact('ages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agegrouping.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Agegroup::create($request->all());
            return redirect()->route('agegroup.index')->with('success', 'Age group created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error creating age group');
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
        return view('admin.agegrouping.edit');
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
            Agegroup::find($id)->delete();
            return redirect()->route('agegroup.index')->with('success', 'Age group deleted successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Error deleting age group');
        }
    }
}
