<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Location;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\Image;
use App\Models\Translation;

class ProductController extends Controller
{
    public function __construct() {
    	if (!Auth::check())
    		return redirect(route('backend.dashboard.login'));
    }

    public function index(Request $request) {
        $query = Product::query();

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

        $products = $query->orderby('id', 'desc')->with('translation')->with('location')->paginate(10);
        $locations = Location::all();
        $products->each(function ($product) {
            $languageIds = Translation::where('record_id', $product->id)->where('record_type', 'Product')->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $product->language_codes = $languageCodes;
        });
        return view('backend.dashboard.product.index',[
            'products'=>$products, 
            'status' => $status, 
            'title' => 'Danh sách vé',
            'locations' => $locations,
        ]);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'location_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $productData = [
            'price' => $request->price,
            'price_child' => $request->price_child,
            'location_id' => $request->location_id,
            'active' => $request->active ? 1 : 0
        ];

        if($request->language_id == 1){
            $productData['slug'] = Str::slug($request->input('name'));
        }

        $product = Product::updateOrCreate(
            ['id' => $request->input('id')],
            $productData
        );

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
            $file->move('public/uploads/products/', $file_name);

            Image::updateOrCreate(
                [
                    'record_type' => 'Product',
                    'record_id' => $product->id,
                    // 'language_id' => $request->language_id,
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
                $file->move('public/uploads/products/', $file_name);
                Image::create(
                    [
                        'record_type' => 'Product',
                        'record_id' => $product->id,
                        'name' => 'Other',
                        // 'language_id' => $request->language_id,
                        'picture' => $file_name
                    ]
                );
            }
        }

        Translation::updateOrCreate(
            [
                'record_type' => 'Product',
                'record_id' => $product->id,
                'language_id' => $request->input('language_id')
            ],
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
            ]
        );

        return redirect(route('backend.dashboard.product.index', $request->query()));
    }
    public function edit(Request $request) {
		$product = Product::find($request->input('id'));
        // $image = $product->image($request->lang);
        // $images = $product->images($request->lang);
        $image = $product->image_fe;
        $images = $product->images_fe;
		$translation = $product->translation($request->lang)->first();
        return response()->json([
            'product' => $product,
            'translation' => $translation,
            'image' => $image,
            'images' => $images
        ]);
    }
    
    public function delete(Request $request) {
        $product = Product::where('id', $request->id)->delete();
        Translation::where('record_type', 'Product')->where('record_id', $request->id)->delete();
        $image = Image::where('record_type', 'Product')->where('record_id', $request->id)->first();
        $path = 'public/uploads/products/' . $image->picture;
        if (file_exists($path)) {
            unlink($path);
        }
        $image->delete();
        return redirect(route('backend.dashboard.product.index'));
    }
    public function deleteImg($id){
        $img = Image::where('id',$id)->first();
        $path = 'public/uploads/products/' . $img->picture;
        if (file_exists($path)) {
            unlink($path);
        }
        $img->delete();
        return redirect(route('backend.dashboard.product.index'));
    }
}
