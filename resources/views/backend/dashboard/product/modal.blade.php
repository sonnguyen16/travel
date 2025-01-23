<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" style="max-width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><strong><i class="fa fa-exclamation-triangle" style="color: red;"></i> Xác nhận xóa</strong></h4>
            </div>
            <div class="modal-body">
                <p>Bạn có thật sự muốn xóa vé này và các bản dịch liên quan (nếu có) ?</p>
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
                    <button type="button" class="btn btn-default btn-sm" style="margin-right: 5px; margin-bottom: 10px; " onclick="getProduct({{ $lang->id }}, '{{ $lang->code }}')">
                        {{ $lang->name . ' (' . $lang->code . ')' }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="productModal" class="modal fade" role="dialog" aria-labelledby="productModalLabel">
    <div class="modal-dialog" style="width: 800px; overflow-y: auto;">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.product.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <input type="text" value="1" id="language_id" name="language_id" hidden>
                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between;">
                            <label>Tên <span style="color: red">*</span></label>
                            <label id="lang_code">VI</label>
                        </div>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Nhập tên vé ..." required>
                    </div>
                    <div id="div-toggle">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Giá người lớn <span style="color: red">*</span></label>
                                    <input name="price" id="price" type="number" min="0" class="form-control" placeholder="Nhập giá ..." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Giá trẻ em <span style="color: red">*</span></label>
                                    <input name="price_child" id="price_child" type="number" min="0" class="form-control" placeholder="Nhập giá ..." required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group " id="div-menu">
                                    <label>Thuộc địa điểm <span style="color: red">*</span></label>
                                    <select name="location_id" id="location_id" class="form-control" required>
                                        @foreach($locations as $item)
                                            <option value="{{ $item->id }}">{{ $item->translation->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input name="picture" id="picture" type="file" class="form-control" required>
                    </div>
                    <img src="" alt="Picture" style="width: 150px; margin-bottom: 15px;" id="image" hidden>
                    {{-- <div class="form-group">
                        <label>Hình ảnh khác</label>
                        <input type="file" name="pictures[]" multiple class="form-control"></input>
                    </div>
                    <div class="row" style="display: flex; flex-wrap: wrap; gap: 10px;" id="pictures">
                    </div> --}}
                    <div class="form-group">
                        <label style="margin-top: 15px">
                            <input name="active" id="active" type="checkbox" class="flat-red"> Hoạt động
                        </label>
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