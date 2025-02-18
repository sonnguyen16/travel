<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Faq;
use App\Models\Location;

class UserPageController extends Controller
{
    public function show(Request $request)
    {
        $slug_page = $request->title;

        $page = Page::query()
            ->where('slug', $slug_page)
            ->with('translations.language',)
            ->first();

        return Inertia::render('Page', compact('page'));
    }

    public function faq()
    {
        $faq = Faq::query()
            ->with('translations.language')
            ->get();

        return Inertia::render('FAQ', compact('faq'));
    }

    public function gallery(){
        $locations = Location::query()
            ->with('translations.language', 'images')
            ->get();

        return Inertia::render('Gallery', compact('locations'));
    }
}
