<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\Image;
use App\Models\Translation;
use App\Models\Blog;

class ActivityController extends Controller
{
    public function __construct() {
    	if (!Auth::check())
    		return redirect(route('backend.dashboard.login'));
    }
    public function index(Request $request)
    {
        $blog = Blog::find($request->blog_id);
        $activities = Activity::where('blog_id', $request->blog_id)->orderby('id', 'desc')->paginate(20);
        $activities->each(function ($activity) {
            $languageIds = Translation::where('record_id', $activity->id)->where('record_type', 'Activity')->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $activity->language_codes = $languageCodes;
        });
        return view('backend.dashboard.activity.index',[
            'activities' => $activities,
            'title' => 'Hoạt động nổi bật : #' . $blog->translation->name
        ]);
    }
    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $activityData = [
            'active' => $request->active ? 1 : 0,
            'blog_id' => $request->blog_id,
            'link' => $request->link
        ];

        if($request->language_id == 1){
            $activityData['slug'] = Str::slug($request->input('name'));
        }

        $activity = Activity::updateOrCreate(
            ['id' => $request->input('id')],
            $activityData
        );

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
            $file->move('public/uploads/activities/', $file_name);

            Image::updateOrCreate(
                [
                    'record_type' => 'Activity',
                    'record_id' => $activity->id,
                    'name' => 'Picture'
                ],
                [
                    'picture' => $file_name
                ]
            );
        }

        Translation::updateOrCreate(
            [
                'record_type' => 'Activity',
                'record_id' => $activity->id,
                'language_id' => $request->input('language_id')
            ],
            [
                'name' => $request->input('name'),
                'content' => $request->input('content'),
            ]
        );

        return redirect(route('backend.dashboard.activity.index', ['blog_id' => $request->blog_id]));
    }
    public function edit(Request $request) {
		$activity = Activity::with('image')->find($request->input('id'));
		$translation = $activity->translation($request->lang)->first();
        return response()->json([
            'activity' => $activity,
            'translation' => $translation,
        ]);
	}
    public function delete(Request $request){
        $activity= Activity::where('id', $request->id)->delete();
        $image = Image::where('record_type', 'Activity')->where('record_id', $request->id)->first();
        $path = 'public/uploads/activities/' . $image->picture;
        if (file_exists($path)) {
            unlink($path);
        }
        $image->delete();
        Translation::where('record_type', 'Activity')->where('record_id', $request->id)->delete();
        return redirect(route('backend.dashboard.activity.index', ['blog_id' => $request->blog_id]));
    }
}
