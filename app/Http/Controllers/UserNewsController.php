<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Blog;
use App\Models\Menu;
use App\Models\Recruitment;

class UserNewsController extends Controller
{
    public function index(Request $request)
    {
        $menu = Menu::query()
            ->with('translations.language')
            ->where('slug', 'tin-tuc')
            ->first();

        $promo = Blog::query()
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'uu-dai');
            })
            ->with('translations.language', 'image_fe')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        $recruitment = Recruitment::query()
        ->where('active', 1)
        ->with('translations.language', 'image_fe')
        ->orderBy('created_at', 'desc')
        ->limit(4)
        ->get();

        $hot_blogs = Blog::query()
        ->where('menu_id', $menu->id)
        ->with('translations.language', 'image_fe')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        $blogs = Blog::query()
        ->where('menu_id', $menu->id)
        ->whereNotIn('id', $hot_blogs->pluck('id')) // Loại bỏ các hot blogs
        ->with('translations.language', 'image_fe')
        ->paginate(6);


        return Inertia::render('News', compact('blogs', 'menu', 'hot_blogs', 'promo', 'recruitment'));
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
