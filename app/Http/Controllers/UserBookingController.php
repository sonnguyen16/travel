<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;

class UserBookingController extends Controller
{
    public function index()
    {
        $products = Product::query()
            ->where('active', 1)
            ->with('translations.language', 'image_fe', 'location')
            ->get();

        $promo = Blog::query()
            ->where('active', 1)
            ->whereHas('menu', function ($query) {
                $query->where('slug', 'uu-dai');
            })
            ->with('translations.language', 'image_fe')
            ->get();

        return Inertia::render('Booking/Step1', compact('products', 'promo'));
    }

    public function cart()
    {
        $products = Product::query()
            ->where('active', 1)
            ->with('translations.language', 'image_fe', 'location')
            ->get();

        return Inertia::render('Booking/Step2', compact('products'));
    }

    public function pay()
    {
        $products = Product::query()
            ->where('active', 1)
            ->with('translations.language', 'image_fe')
            ->get();

        return Inertia::render('Booking/Step3', compact('products'));
    }

    public function confirm(Request $request)
    {
        $order = Order::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'total' => $request->total,
            'payment_method' => $request->payment_method,
            'status' => 0,
        ]);

        $order_details = $request->order_details;

        foreach ($order_details as $order_detail) {
            $order->details()->create([
                'product_fk' => $order_detail['product_fk'],
                'num_child' => $order_detail['num_child'],
                'num_adult' => $order_detail['num_adult'],
                'price_child' => $order_detail['price_child'],
                'price_adult' => $order_detail['price_adult'],
                'date' => $order_detail['date'],
            ]);
        }

        return response()->json(['order_id' => $order->id]);
    }
}
