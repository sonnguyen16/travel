<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog confirm-dia">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong><i class="fa fa-exclamation-triangle" style="color: red;"></i> Xác nhận xóa</strong></h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn xóa đơn hàng này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <button type="button" class="btn btn-danger delete">Có</button>
            </div>
        </div>
    </div>
</div>
<div id="uploadModal" class="modal fade" role="dialog" data-id="0" data-status="0">
    <div class="modal-dialog confirm-dia">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Xác nhận duyệt đơn</strong></h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn duyệt đơn đặt vé này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <button type="button" class="btn btn-success">Có</button>
            </div>
        </div>
    </div>
</div>
<div id="cancelModal" class="modal fade" role="dialog" data-id="0" data-status="0">
    <div class="modal-dialog confirm-dia">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Xác nhận hủy đơn</strong></h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn hủy đơn đặt vé này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <button type="button" class="btn btn-danger">Có</button>
            </div>
        </div>
    </div>
</div>
<div id="orderModal" class="modal fade" role="dialog" aria-labelledby="orderModalLabel">
    <div class="modal-dialog" id="chi-tiet">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong>Chi tiết đơn đặt vé</strong></h4>
            </div> --}}
            <form action="{{ route('backend.dashboard.order.status') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="box">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Thông tin đơn hàng</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>Tên:</strong></p>
                                        <p><strong>Email:</strong></p>
                                        <p><strong>Phone:</strong></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong>Ngày đặt:</strong></p>
                                        <p><strong>Mã giảm giá:</strong></p>
                                        <p><strong>Hình thức thanh toán:</strong></p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Trạng thái:</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Chi tiết đơn</h3>
                            </div>
                            <div class="panel-body">
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-bordered">
                                        <thead style="background-color: white;">
                                        <tr>
                                            <th>#</th>
                                            <th>Vé</th>
                                            <th>Vé người lớn</th>
                                            <th>Vé trẻ em</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                        </thead>
                                        <tbody id="order-details-body">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>