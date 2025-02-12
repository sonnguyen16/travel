<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
use App\Models\Order;
use App\Models\OrderDetail;

class TicketController extends Controller
{
    public function exportPDF($order_id)
    {
        $order = Order::findOrFail($order_id);
        $orderDetails = OrderDetail::where('order_fk', $order_id)->get();

        $tickets = [];

        foreach ($orderDetails as $orderDetail) {
            $ticket_code = uniqid();
            $qrCodeImage = QrCode::format('svg')->size(150)->generate($ticket_code);

            $tickets[] = [
                'title' => $orderDetail->product->location->translation->name,
                'ticket_type' => $orderDetail->product->translation->name,
                'num_adult' => $orderDetail->num_adult,
                'num_child' => $orderDetail->num_child,
                'price' => $orderDetail->product->price,
                'date' => now()->format('d/m/Y - H:i:s'),
                'ticket_code' => $ticket_code,
                'cashier' => 'Quầy 1 - C01',
                'invoice' => '2025-0168547',
                'order' => $order->id,
                'qr_code' => $qrCodeImage
            ];
        }

        $pdf = PDF::loadView('tickets.template', compact('tickets'));

        return $pdf->stream("order_$order_id.pdf"); // Xuất file PDF với tất cả vé

    }
}
