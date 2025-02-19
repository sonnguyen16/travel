<div id="locationModal" class="modal fade" role="dialog" tabindex="-1" aria-labelledby="locationModalLabel" aria-modal="true">
    <div class="modal-dialog" id="modalInput">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.location.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <input type="text" value="1" id="language_id" name="language_id" hidden>
                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between;">
                            <label>Tên <span style="color: red">*</span></label>
                            <label id="lang_code">VI</label>
                        </div>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Nhập địa điểm ..." required>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 10px">
                            Hiển thị trong danh mục chọn điểm đến <input name="active" id="active" type="checkbox" class="flat-red"> 
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Thư viện ảnh</label>
                        <input type="file" name="pictures[]" multiple class="form-control" id="picturesInput">
                    </div>
                    <div class="row" style="display: flex; flex-wrap: wrap;" id="pictures">
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

<div id="langModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Chọn ngôn ngữ</h4>
            </div>
            <div class="modal-body">
                @foreach ($langs as $lang)
                    <button type="button" class="btn btn-default btn-sm" style="margin-right: 5px; margin-bottom: 10px; " data-toggle="modal" data-target="#locationModal" onclick="getLocation({{ $lang->id }}, '{{ $lang->code }}')">
                        {{ $lang->name . ' (' . $lang->code . ')' }}
                    </button>
                @endforeach
            </div>
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