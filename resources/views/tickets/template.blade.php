<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách vé</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;

        }

        .ticket-container {
            width: 60%;
            margin: 0 auto;
        }

        .ticket {
            border: 2px solid black;
            padding: 20px;
            margin-bottom: 20px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        .content {
            font-size: 16px;
        }

        .barcode {
            margin-top: 10px;
        }

        .page-break {
            page-break-after: always;
        }

        /* Xuống trang mới nếu cần */
    </style>
</head>

<body>
    <div class="ticket-container">
        @foreach($tickets as $ticket)
        <div class="ticket">
            <div class="title">{{ $ticket['title'] }}</div>
            <hr>
            <div class="content">
                <p style="text-align:center"><strong>{{ $ticket['ticket_type'] }}</strong></p>
                <table style="width: 100%;">
                    <tr>
                        <td>Mã vé: {{ $ticket['ticket_code'] }}</td>
                        <td>Giá: {{ number_format($ticket['price'], 0, ',', '.') }} VNĐ</td>
                    </tr>
                    <tr>
                        <td>Người lớn: {{ $ticket['num_adult'] }}</td>
                        <td>Trẻ em: {{ $ticket['num_child'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Ngày giờ: {{ $ticket['date'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Thu ngân: {{ $ticket['cashier'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Thứ tự vé: {{ $ticket['order'] }}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Hóa đơn: {{ $ticket['invoice'] }}</td>
                    </tr>
                </table>
            </div>
            <div style="text-align:center" class="barcode">
                <img src="data:image/png;base64,{{ base64_encode($ticket['qr_code']) }}" alt="QR Code">
                <p>
                    (Vé đã mua không được hoàn trả, vé chỉ có giá trị sử dụng trong ngày.)
                </p>
            </div>
        </div>
        @if (!$loop->last)
        <div class="page-break"></div> <!-- Xuống trang mới nếu không phải vé cuối -->
        @endif
        @endforeach
    </div>
</body>

</html>
