<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CKEditorController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = 'public/uploads/ckeditor/';
            $file->move(public_path($filePath), $fileName);

            $url = asset($filePath . $fileName);
            return response()->json([
                'uploaded' => 1,
                'fileName' => $fileName,
                'url' => $url
            ], 200, ['Content-Type' => 'application/json']);
        }

        return response()->json(['uploaded' => 0, 'error' => ['message' => 'File upload failed']]);
    }
}
