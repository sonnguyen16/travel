<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class ImageHelper
{
    /**
     * 
     * @param UploadedFile $file
     * @param string $destinationPath
     * @return string 
     */
    public static function saveImage(
        UploadedFile $file,
        string $destinationPath
    ): string {
        $fileName = Str::uuid() . '_' . date('YmdHis') . '_' . Auth::user()->id . '_' . $file->getClientOriginalName();
        $fullPath = public_path($destinationPath);

        $image = Image::make($file);

        $originalSize = filesize($file->getRealPath());
        $targetSize = $originalSize * 0.3;

        $image->save($fullPath . $fileName, 30, 'jpg');

        $compressedSize = filesize($fullPath . $fileName);
        if ($compressedSize > $targetSize) {
            $scaleFactor = sqrt($targetSize / $compressedSize);
            $newWidth = (int) ($image->width() * $scaleFactor);
            $newHeight = (int) ($image->height() * $scaleFactor);

            $image->resize($newWidth, $newHeight)->save($fullPath . $fileName, 30, 'jpg');
        }

        return $fileName;
    }

    /**
     * 
     * @param array $files
     * @param string $destinationPath
     * @return array
     */
    public static function saveImages(
        array $files,
        string $destinationPath
    ): array {
        $fileNames = [];
        $fullPath = public_path($destinationPath);

        foreach ($files as $file) {
            $fileName = Str::uuid() . '_' . date('YmdHis') . '_' . Auth::user()->id . '_' . $file->getClientOriginalName();

            $image = Image::make($file);

            $originalSize = filesize($file->getRealPath());
            $targetSize = $originalSize * 0.3;

            $image->save($fullPath . $fileName, 30, 'jpg');

            $compressedSize = filesize($fullPath . $fileName);
            if ($compressedSize > $targetSize) {
                $scaleFactor = sqrt($targetSize / $compressedSize);
                $newWidth = (int) ($image->width() * $scaleFactor);
                $newHeight = (int) ($image->height() * $scaleFactor);

                $image->resize($newWidth, $newHeight)->save($fullPath . $fileName, 30, 'jpg');
            }

            $fileNames[] = $fileName;
        }

        return $fileNames;
    }
}