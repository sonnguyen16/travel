<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" id="modal-dialog-delete">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong><i class="fa fa-exclamation-triangle" style="color: red;"></i> Xác nhận xóa</strong></h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn xóa banner này?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <button type="button" class="btn btn-danger delete">Có</button>
            </div>
        </div>
    </div>
</div>
<div id="bannerModal" class="modal fade" role="dialog" aria-labelledby="bannerModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.banner.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    {{-- <div class="row">
                        <div class="col-xs-10">
                            <div class="form-group">
                                <label>Tên <span style="color: red">*</span></label>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Nhập tên vé ..." required>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group form-group-sm">
                                <label>Stt <span style="color: red">*</span></label>
                                <input name="item" id="item" type="number" step="1" class="form-control" min="1" value="1">
                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input name="picture" id="picture" type="file" class="form-control" required>
                            </div>
                            <img src="" alt="Picture" style="width: 150px; margin-bottom: 15px;" id="image" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-sm">
                                <label>Link</label>
                                <input name="link" id="link" type="text" class="form-control" placeholder="Enter ..." >
                            </div>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label>Tên banner <span style="color: red">*</span></label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Nhập tên banner ..." required readonly>
                    </div>
                    <div class="form-group single-image">
                        <label>Hình ảnh</label>
                        <input name="picture" id="picture" type="file" class="form-control" required>
                    </div>
                    <img src="" alt="Picture" style="width: 200px; margin-bottom: 15px;" id="image" hidden>

                    <div class="form-group multiple-images" style="display: none;">
                        <label>Chọn nhiều hình ảnh</label>
                        <input name="pictures[]" id="pictures-input" type="file" class="form-control" multiple>
                        <div id="pictures-preview" class="row mt-3"></div>
                    </div>
                    <div id="existing-images" class="row mt-3"></div>
                    {{-- <div class="form-group">
                        <label style="margin-top: 15px">
                            <input name="active" id="active" type="checkbox" class="flat-red"> Hoạt động
                        </label>
                    </div> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-success">Lưu thông tin</button>
                </div>
            </form>
        </div>
    </div>
</div>
