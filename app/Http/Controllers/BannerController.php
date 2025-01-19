<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Banner;
use Illuminate\Support\Str;
use App\Models\Image;

class BannerController extends Controller
{
    public function __construct() {
    	if (!Auth::check())
    		return redirect(route('backend.dashboard.login'));
    }

    public function index(Request $request) {
        $query = Banner::query();

        $status = $request->status !== null ? $request->status : 1;

        if ($status != 2) {
            $query->where('active', $status);
        }

        $banners = $query->orderby('item')->paginate(10);
        return view('backend.dashboard.banner.index',['banners'=>$banners, 'status' => $status, 'title' => 'Danh sách banner']);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $bannerData = [
            'active' => $request->active ? 1 : 0,
            'name' => $request->name,
            'link' => $request->link ?? '',
            'item' => $request->item,
            'slug' => Str::slug($request->input('name'))
        ];


        $banner = Banner::updateOrCreate(
            ['id' => $request->input('id')],
            $bannerData
        );

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
            $file->move('public/uploads/banners/', $file_name);

            Image::updateOrCreate(
                [
                    'record_type' => 'Banner',
                    'record_id' => $banner->id,
                    'name' => 'Picture'
                ],
                [
                    'picture' => $file_name
                ]
            );
        }
        return redirect(route('backend.dashboard.banner.index'));
    }

    public function edit(Request $request) {
		$banner = Banner::with('image')->find($request->input('id'));
        return response()->json([
            'banner' => $banner,
        ]);
	}
    public function delete(Request $request){
        $banner = Banner::where('id', $request->id)->delete();
        Image::where('record_type', 'Banner')->where('record_id', $request->id)->delete();
        return redirect(route('backend.dashboard.banner.index'));
    }
   
}
