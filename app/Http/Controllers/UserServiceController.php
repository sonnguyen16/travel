<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Menu;
use App\Models\Blog;

class UserServiceController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::query()
            ->where('active', 1)
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'diem-den');
            })
            ->with('translations.language', 'image_fe')
            ->get();

        $blogs_related = Blog::query()
            ->where('active', 1)
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'luu-tru');
            })
            ->with('translations.language', 'image_fe')
            ->get();

        return Inertia::render('Service', compact('blogs', 'blogs_related'));
    }

    public function show(Request $request)
    {
        $slug_blog = $request->title;

        $blog = Blog::query()
            ->where('slug', $slug_blog)
            ->where('active', 1)
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'diem-den');
            })
            ->with('translations.language','image_fe',
            'menu.blogs.translations.language',
            'menu.blogs.image_fe',
            'activities.translations.language')
            ->first();

        return Inertia::render('ServiceDetail', compact('blog'));
    }
}
