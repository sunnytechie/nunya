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

    public function subscribe(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        return back()->with('success', 'Thank you for subscribing to our newsletter.');
    }

    public function donationStore(Request $request) {
        $request->validate([
            'email' => 'required|email',
        ]);

        return back()->with('success', 'Thank you for your donations.');
    }

    public function news() {
        return view('pages.news');
    }

    public function about() {
        return view('pages.about');
    }

    public function events() {
        return view('pages.events');
    }

    public function donation() {
        return view('pages.donation');
    }

    public function projects() {
        return view('pages.projects');
    }

}
