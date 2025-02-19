function alertDetail(id) {
    $.ajax({
        type: 'GET',
        url: 'order/show?id=' + id, 
        success: function (data) {
            if (data.order) {
                const order = data.order;

                // Chuyển đổi thành đối tượng Date
                const date = new Date(order.created_at);

                // Lấy các thành phần của ngày
                const hours = date.getHours().toString().padStart(2, '0'); // Giờ (00-23)
                const minutes = date.getMinutes().toString().padStart(2, '0'); // Phút (00-59)
                const seconds = date.getSeconds().toString().padStart(2, '0'); // Giây (00-59)
                const day = date.getDate().toString().padStart(2, '0'); // Ngày (01-31)
                const month = (date.getMonth() + 1).toString().padStart(2, '0'); // Tháng (01-12)
                const year = date.getFullYear(); // Năm

                // Định dạng thành chuỗi mong muốn
                const formattedDate = `${hours}:${minutes}:${seconds} ${day}-${month}-${year}`;

                $('.panel-body .col-md-6:first').find('p:nth-child(1)').html('<strong>Tên:</strong> ' + order.name);
                $('.panel-body .col-md-6:first').find('p:nth-child(2)').html('<strong>Email:</strong> ' + order.email);
                $('.panel-body .col-md-6:first').find('p:nth-child(3)').html('<strong>Phone:</strong> ' + order.phone);

                $('.panel-body .col-md-6:last').find('p:nth-child(1)').html(`<strong>Ngày đặt:</strong> ${formattedDate}`);
                $('.panel-body .col-md-6:last').find('p:nth-child(2)').html('<strong>Mã giảm giá:</strong> ' + (order.discount_code || 'Không có'));
                $('.panel-body .col-md-6:last').find('p:nth-child(3)').html('<strong>Hình thức thanh toán:</strong> ' + order.payment_method.toUpperCase());
                
                let statusLabel = '';
                switch (order.status) {
                    case 0:
                        statusLabel = '<span class="label label-warning">Chưa duyệt</span>';
                        break;
                    case 1:
                        statusLabel = '<span class="label label-success">Đã duyệt</span>';
                        break;
                    case 2:
                        statusLabel = '<span class="label label-danger">Đã hủy</span>';
                        break;
                }
                $('.col-md-12 p').html('<strong>Trạng thái:</strong> ' + statusLabel);
            } else {
                console.error('Đơn hàng không tồn tại!');
            }
            const details = data.details;
            const tbody = $('#order-details-body');
            tbody.empty();
            if (details.length > 0) {
                let total = 0;
                details.forEach((item, index) => {
                    const productName = item.product.translation.name;
                    const priceAdult = Number(item.price_adult);
                    const priceChild = Number(item.price_child);
                    const numAdult = item.num_adult;
                    const numChild = item.num_child;
                    const subtotal = priceAdult * numAdult + priceChild * numChild;
                    total += subtotal;

                    tbody.append(`
                        <tr>
                            <td>${index + 1}</td>
                            <td>${productName}</td>
                            <td>${priceAdult.toLocaleString()} VND x ${numAdult}</td>
                            <td>${priceChild.toLocaleString()} VND x ${numChild}</td>
                            <td>${subtotal.toLocaleString()} VND</td>
                        </tr>
                    `);
                });

                tbody.append(`
                    <tr>
                        <td colspan="4" style="text-align: right;"><b>Tổng tiền: </b></td>
                        <td><b>${total.toLocaleString()} VND</b></td>
                    </tr>
                `);
            } else {
                tbody.append('<tr><td colspan="5" style="text-align: center;">Không có dữ liệu</td></tr>');
            }
        },
        error: function (error) {
            console.error('Lỗi khi lấy thông tin đơn hàng:', error);
        }
    });
}