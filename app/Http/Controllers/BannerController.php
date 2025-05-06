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
        // $query = Banner::query();

        // $status = $request->status !== null ? $request->status : 1;

        // if ($status != 2) {
        //     $query->where('active', $status);
        // }

        // $banners = $query->orderby('item')->get();

        $banners = Banner::all();
        return view('backend.dashboard.banner.index',['banners'=>$banners, 'title' => 'Danh sách banner']);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $bannerData = [
            // 'active' => 1,
            'name' => $request->name,
            // 'link' => $request->link ?? '',
            // 'item' => $request->item,
            'slug' => Str::slug($request->input('name'))
        ];

        // Xử lý hình ảnh đơn cho các banner thông thường
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
            $file->move('public/uploads/banners/', $file_name);

            $bannerData['picture'] = $file_name;
        }

        $banner = Banner::updateOrCreate(
            ['id' => $request->input('id')],
            $bannerData
        );

        // Xử lý nhiều hình ảnh cho Banner trang chủ
        if ($request->name === 'Banner trang chủ' && $request->hasFile('pictures')) {
            foreach ($request->file('pictures') as $file) {
                $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
                $file->move('public/uploads/banners/', $file_name);
                
                // Lưu vào bảng images
                Image::create([
                    'record_type' => 'Banner',
                    'record_id' => $banner->id,
                    'name' => 'Picture',
                    'picture' => $file_name
                ]);
            }
        }
        
        return redirect(route('backend.dashboard.banner.index'));
    }

    public function edit(Request $request) {
		$banner = Banner::find($request->input('id'));
        
        // Lấy danh sách hình ảnh từ bảng images nếu là Banner trang chủ
        if ($banner->name === 'Banner trang chủ') {
            $banner->images = Image::where('record_type', 'Banner')
                                ->where('record_id', $banner->id)
                                ->where('name', 'Picture')
                                ->get();
        }
        
        return response()->json([
            'banner' => $banner,
        ]);
	}
    
    public function deleteImage(Request $request) {
        $image = Image::find($request->image_id);
        
        if (!$image) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy hình ảnh'], 404);
        }
        
        // Xóa file hình ảnh
        $path = 'public/uploads/banners/' . $image->picture;
        if (file_exists($path)) {
            unlink($path);
        }
        
        // Xóa record trong database
        $image->delete();
        
        return response()->json(['success' => true]);
    }
    public function delete(Request $request){
        // Lấy thông tin banner trước khi xóa
        $banner = Banner::find($request->id);
        
        if (!$banner) {
            return redirect(route('backend.dashboard.banner.index'))->with('error', 'Không tìm thấy banner');
        }
        
        // Xóa hình ảnh chính của banner nếu có
        if ($banner->picture) {
            $path = 'public/uploads/banners/' . $banner->picture;
            if (file_exists($path)) {
                unlink($path);
            }
        }
        
        // Xóa tất cả các hình ảnh liên quan trong bảng images
        $images = Image::where('record_type', 'Banner')
                    ->where('record_id', $request->id)
                    ->get();
                    
        foreach ($images as $image) {
            $path = 'public/uploads/banners/' . $image->picture;
            if (file_exists($path)) {
                unlink($path);
            }
            $image->delete();
        }
        
        // Xóa banner
        $banner->delete();
        
        return redirect(route('backend.dashboard.banner.index'))->with('success', 'Xóa banner thành công');
    }

}
