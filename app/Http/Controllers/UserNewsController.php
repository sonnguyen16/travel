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
            ->whereHas('parent', function ($query) {
                $query->where('slug', 'tin-tuc');
            })
            ->get();

        $promo = Blog::query()
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'uu-dai');
            })
            ->where('active', 1)
            ->with('translations.language', 'image_fe')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $recruitment = Recruitment::query()
        ->where('active', 1)
        ->with('translations.language', 'image_fe')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        $hot_blogs = Blog::query()
        ->where('active', 1)
        ->whereHas('menu', function ($query) {
            $query->where('slug', 'tin-tuc');
        })
        ->with('translations.language', 'image_fe', 'news_category')
        ->select('id', 'menu_id', 'news_id', 'location_id', 'active', 'view', 'slug', 'password', 'created_at', 'updated_at')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        $blogs = Blog::query()
        ->whereHas('menu', function ($query) {
            $query->where('slug', 'tin-tuc');
        })
        ->whereNotIn('id', $hot_blogs->pluck('id'))
        ->where('active', 1)
        ->with('translations.language', 'image_fe', 'news_category')
        ->select('id', 'menu_id', 'news_id', 'location_id', 'active', 'view', 'slug', 'password', 'created_at', 'updated_at');

        $category = Menu::query()
            ->where('menu_fk', '!=', null)
            ->whereHas('parent', function ($query) use ($menu) {
                $query->where('slug', 'tin-tuc');
            })->get();

        if($request->has('search')) {
            $blogs = $blogs->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('content', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $blogs = $blogs->orderBy('created_at', 'desc')
                       ->paginate(6);

        return Inertia::render('News', compact('blogs', 'menu', 'hot_blogs', 'promo', 'recruitment', 'category'));
    }

    public function category(Request $request)
    {
        $slug_category = $request->category_slug;

        $menu = Menu::query()
            ->with('translations.language')
            ->where('slug', $slug_category)
            ->first();

        $promo = Blog::query()
        ->whereHas('menu', function ($query) {
            $query->where('slug', 'uu-dai');
        })
        ->where('active', 1)
        ->with('translations.language', 'image_fe')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        $recruitment = Recruitment::query()
        ->where('active', 1)
        ->with('translations.language', 'image_fe')
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        $blogs = Blog::query()
        ->where('news_id', $menu->id)
        ->where('active', 1)
        ->with('translations.language', 'image_fe', 'menu.menu')
        ->select('id', 'menu_id', 'news_id', 'location_id', 'active', 'view', 'slug', 'password', 'created_at', 'updated_at');

        if($request->has('search')) {
            $blogs = $blogs->whereHas('translations', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('content', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $blogs = $blogs->orderBy('created_at', 'desc')
                       ->paginate(6);

        return Inertia::render('NewsCategory', compact('blogs', 'menu', 'promo', 'recruitment'));
    }

    public function show(Request $request)
    {
        $slug_blog = $request->title;

        $blog = Blog::query()
            ->where('slug', $slug_blog)
            ->where('active', 1)
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'tin-tuc');
            })
            ->with('translations.language','image_fe',
            'menu.blogs.translations.language',
            'menu.blogs.image_fe',
            'news_category.translations.language',
            'activities.translations.language')
            ->select('id', 'menu_id', 'news_id', 'location_id', 'active', 'view', 'slug', 'password', 'created_at', 'updated_at')
            ->first();

        // Nếu bài viết không tồn tại
        if (!$blog) {
            abort(404);
        }

        // Kiểm tra nếu bài viết có mật khẩu và đang được truy cập trực tiếp
        if ($blog->password && !empty(trim($blog->password))) {
            // Kiểm tra xem có phải từ trang danh sách không (có thể thông qua session hoặc parameter)
            $password_verified = session('blog_password_verified_' . $blog->id, false);

            if (!$password_verified) {
                // Chưa xác thực mật khẩu, hiển thị trang yêu cầu mật khẩu
                return Inertia::render('NewsDetail', [
                    'blog' => $blog,
                    'requires_password' => true
                ]);
            }
        }

        return Inertia::render('NewsDetail', compact('blog'));
    }

    public function verifyPassword(Request $request)
    {
        $blog = Blog::query()
            ->where('id', $request->blog_id)
            ->first();
        if($blog->password === $request->password) {
            session(['blog_password_verified_' . $blog->id => true]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
