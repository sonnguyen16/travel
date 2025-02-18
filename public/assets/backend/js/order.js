function alertDetail(id) {
    $.ajax({
        type: 'GET',
        url: 'order/show?id=' + id, 
        success: function (data) {
            if (data.order) {
                const order = data.order;

                $('.panel-body .col-md-6:first').find('p:nth-child(1)').html('<strong>Tên:</strong> ' + order.name);
                $('.panel-body .col-md-6:first').find('p:nth-child(2)').html('<strong>Email:</strong> ' + order.email);
                $('.panel-body .col-md-6:first').find('p:nth-child(3)').html('<strong>Phone:</strong> ' + order.phone);

                $('.panel-body .col-md-6:last').find('p:nth-child(1)').html('<strong>Ngày đặt:</strong> ' + order.created_at);
                $('.panel-body .col-md-6:last').find('p:nth-child(2)').html('<strong>Mã giảm giá:</strong> ' + (order.discount_code || 'Không có'));
                $('.panel-body .col-md-6:last').find('p:nth-child(3)').html('<strong>Hình thức thanh toán:</strong> ' + order.payment_method);
                
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
                    const priceAdult = item.price_adult;
                    const priceChild = item.price_child;
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