<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserRecruitmentController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Recruitment::query()
            ->where('active', 1)
            ->with('translations.language', 'image_fe')
            ->get();

        return Inertia::render('Recruitments', compact('blogs'));
    }

    public function show(Request $request)
    {
        $slug_blog = $request->title;

        $blogs = Recruitment::query()
            ->where('active', 1)
            ->with('translations.language', 'image_fe')
            ->get();

        $blog = Recruitment::query()
            ->where('slug', $slug_blog)
            ->with('translations.language','image_fe')
            ->first();

        return Inertia::render('RecruitmentDetail', compact('blog', 'blogs'));
    }
}
