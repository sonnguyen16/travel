<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Blog;
use App\Models\Menu;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserBlogController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->slug;
        $menu = Menu::query()
            ->with('translations.language')
            ->where('slug', $slug)
            ->first();

        $blogs = Blog::query()
            ->where('menu_id', $menu->id)
            ->where('active', 1)
            ->with('translations.language', 'image_fe')
            ->get();

        return Inertia::render('Activity', compact('blogs', 'menu'));
    }

    public function show(Request $request)
    {
        $slug_blog = $request->title;
        $slug_menu = $request->slug;

        $blog = Blog::query()
            ->where('slug', $slug_blog)
            ->where('active', 1)
            ->whereHas('menu', function ($query) use ($slug_menu) {
                $query->where('slug', $slug_menu);
            })
            ->with('translations.language','image_fe', 'images_fe',
            'menu.blogs.translations.language',
            'menu.blogs.image_fe',
            'menu.blogs.location',
            'activities.translations.language')
            ->first();

        $blogs_related = Blog::query()
            ->where('active', 1)
            ->whereHas('menu', function ($query) use ($slug_menu) {
                $query->whereIn('slug', ['nha-hang', 'luu-tru', 'diem-den']);
            })
            ->where('id', '!=', $blog->id)
            ->with('translations.language', 'image_fe', 'menu', 'location')
            ->get();

        return Inertia::render('ServiceDetail', compact('blog', 'blogs_related'));
    }

    public function activity(Request $request)
    {
        $menu = Menu::query()
            ->with('translations.language')
            ->where('slug', 'hoat-dong')
            ->first();

        $blogs = Blog::query()
            ->where('active', 1)
            ->where('menu_id', $menu->id)
            ->with('translations.language', 'image_fe', 'location')
            ->get();

        return Inertia::render('Activity', compact('blogs', 'menu'));
    }

}
