<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Language;
use App\Models\Image;
use App\Models\Translation;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function __construct() {
    	if (!Auth::check())
    		return redirect(route('backend.dashboard.login'));
    }

    public function index(Request $request)
    {
        $query = Menu::where('menu_fk', 0);

        if ($request->has('search') && $request->search) {
            $search = $request->search;
    
            $query->whereHas('translations', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            });
        }

        $menus = $query->orderBy('id','desc')->with('Menu')->with('translation')->with('image')->paginate(10);

        $menus->each(function ($menu) {
            $languageIds = Translation::where('record_id', $menu->id)->where('record_type', 'Menu')->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $menu->language_codes = $languageCodes;

            $menu->Menu->each(function ($childMenu) {
                $languageIds = Translation::where('record_id', $childMenu->id)->where('record_type', 'Menu')->pluck('language_id');
        
                $languageCodes = Language::whereIn('id', $languageIds)
                    ->orderby('id', 'asc')
                    ->pluck('code');
                
                $childMenu->language_codes = $languageCodes;
            });
        });

        return view('backend.dashboard.menu.index', ['menus' => $menus, 'title' => 'Danh sách danh mục']);
    }


    public function edit(Request $request) {
        $menu = Menu::with('image')->find($request->id);

        $translation = $menu->translation($request->lang)->first();

        return response()->json([
            'menu' => $menu,
            'translation' => $translation
        ]);
    }
    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'picture' => 'nullable', 
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $menuData = [];

        if($request->input('menu_fk')){
            $menuData['menu_fk'] = $request->input('menu_fk');
        }
        if($request->language_id == 1){
            $menuData['slug'] = Str::slug($request->input('name'));
        }

        $menu = Menu::updateOrCreate(
            ['id' => $request->input('id')],
            $menuData
        );

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
            $file->move('public/uploads/menus/', $file_name);

            Image::updateOrCreate(
                [
                    'record_type' => 'Menu',
                    'record_id' => $menu->id,
                    'name' => 'Picture',
                ],
                [
                    'picture' => $file_name
                ]
            );
        }

        Translation::updateOrCreate(
            [
                'record_type' => 'Menu',
                'record_id' => $menu->id,
                'language_id' => $request->input('language_id')
            ],
            [
                'name' => $request->input('name'),
            ]
        );

        return redirect(route('backend.dashboard.menu.index'));
    }
    
    public function delete(Request $request){
        if($request->id == 2 || $request->id == 4){
            return redirect()->back()->withErrors("Không thể xóa mục này")->withInput();
        }
        $menu = Menu::where('id', $request->id)->delete();
        $image = Image::where('record_type', 'Menu')->where('record_id', $request->id)->first();
        if($image){
            $path = 'public/uploads/menus/' . $image->picture;
            if (file_exists($path)) {
                unlink($path);
            }
            $image->delete();
        }
        
        Translation::where('record_type', 'Menu')->where('record_id', $request->id)->delete();
        return redirect(route('backend.dashboard.menu.index'));
    }

    public function deleteImg(Request $request){
        $image = Image::where('record_type', 'Menu')->where('record_id', $request->id)->first();
        $path = 'public/uploads/menus/' . $image->picture;
        if (file_exists($path)) {
            unlink($path);
        }
        $image->delete();
        return redirect()->back();
    }
}
