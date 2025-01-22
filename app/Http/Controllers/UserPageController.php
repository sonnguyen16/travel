<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
}
