<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Language;
use App\Models\Translation;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Location;
use Illuminate\Support\Str;
use App\Models\Image;


class LocationController extends Controller
{
    public function index(){
        $locations = Location::with('translation')->paginate(10);
        $locations->each(function ($location) {
            $languageIds = Translation::where('record_id', $location->id)->where('record_type', 'Location')->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $location->language_codes = $languageCodes;
        });
        return view('backend.dashboard.location.index', [
            'locations' => $locations,
            'title' => 'Danh sách địa điểm'
        ]);
    }
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $locationData = [
            'name' => '',
            'active' => $request->active ? 1 : 0,
        ];

        if($request->language_id == 1){
            $locationData['slug'] = Str::slug($request->input('name'));
        }

        $location = Location::updateOrCreate(
            ['id' => $request->input('id')],
            $locationData
        );

        if ($request->hasFile('pictures')){
            foreach($request->file('pictures') as $file){
                $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
                $file->move('public/uploads/locations/', $file_name);
                Image::create(
                    [
                        'record_type' => 'Location',
                        'record_id' => $location->id,
                        'name' => 'Gallery',
                        'picture' => $file_name
                    ]
                );
            }
        }

        Translation::updateOrCreate(
            [
                'record_type' => 'Location',
                'record_id' => $location->id,
                'language_id' => $request->input('language_id')
            ],
            [
                'name' => $request->input('name'),
            ]
        );

        return redirect(route('backend.dashboard.location.index'));
    }

    public function edit(Request $request){
        $location = Location::with('images')->find($request->id);

        $translation = $location->translation($request->lang)->first();

        return response()->json([
            'location' => $location,
            'translation' => $translation
        ]);
    }

    public function delete(Request $request){
        $location = Location::where('id', $request->id)->delete();
        
        Translation::where('record_type', 'Location')->where('record_id', $request->id)->delete();
        return redirect(route('backend.dashboard.location.index'));
    }

    public function deleteImg($idImg, $id)
    {
        $img = Image::find($idImg);

        if ($img) {
            $path = 'public/uploads/locations/' . $img->picture;

            if (file_exists($path)) {
                unlink($path);
            }

            $img->delete();

            $location = Location::with('images')->find($id);
            return response()->json(['success' => true, 'location' => $location]);
        }

        return response()->json(['success' => false, 'message' => 'Image not found']);
    }
}
