<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" id="modal-dialog-delete">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title"><strong><i class="fa fa-exclamation-triangle" style="color: red;"></i> Xác nhận xóa</strong></h4>
          </div>
          <div class="modal-body">
             <p>Bạn có thật sự muốn xóa tin tuyển dụng này và các bản dịch liên quan (nếu có) ?</p>
          </div>
          <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
             <button type="button" class="btn btn-danger delete">Có</button>
          </div>
       </div>
    </div>
</div>
<div id="langModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chọn ngôn ngữ</h4>
            </div>
            <div class="modal-body">
                @foreach ($langs as $lang)
                    <button type="button" class="btn btn-default btn-sm" style="margin-right: 5px; margin-bottom: 10px; " onclick="getRecruitment({{ $lang->id }}, '{{ $lang->code }}')">
                        {{ $lang->name . ' (' . $lang->code . ')' }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="recruitmentModal" class="modal fade" role="dialog" aria-labelledby="recruitmentModalLabel">
    <div class="modal-dialog" style="width: 800px;">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.recruitment.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <input type="text" value="1" id="language_id" name="language_id" hidden>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div style="display: flex; justify-content: space-between;">
                                    <label>Tiêu đề <span style="color: red">*</span></label>
                                    <label id="lang_code">VI</label>
                                </div>
                                <input name="name" id="name" type="text" class="form-control" placeholder="Nhập tiêu đề ..." required>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ <span style="color: red">*</span></label>
                                <input name="address" id="address" type="text" class="form-control" placeholder="Nhập địa chỉ ..." required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hạn nộp <span style="color: red">*</span></label>
                                        <input name="deadline" id="deadline" type="date" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Mức lương <span style="color: red">*</span></label>
                                        <input name="salary" id="salary" type="text" class="form-control" placeholder="Nhập mức lương ..." required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Khối <span style="color: red">*</span></label>
                                        <input type="text" name="unit" id="unit" placeholder="Khối văn phòng ..." class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Phòng ban <span style="color: red">*</span></label>
                                        <input type="text" name="department" id="department" placeholder="Marketing ..." class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hình ảnh <span style="color: red">*</span></label>
                                <input type="file" name="picture" id="picture" class="form-control" required></input>
                            </div>
                            <img src="" alt="Picture" style="width: 150px; margin-bottom: 15px;" id="image" hidden>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hình thức làm việc <span style="color: red">*</span></label>
                                <input type="text" name="working_form" id="working_form" class="form-control" placeholder="Toàn thời gian ..." required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 10px">
                            <input name="active" id="active" type="checkbox" class="flat-red"> Hoạt động
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Mô tả công việc</label>
                        <textarea name="description" id="description"></textarea>
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