<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" id="modal-dialog-delete">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong><i class="fa fa-exclamation-triangle" style="color: red;"></i> Xác nhận xóa</strong></h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn xóa danh mục này và các bản dịch liên quan (nếu có) ?</p>
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
                    <button type="button" class="btn btn-default btn-sm" style="margin-right: 5px; margin-bottom: 10px; " data-toggle="modal" data-target="#menuModal" onclick="getMenu({{ $lang->id }}, '{{ $lang->code }}')">
                        {{ $lang->name . ' (' . $lang->code . ')' }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="menuModal" class="modal fade" role="dialog" aria-labelledby="menuModalLabel">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.menu.store', request()->query()) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <input type="text" value="1" id="language_id" name="language_id" hidden>
                    <div class="form-group ">
                        <div style="display: flex; justify-content: space-between;">
                            <label>Tên danh mục <span style="color: red">*</span></label>
                            <label id="lang_code">VI</label>
                        </div>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Danh mục ..." required>
                    </div>
                    <div class="row" id="div-toggle">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input name="picture" type="file" id="picture" class="form-control">
                            </div>
                            <div class="form-group" id="div-image">
                                <div class="wrap-btn-delete" style="position: absolute;">
                                    <a onclick="deleteImg()" style="cursor: pointer;">
                                        <span class="btn-delete-image" style="color: red; font-size: 20px; margin-left: 1px; background-color: white; padding: 0 5px"><b>x</b></span>
                                    </a>
                                </div>
                                <img src="" alt="Picture" style="width: 150px; margin-bottom: 15px;" id="image">   
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group " id="div-menu">
                                <label>Loại danh mục <span style="color: red">*</span></label>
                                <select name="menu_fk" id="menu_fk" class="form-control" required>
                                    <option value="0" selected="">Danh mục cấp đầu </option>
                                    @foreach($menus as $item)
                                        <option value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                    @endforeach
                                </select>
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