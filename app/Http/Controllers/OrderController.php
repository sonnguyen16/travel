<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Validator;
use App\Models\Image;

class OrderController extends Controller
{
    public function __construct() {
    	if (!Auth::check())
    		return redirect(route('backend.dashboard.login'));
    }

    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->has('search') && $request->search) {
            $search = $request->search;
    
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%')
                    ->orWhere('phone', 'like', '%' . $search . '%');
            });
        }

		$status = $request->status !== null ? $request->status : 0;

        if ($status != 3) {
            $query->where('status', $status);
        }

        $orders = $query->orderby('id', 'desc')->where('isdelete', 0)->paginate(10);

        return view('backend.dashboard.order.index', [
			'orders' => $orders,
			'title' => 'Danh sách đơn đặt vé',
			'status' => $status,
		]);
    }
    public function delete(Request $request){
        $order = Order::where('id', $request->id)->first();
        $order->isdelete = 1;
        $order->save();
        return redirect()->back();
    }
    public function status(Request $request){
        $order = Order::where('id', $request->id)->first();
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }
    public function show(Request $request){
        $order = Order::where('id', $request->id)->first();
        $details = OrderDetail::where('order_fk', $request->id)->with(['product.translation'])->get();
        return response()->json([
            'order' => $order,
            'details' => $details
        ]);
    }
}
