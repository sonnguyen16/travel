<div id="profileModal" class="modal fade" role="dialog" aria-labelledby="profileModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile</h4>
            </div>
            <form action="{{ route('backend.dashboard.user.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id_p" name="id" value="" hidden>
                    <input name="super_user" id="super_user_p" type="text" hidden>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tài khoản <span style="color: red">*</span></label>
                                <input name="user_name" id="user_name_p" type="text" class="form-control" placeholder="Enter username..." required>
                            </div>  
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input name="password" id="password_p" type="password" class="form-control" placeholder="New Password...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Xác nhận mật khẩu</label>
                                <input name="password_confirmation" id="password_confirmation_p" type="password" class="form-control" placeholder="Retype New Password...">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ tên <span style="color: red">*</span></label>
                                <input name="name" id="name_p" type="text" class="form-control" placeholder="Name..." required>
                            </div>
                            <div class="form-group">
                                <label>Email <span style="color: red">*</span></label>
                                <input name="email" id="email_p" type="email" class="form-control" placeholder="Email..." required>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="picture" id="picture_p" class="form-control">
                            </div>
                            <img src="" alt="Profile Picture" style="width: 100px; margin-bottom: 15px;" id="image_p" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số điện thoại <span style="color: red">*</span></label>
                                <input name="phone" id="phone_p" type="tel" class="form-control" placeholder="Phone..." required>
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh <span style="color: red">*</span></label>
                                <input name="birthday" id="birthday_p" type="date" class="form-control" required>
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