<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Location;

class UserPromoController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::query()
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'uu-dai');
            })
            ->where('active', 1)
            ->with('translations.language', 'image_fe', 'location.translations.language')
            ->orderBy('id', 'desc')
            ->get();

        $products = Product::query()
            ->where('active', 1)
            ->with('translations.language', 'image_fe')
            ->get();

        $banner = Banner::query()
            ->where('slug', 'banner-muc-uu-dai')
            ->first();

        $locations = Location::query()
            ->with('translations.language')
            ->get();

        return Inertia::render('Promo', compact('blogs', 'products', 'banner', 'locations'));
    }

    public function show(Request $request)
    {
        $slug_blog = $request->title;

        $blog = Blog::query()
            ->where('slug', $slug_blog)
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'uu-dai');
            })
            ->where('active', 1)
            ->with('translations.language','image_fe',
            'menu.blogs.translations.language',
            'menu.blogs.image_fe',
            'location.translations.language',
            'activities.translations.language')
            ->first();

        return Inertia::render('PromoDetail', compact('blog'));
    }
}
