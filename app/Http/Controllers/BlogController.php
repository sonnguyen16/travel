<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\Image;
use App\Models\Translation;
use App\Models\Activity;

class BlogController extends Controller
{

    public function __construct() {
    	if (!Auth::check())
    		return redirect(route('backend.dashboard.login'));
    }

    public function index(Request $request)
    {
        $query = Blog::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
    
            $query->whereHas('translations', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('content', 'like', '%' . $search . '%');
            });
        }

		$status = $request->status !== null ? $request->status : 1;

        if ($status != 2) {
            $query->where('active', $status);
        }

		$s_menu = $request->s_menu;
		if($s_menu != ''){
			$query->where('menu_id', $s_menu);
		}

        $blogs = $query->orderby('id', 'desc')->with('translation')->with('menu')->paginate(10);

		$menus = Menu::where('menu_fk', 0)->orwhereNull('menu_fk')->get();

		$blogs->each(function ($blog) {
            $languageIds = Translation::where('record_id', $blog->id)->where('record_type', 'Blog')->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $blog->language_codes = $languageCodes;
        });

        return view('backend.dashboard.blog.index', [
			'blogs' => $blogs,
			'menus' => $menus,
			'title' => 'Danh sách bài viết',
			'status' => $status,
			's_menu' => $s_menu
		]);
    }

	public function edit(Request $request) {
		$blog = Blog::find($request->input('id'));
        $image = $blog->image($request->lang);
        $images = $blog->images($request->lang);
		$translation = $blog->translation($request->lang)->first();
        return response()->json([
            'blog' => $blog,
            'translation' => $translation,
            'image' => $image,
            'images' => $images
        ]);
	}
	public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'menu_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $blogData = [
            'menu_id' => $request->menu_id,
            'active' => $request->active ? 1 : 0,
        ];

        if($request->language_id == 1){
            $blogData['slug'] = Str::slug($request->input('name'));
        }

        $blog = Blog::updateOrCreate(
            ['id' => $request->input('id')],
            $blogData
        );

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
            $file->move('public/uploads/blogs/', $file_name);

            Image::updateOrCreate(
                [
                    'record_type' => 'Blog',
                    'record_id' => $blog->id,
                    'language_id' => $request->language_id,
                    'name' => 'Picture'
                ],
                [
                    'picture' => $file_name
                ]
            );
        }

        if ($request->hasFile('pictures')){
            foreach($request->file('pictures') as $file){
                $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
                $file->move('public/uploads/blogs/', $file_name);
                Image::create(
                    [
                        'record_type' => 'Blog',
                        'record_id' => $blog->id,
                        'name' => 'Other',
                        'language_id' => $request->language_id,
                        'picture' => $file_name
                    ]
                );
            }
        }

        Translation::updateOrCreate(
            [
                'record_type' => 'Blog',
                'record_id' => $blog->id,
                'language_id' => $request->input('language_id')
            ],
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),    
                'content' => $request->input('content'),
            ]
        );

        return redirect(route('backend.dashboard.blog.index'));
    }

	public function delete(Request $request) {
        $blog = Blog::where('id', $request->id)->delete();
        Translation::where('record_type', 'Blog')->where('record_id', $request->id)->delete();
        $image = Image::where('record_type', 'Blog')->where('record_id', $request->id)->first();
        $path = 'public/uploads/blogs/' . $image->picture;
        if (file_exists($path)) {
            unlink($path);
        }
        $image->delete();
        
        //xóa activity liên quan
        $activities = Activity::where('blog_id', $request->id);
        $activities->each(function ($activity) {
            $img = Image::where('record_type', 'Activity')->where('record_id', $activity->id)->first();
            $path = 'public/uploads/activities/' . $img->picture;
            if (file_exists($path)) {
                unlink($path);
            }
            $img->delete();
            Translation::where('record_type', 'Activity')->where('record_id', $activity->id)->delete();
        });
        $activities->delete();

        return redirect(route('backend.dashboard.blog.index'));
    }
    public function deleteImg($id){
        $img = Image::where('id', $id)->first();
        $path = 'public/uploads/blogs/' . $img->picture;
        if (file_exists($path)) {
            unlink($path);
        }
        $img->delete();
        return redirect()->back();
    }
}
