<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" id="modal-dialog-delete">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong><i class="fa fa-exclamation-triangle" style="color: red;"></i> Xác nhận
                        xóa</strong></h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn xóa bài viết này và các bản dịch liên quan (bao gồm hoạt động nổi bật nếu có) ?
                </p>
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
                <h4 class="modal-title">Tùy chọn</h4>
            </div>
            <div class="modal-body">
                <button id="gotoActivity" class="btn btn-success btn-sm"
                    style="margin-right: 5px; margin-bottom: 10px;">
                    Hoạt động nổi bật
                </button>
                @foreach ($langs as $lang)
                <button type="button" class="btn btn-default btn-sm" style="margin-right: 5px; margin-bottom: 10px; "
                    onclick="getBlog({{ $lang->id }}, '{{ $lang->code }}')">
                    {{ $lang->name . ' (' . $lang->code . ')' }}
                </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="blogModal" class="modal fade" role="dialog" aria-labelledby="blogModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.blog.store', request()->query()) }}" method="post"
                enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" hidden>
                    <input type="text" value="1" id="language_id" name="language_id" hidden>
                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between;">
                            <label>Tiêu đề <span style="color: red">*</span></label>
                            <label id="lang_code">VI</label>
                        </div>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Nhập tiêu đề ..."
                            required>
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu bài viết</label>
                        <div class="input-group">
                            <input name="password" id="password" type="password" class="form-control"
                                placeholder="Để trống nếu không cần mật khẩu">
                            <span class="input-group-addon" id="togglePassword"
                                style="cursor: pointer; padding: 4px 12px">
                                <i class="fa fa-eye" id="passwordIcon"></i>
                            </span>
                        </div>
                        <small class="text-muted">Nếu để trống, bài viết sẽ công khai. Nếu có mật khẩu, người đọc phải
                            nhập mật khẩu để xem nội dung (Chỉ áp dụng với tin tức)</small>
                    </div>
                    <div id="div-toggle">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input name="picture" id="picture" type="file" class="form-control">
                                </div>
                                <img src="" alt="Picture" style="width: 100px; margin-bottom: 15px;" id="image" hidden>
                            </div>
                            <div class="col-md-3" id="type_menu">
                                <div class="form-group">
                                    <label>Loại danh mục <span style="color: red">*</span></label>
                                    <select name="menu_id" id="menu_id" class="form-control" required>
                                        @foreach($menus as $item)
                                        <option value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3" id="type_child">
                                <div class="form-group">
                                    <label>Loại tin tức <span style="color: red">*</span></label>
                                    <select name="news_id" id="news_id" class="form-control" required>
                                        <option value="">Chọn loại</option>
                                        @foreach(\App\Models\Menu::where('menu_fk', 2)->get() as $item)
                                        <option value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Thuộc địa điểm <span style="color: red">*</span></label>
                                    <select name="location_id" id="location_id" class="form-control" required>
                                        <option value="">Chọn địa điểm</option>
                                        @foreach(\App\Models\Location::all() as $item)
                                        <option value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh khác</label>
                            <input type="file" name="pictures[]" class="form-control" id="picturesInput" multiple>
                        </div>
                        <div class="row" style="display: flex; flex-wrap: wrap;" id="pictures"></div>
                        <div class="form-group">
                            <label style="margin-top: 15px">
                                <input name="active" id="active" type="checkbox" class="flat-red"> Hoạt động
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Địa điểm</label>
                                <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Mô tả địa điểm...">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea id="description" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="content">Nội dung</label>
                        <textarea id="content" name="content"></textarea>
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