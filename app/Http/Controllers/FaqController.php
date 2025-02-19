<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Language;
use App\Models\FaqTranslations;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        $status = $request->status !== null ? $request->status : 1;

        if ($status != 2) {
            $query->where('active', $status);
        }

        $faqs = $query->orderby('id', 'desc')->with('translation')->paginate(20);
        $faqs->each(function ($faq) {
            $languageIds = FaqTranslations::where('record_id', $faq->id)->pluck('language_id');
    
            $languageCodes = Language::whereIn('id', $languageIds)->orderby('id', 'asc')->pluck('code');
        
            $faq->language_codes = $languageCodes;
        });
        return view('backend.dashboard.faq.index', [
            'title' => 'Danh sách câu hỏi thường gặp',
            'faqs' => $faqs,
            'status' => $status,
        ]);
    }

    public function store(Request $request) {
        $faqData = [
            'active' => $request->active ? 1 : 0,
            'faq_cate_id' => $request->faq_cate_id,
        ];

        $faq = Faq::updateOrCreate(
            [ 'id' => $request->id ],
            $faqData
        );


        FaqTranslations::updateOrCreate(
            [
                'record_id' => $faq->id,
                'language_id' => $request->input('language_id')
            ],
            [
                'question' => $request->input('question'),
                'answer' => $request->input('answer'),
            ]
        );

        return redirect(route('backend.dashboard.faq.index', $request->query()));
    }
    public function edit(Request $request) {

        $faq = Faq::find($request->input('id'));
		$translation = $faq->translation($request->lang)->first();
        return response()->json([
            'faq' => $faq,
            'translation' => $translation,
        ]);
    }

    public function delete(Request $request) {
        $faq = Faq::where('id', $request->id)->delete();
        FaqTranslations::where('record_id', $request->id)->delete();
        return redirect(route('backend.dashboard.faq.index'));
    }
}
