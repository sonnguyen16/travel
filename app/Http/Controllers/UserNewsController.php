<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Blog;
use App\Models\Menu;

class UserNewsController extends Controller
{
    public function index(Request $request)
    {
        $menu = Menu::query()
            ->with('translations.language')
            ->where('slug', 'tin-tuc')
            ->first();

        $blogs = Blog::query()
            ->where('menu_id', $menu->id)
            ->with('translations.language', 'image_fe')
            ->get();

        return Inertia::render('News', compact('blogs', 'menu'));
    }

    public function show(Request $request)
    {
        $slug_blog = $request->title;

        $blog = Blog::query()
            ->where('slug', $slug_blog)
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'tin-tuc');
            })
            ->with('translations.language','image_fe',
            'menu.blogs.translations.language',
            'menu.blogs.image_fe',
            'activities.translations.language')
            ->first();

        return Inertia::render('NewsDetail', compact('blog'));
    }
}
