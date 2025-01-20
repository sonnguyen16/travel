<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Blog;
use App\Models\Product;

class UserPromoController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::query()
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'uu-dai');
            })
            ->with('translations.language', 'image_fe')
            ->get();

        $products = Product::query()
            ->where('active', 1)
            ->with('translations.language', 'image_fe')
            ->get();

        return Inertia::render('Promo', compact('blogs', 'products'));
    }

    public function show(Request $request)
    {
        $slug_blog = $request->title;

        $blog = Blog::query()
            ->where('slug', $slug_blog)
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'uu-dai');
            })
            ->with('translations.language','image_fe',
            'menu.blogs.translations.language',
            'menu.blogs.image_fe',
            'activities.translations.language')
            ->first();

        return Inertia::render('PromoDetail', compact('blog'));
    }
}
