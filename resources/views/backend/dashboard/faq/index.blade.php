@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div style="display: flex; justify-content: space-between;">
        <div class="form-inline">
            <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#faqModal" style="margin-right: 5px;">
                Thêm mới
            </a>
            <a class="btn btn-success btn-sm" href="{{ route('backend.dashboard.faq_cate.index') }}">
                Danh mục câu hỏi
            </a>
        </div>
        
        <form method="GET" action="{{ route('backend.dashboard.faq.index') }}" class="form-inline" id="search-form" style="display: flex; flex-wrap: nowrap; align-items: center;">
            <div class="input-group input-group-sm" style="margin-right: 10px;">
                <select name="status" class="form-control" onchange="this.form.submit()">
                <option value="1" {{ $status == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $status == 0 ? 'selected' : '' }}>Tạm dừng</option>
                <option value="2" {{ $status == 2 ? 'selected' : '' }}>Tất cả</option>
                </select>
            </div>
        </form>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th>Câu hỏi</th>
                                <th style="width: 150px;">Danh mục</th>
                                <th style="width: 150px;">Bản dịch</th>
                                <th style="width: 100px;">Trạng thái</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($faqs->currentPage() - 1) * $faqs->perPage() + 1; ?>
                            @forelse($faqs as $faq)
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td class="text-left td-b" style="max-width: 350px" title="{!! $faq->translation->answer !!}">
                                    <b>{{ $faq->translation->question }}</b><br>
                                    {!! $faq->translation->answer !!}  
                                </td>
                                <td>
                                    {{ $faq->faq_cate->translation->name }}
                                </td>
                                <td>{{ implode(', ', $faq->language_codes->toArray()) }}</td>
                                <td>
                                    @if ($faq->active == 1)
                                    <span class="label label-success">Hoạt động</span>
                                    @else
                                    <span class="label label-danger">Tạm dừng</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $faq->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $faq->id }})">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $faqs->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.dashboard.faq.modal')
@endsection

@section('scripts')
<script src="{{ asset('/assets/backend/themes/bower_components/ckeditor/ckeditor.js') }}"></script>

<script>
    CKEDITOR.replace('answer', {
        height: 100,
        filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form'
    });

    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
    }

    $('#myModal button.delete').on('click', function(e) {
        e.preventDefault();
        window.location.href = "faq/delete" + "?id=" + $('#myModal').data('id');
    });

    function alertLang(id) {
        $('#langModal').data('id', id);
        $('#langModal').modal('toggle');
    }
    $('#faqModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#question').val('');
        $('#faq_cate_id').val('');
        $('#active').iCheck('uncheck');
        CKEDITOR.instances['answer'].setData(''); 
        $('#lang_code').text('VI');
        $('body').css('padding-right', '');
        $('#language_id').val('1');
        $('#toggle').show();
    });
    function getFaq(langId, langCode){
        $('#langModal').on('hidden.bs.modal', function () {
            $('#faqModal').modal('show');
            $(this).off('hidden.bs.modal');
        });
        $('#langModal').modal('hide'); 
        $('#lang_code').text(langCode);  
        if(langId == 1){
            $('#toggle').show();
        } else {
            $('#toggle').hide();
        }
        $.ajax({
            type: 'GET',
            url: 'faq/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
            success: function(data){
                $('#id').val(data.faq.id);
                $('#language_id').val(langId);
                $('#question').val(data.translation?.question ?? '');
                $('#faq_cate_id').val(data.faq.faq_cate_id);
                if (data.faq.active == 1) {
                    $('#active').iCheck('check');
                } else {
                    $('#active').iCheck('uncheck');
                }

                CKEDITOR.instances['answer'].setData(data.translation?.answer ?? '') ;
            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
@endsection