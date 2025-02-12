<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VNPayService;
use App\Models\Order;

class VNPayController extends Controller
{
    protected $vnpayService;

    public function __construct(VNPayService $vnpayService)
    {
        $this->vnpayService = $vnpayService;
    }

    // Tạo URL thanh toán
    public function createPayment(Request $request)
    {
        $amount = $request->input('amount');
        $orderId = $request->input('order_id');

        $vnpUrl = $this->vnpayService->createPaymentUrl($amount, $orderId);

        return redirect($vnpUrl);
    }

    // Xử lý callback từ VNPay
    public function vnpayReturn(Request $request)
    {
        $orderId = $request->query('order_id');
        // Kiểm tra giao dịch có thành công hay không
        if ($request->vnp_ResponseCode == "00") {
            // Cập nhật trạng thái đơn hàng
            $order = Order::find($orderId);
            if ($order) {
                $order->status = 1; // Đánh dấu đơn hàng đã thanh toán thành công
                $order->save();
            }
            return redirect()->route('exportPDF', ['order_id' => $orderId]);
        }
        return "Thanh toán thất bại!";
    }
}
