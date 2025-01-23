<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" id="modal-dialog-delete">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Xác nhận xóa</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn xóa user này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <button type="button" class="btn btn-danger delete">Có</button>
            </div>
        </div>
    </div>
</div>
<div id="userModal" class="modal fade" role="dialog" aria-labelledby="userModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.user.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <div class="form-group">
                        <label>Tài khoản <span style="color: red">*</span></label>
                        <input name="user_name" id="user_name" type="text" class="form-control" placeholder="Tên tài khoản..." required>
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="password" id="password" type="password" class="form-control" placeholder="Mật khẩu..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="Xác nhận lại mật khẩu...">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ tên <span style="color: red">*</span></label>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Họ tên..." required>
                            </div>
                            <div class="form-group">
                                <label>Email <span style="color: red">*</span></label>
                                <input name="email" id="email" type="email" class="form-control" placeholder="Email..." required>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="picture" id="picture" class="form-control">
                            </div>
                            <img src="" alt="Profile Picture" style="width: 100px; margin-bottom: 15px;" id="image" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại <span style="color: red">*</span></label>
                                <input name="phone" id="phone" type="tel" class="form-control" placeholder="Số điện thoại..." required>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh <span style="color: red">*</span></label>
                                <input name="birthday" id="birthday" type="date" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 25px">
                                    <input name="super_user" id="super_user" type="checkbox" class="flat-red"> Super User
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div>