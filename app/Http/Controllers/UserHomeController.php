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

        // Lấy hình ảnh cho các menu cụ thể
        $menuSlugs = ['diem-den', 'hoat-dong', 'nha-hang', 'luu-tru', 'khac'];
        $menuImages = [];

        foreach ($menuSlugs as $slug) {
            $menu = Menu::where('slug', $slug)->first();

            if ($menu) {
                $images = \App\Models\Image::where('record_type', 'Menu')
                    ->where('record_id', $menu->id)
                    ->take(5)
                    ->get();

                $menuImages[$slug] = $images->isNotEmpty() ? $images : null;
            } else {
                $menuImages[$slug] = null;
            }
        }
        
        // Lấy trang có nội dung tiêu đề trang chủ
        $homePage = \App\Models\Page::query()
            ->whereHas('translations', function($query) {
                $query->where('name', 'like', '%tiêu đề trang chủ%');
            })
            ->with('translations.language')
            ->first();

        return Inertia::render('Home', compact('menus', 'menuImages', 'homePage'));
    }

    public function about()
    {
        $blogs = Blog::query()->whereHas('menu', function ($query) {
            $query->where('slug', 'gioi-thieu');
        })->where('active', 1)
        ->with(['image_fe', 'translations.language'])
        ->get();

        $ve_chung_toi = Blog::query()->whereHas('menu', function ($query) {
                    $query->where('slug', 've-chung-toi');
                })->where('active', 1)
                ->with(['image_fe', 'translations.language'])
                ->get();

        $timelines = Blog::query()->whereHas('menu', function ($query) {
                    $query->where('slug', 'cot-moc');
                })->where('active', 1)
                ->with(['translations.language'])
                ->get()
                ->sortBy(function($blog) {
                    return $blog->translations[0]->name;
                })->values();

        return Inertia::render('About', compact('blogs', 've_chung_toi', 'timelines'));
    }
}
