<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Page;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct() {
    	if (!Auth::check())
    		return redirect(route('backend.dashboard.login'));
    }

    public function index() {
        $pages = Page::orderBy('id','desc')->with('translation')->paginate(10);

        $pages->each(function ($page) {
            $languageIds = Translation::where('record_id', $page->id)->where('record_type', 'Page')->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $page->language_codes = $languageCodes;
        });

        return view('backend.dashboard.pages.index', ['pages' => $pages, 'title' => 'Danh sách trang']);
    }

    public function edit(Request $request) {
        $page = Page::find($request->id);

        $translation = $page->translation($request->lang)->first();

        return response()->json([
            'page' => $page, 
            'translation' => $translation,
        ]);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pageData = [];

        if($request->language_id == 1){
            $pageData['slug'] = Str::slug($request->input('name'));
        }

        $page = Page::updateOrCreate(
            ['id' => $request->input('id')],
            $pageData
        );

        Translation::updateOrCreate(
            [
                'record_type' => 'Page',
                'record_id' => $page->id,
                'language_id' => $request->input('language_id')
            ],
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'slug' => Str::slug($request->input('name'), '-', strtolower(Language::where('id', $request->language_id)->value('code')))
            ]
        );

        return redirect(route('backend.dashboard.pages.index'));
    }

    public function delete(Request $request){
        $page = Page::where('id', $request->id)->delete();
        Translation::where('record_type', 'Page')->where('record_id', $request->id)->delete();
        return redirect(route('backend.dashboard.pages.index'));
    }

}
