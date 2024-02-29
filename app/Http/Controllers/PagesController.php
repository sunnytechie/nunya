<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function membership() {
        return view('pages.membership');
    }

    public function membershipStore(Request $request) {
        $request->validate([
            'name' => 'nullable',
        ]);

        return back()->with('success', 'Thank you for registering for Nunya membership.');
    }

    public function contact() {
        return view('pages.contact');
    }

    public function contactStore(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        return back()->with('success', 'Thank you for contacting us. We will be in touch soon.');
    }
}
