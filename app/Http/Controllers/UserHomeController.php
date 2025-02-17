<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Menu;
use App\Models\Blog;
use Inertia\Inertia;

class UserHomeController extends Controller
{
    public function index()
    {
        $menus = Menu::query()->with(['image', 'translations.language', 'blogs'])
        ->whereHas('image')
        ->get();
        return Inertia::render('Home', compact('menus'));
    }

    public function about()
    {
        $blogs = Blog::query()->whereHas('menu', function ($query) {
            $query->where('slug', 'gioi-thieu');
        })->where('active', 1)
        ->with(['image_fe', 'translations.language'])
        ->get();

        return Inertia::render('About', compact('blogs'));
    }
}
