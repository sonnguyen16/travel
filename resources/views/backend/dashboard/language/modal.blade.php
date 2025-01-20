<div id="languageModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="languageModalLabel" aria-modal="true">
    <div class="modal-dialog" id="modal-dialog-delete">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.language.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Tên <span style="color: red">*</span></label>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Tiếng Việt ..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label>Mã <span style="color: red">*</span></label>
                                <input name="code" id="code" type="text" class="form-control" placeholder="VI ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label style="margin-top: 20px">
                            <input name="active" id="active" type="checkbox" class="flat-red" value="1"> Hoạt động
                        </label>
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

<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong><i class="fa fa-exclamation-triangle" style="color: red;"></i> Xác nhận xóa</strong></h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn xóa ngôn ngữ này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <button type="button" class="btn btn-danger delete">Có</button>
            </div>
        </div>
    </div>
</div>