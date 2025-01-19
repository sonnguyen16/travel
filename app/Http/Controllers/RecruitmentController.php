<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Recruitment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Image;
use App\Models\Language;
use App\Models\RecruitmentTranslations;

class RecruitmentController extends Controller
{
    public function __construct() {
    	if (!Auth::check())
    		return redirect(route('backend.dashboard.login'));
    }
    public function index(Request $request) {
        $query = Recruitment::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
    
            $query->whereHas('translations', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        $status = $request->status !== null ? $request->status : 1;

        if ($status != 2) {
            $query->where('active', $status);
        }

        $recruitments = $query->orderby('id', 'desc')->with('translation')->paginate(10);
        $recruitments->each(function ($recruitment) {
            $languageIds = RecruitmentTranslations::where('record_id', $recruitment->id)->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $recruitment->language_codes = $languageCodes;
        });
        return view('backend.dashboard.recruitment.index',[
            'recruitments'=>$recruitments, 
            'status' => $status, 
            'title' => 'Danh sách tin tuyển dụng']);
    }

    public function store(Request $request) {
        $recruitmentData = [
            'deadline' => $request->deadline,
            'active' => $request->active ? 1 : 0,
        ];

        if($request->language_id == 1){
            $recruitmentData['slug'] = Str::slug($request->input('name'));
        }
        $recruitment = Recruitment::updateOrCreate(
            [ 'id' => $request->id ],
            $recruitmentData
        );

        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $file_name = Str::uuid().'_'.date('YmdHis')."_".Auth::user()->id."_".$file->getClientOriginalName();
            $file->move('public/uploads/recruitments/', $file_name);

            Image::updateOrCreate(
                [
                    'record_type' => 'Recruitment',
                    'record_id' => $recruitment->id,
                    'language_id' => $request->language_id,
                    'name' => 'Picture'
                ],
                [
                    'picture' => $file_name
                ]
            );
        }

        RecruitmentTranslations::updateOrCreate(
            [
                'record_id' => $recruitment->id,
                'language_id' => $request->input('language_id')
            ],
            [
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'address' => $request->address,
                'working_form' => $request->working_form,
                'salary' => $request->salary,
                'unit' => $request->unit,
                'department' => $request->department,
            ]
        );

        return redirect(route('backend.dashboard.recruitment.index'));
    }
    public function edit(Request $request) {

        $recruitment = Recruitment::find($request->input('id'));
        $image = $recruitment->image($request->lang);
		$translation = $recruitment->translation($request->lang)->first();
        return response()->json([
            'recruitment' => $recruitment,
            'translation' => $translation,
            'image' => $image,
        ]);
    }

    public function delete(Request $request) {
        $recruitment = Recruitment::where('id', $request->id)->delete();
        RecruitmentTranslations::where('record_id', $request->id)->delete();
        Image::where('record_type', 'Recruitment')->where('record_id', $request->id)->delete();
        return redirect(route('backend.dashboard.recruitment.index'));
    }
}
