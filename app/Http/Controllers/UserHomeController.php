<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
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
}
