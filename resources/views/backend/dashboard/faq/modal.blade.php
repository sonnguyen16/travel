<div id="myModal" class="modal fade" role="dialog" data-id="0">
    <div class="modal-dialog" id="modal-dialog-delete">
        <div class="modal-content">
          <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">&times;</button>
             <h4 class="modal-title"><strong><i class="fa fa-exclamation-triangle" style="color: red;"></i> Xác nhận xóa</strong></h4>
          </div>
          <div class="modal-body">
             <p>Bạn có thật sự muốn xóa câu hỏi này và các bản dịch liên quan (nếu có) ?</p>
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
                    <button type="button" class="btn btn-default btn-sm" style="margin-right: 5px; margin-bottom: 10px; " onclick="getFaq({{ $lang->id }}, '{{ $lang->code }}')">
                        {{ $lang->name . ' (' . $lang->code . ')' }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="faqModal" class="modal fade" role="dialog" aria-labelledby="faqModalLabel">
    <div class="modal-dialog" style="width: 800px;">
        <div class="modal-content">
            <form action="{{ route('backend.dashboard.faq.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="text" id="id" name="id" value="" hidden>
                    <input type="text" value="1" id="language_id" name="language_id" hidden>
                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between;">
                            <label>Câu hỏi <span style="color: red">*</span></label>
                            <label id="lang_code">VI</label>
                        </div>
                        <input name="question" id="question" type="text" class="form-control" placeholder="Nhập câu hỏi ..." required>
                    </div>
                    <div class="row" id="toggle">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Danh mục câu hỏi</label>
                                <select name="faq_cate_id" id="faq_cate_id" class="form-control">
                                    <option value="">Chọn danh mục câu hỏi</option>
                                    @foreach (\App\Models\FaqCate::all() as $faq_cate)
                                        <option value="{{ $faq_cate->id }}">{{ $faq_cate->translation->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label style="margin-top: 10px">
                                    <input name="active" id="active" type="checkbox" class="flat-red"> Hoạt động
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Câu trả lời</label>
                        <textarea name="answer" id="answer"></textarea>
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