<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\Translation;
use App\Models\FaqCate;

class FaqCateController extends Controller
{
    public function index(Request $request)
    {
        $query = FaqCate::query();
        $faqs = $query->orderby('id', 'desc')->with('translation')->paginate(20);
        $faqs->each(function ($faq) {
            $languageIds = Translation::where('record_id', $faq->id)->where('record_type', 'FaqCate')->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $faq->language_codes = $languageCodes;
        });
        return view('backend.dashboard.faq_cate.index', [
            'title' => 'Danh mục câu hỏi',
            'faqs' => $faqs,
        ]);
    }

    public function store(Request $request) {

        $faq = FaqCate::updateOrCreate(
            [ 'id' => $request->id ],
            []
        );


        Translation::updateOrCreate(
            [
                'record_id' => $faq->id,
                'language_id' => $request->input('language_id'),
                'record_type' => 'FaqCate'
            ],
            [
                'name' => $request->input('name'),
            ]
        );

        return redirect(route('backend.dashboard.faq_cate.index'));
    }
    public function edit(Request $request) {

        $faq = FaqCate::find($request->input('id'));
		$translation = $faq->translation($request->lang)->first();
        return response()->json([
            'faq' => $faq,
            'translation' => $translation,
        ]);
    }

    public function delete(Request $request) {
        $faq = FaqCate::where('id', $request->id)->delete();
        Translation::where('record_id', $request->id)->delete();
        return redirect(route('backend.dashboard.faq_cate.index'));
    }
}
