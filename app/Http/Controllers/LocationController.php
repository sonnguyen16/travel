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
            'name' => ''
        ];

        if($request->language_id == 1){
            $locationData['slug'] = Str::slug($request->input('name'));
        }

        $location = Location::updateOrCreate(
            ['id' => $request->input('id')],
            $locationData
        );

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
        $location = Location::find($request->id);

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
}
