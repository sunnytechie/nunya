<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $members = \App\Models\Member::all();
        $lastWeekMembers = \App\Models\Member::where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->get();

        $users = \App\Models\User::all();
        $lastWeekUsers = \App\Models\User::where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->get();

        //$agegroups = \App\Models\Agegroup::all();

        $projects = \App\Models\Project::all();
        $lastWeekProjects = \App\Models\Project::where('created_at', '>=', \Carbon\Carbon::now()->subWeek())->get();

        $news = \App\Models\Post::all();
        $events = \App\Models\Event::all();
        $news_Events = $news->merge($events);
        $lastWeekNews_Events = $news_Events->filter(function ($item) {
            return $item->created_at >= \Carbon\Carbon::now()->subWeek();
        });
        //$news_Events->sortByDesc('created_at');
        return view('admin.index', compact('members', 'users', 'projects', 'news_Events', 'lastWeekMembers', 'lastWeekUsers', 'lastWeekProjects', 'lastWeekNews_Events'));
    }
}
