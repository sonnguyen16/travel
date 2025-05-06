<?php

namespace App\Http\Middleware;

use App\Models\Banner;
use App\Models\Language;
use App\Models\Location;
use App\Models\Translation;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => fn () => [
                ...(new Ziggy)->toArray(),
                'location' => $request->url(),
            ],
            'languages' => Language::where('active', 1)->get(),
            'locations' => Location::where('active', 1)->with('translations.language')->get(),
            'background' => Banner::where('name', 'Background')->first(),
            'bannerImages' => function() use ($request) {
                // Chỉ lấy dữ liệu banner trang chủ khi ở trang chủ
                if ($request->is('/')) {
                    $homeBanner = Banner::where('name', 'Banner trang chủ')->first();
                    $bannerImages = [];
                    
                    if ($homeBanner) {
                        // Lấy hình ảnh chính của banner nếu có
                        if ($homeBanner->picture) {
                            $bannerImages[] = ['picture' => $homeBanner->picture];
                        }
                        
                        // Lấy các hình ảnh liên quan từ bảng images
                        $additionalImages = \App\Models\Image::where('record_type', 'Banner')
                                            ->where('record_id', $homeBanner->id)
                                            ->where('name', 'Picture')
                                            ->get();
                        
                        if ($additionalImages->count() > 0) {
                            foreach ($additionalImages as $image) {
                                $bannerImages[] = ['picture' => $image->picture];
                            }
                        }
                    }
                    
                    return $bannerImages;
                }
                
                return [];
            },
        ];
    }
}
