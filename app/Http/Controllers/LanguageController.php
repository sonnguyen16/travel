<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request) {
        $languages = Language::paginate(10);
        return view('backend.dashboard.language.index',[
            'languages'=>$languages, 
            'title' => 'Danh sách ngôn ngữ']);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required|unique:languages,code,' . ($request->input('id') ?? 'null'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Language::updateOrCreate(
            [
                'id' => $request->input('id'),
            ],
            [
                'name' => $request->input('name'),
                'code' => strtoupper($request->input('code')),
                'active' => $request->input('active') ?? 0
            ]
        );

        return redirect(route('backend.dashboard.language.index'));
    }


    public function edit(Request $request) {
        $id = $request->input('id');
        $language = Language::where('id', $id)->first();
        return response()->json(['language' => $language]);
    }

    public function delete(Request $request){
        if($request->id == 1 || $request->id == 2 || $request->id == 3){
            return redirect()->back()->withErrors("Không thể xóa mục này")->withInput();
        }
        Language::where('id', $request->id)->delete();
        return redirect(route('backend.dashboard.language.index'));
    }
   
}
