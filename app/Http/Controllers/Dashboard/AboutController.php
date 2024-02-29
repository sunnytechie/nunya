<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;

class AboutController extends Controller
{
    public function index() {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request) {
        try {
            $about = About::first();
            $about->update($request->all());
            return redirect()->back()->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Something went wrong');
        }
    }

    public function settings() {
        $setting = Setting::first();
        return view('admin.about.settings', compact('setting'));
    }

    public function updateSettings(Request $request) {
        try {
            $setting = Setting::first();
            $setting->update($request->all());
            return redirect()->back()->with('success', 'Updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('failed', 'Something went wrong');
        }
    }

}
