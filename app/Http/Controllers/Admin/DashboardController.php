<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\HeroSection;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard overview.
     */
    public function index()
    {
        $stats = [
            'total_tips' => Content::where('category', 'tips')->count(),
            'total_about' => Content::where('category', 'about')->count(),
            'total_galleries' => Gallery::count(),
            'total_users' => User::count(),
        ];

        $recentTips = Content::where('category', 'tips')->latest()->take(5)->get();
        $recentGalleries = Gallery::latest()->take(4)->get();
        $hero = HeroSection::first();

        return view('admin.dashboard', compact('stats', 'recentTips', 'recentGalleries', 'hero'));
    }
}
