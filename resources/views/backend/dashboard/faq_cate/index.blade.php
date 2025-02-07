@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#faqModal" style="margin-right: 5px;">
        Thêm mới
    </a>
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
                                <th>Danh mục câu hỏi</th>
                                <th style="width: 150px;">Bản dịch</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($faqs->currentPage() - 1) * $faqs->perPage() + 1; ?>
                            @forelse($faqs as $faq)
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td style="text-align: left; padding-left: 20px;">
                                    {{ $faq->translation->name }}
                                </td>
                                <td>{{ implode(', ', $faq->language_codes->toArray()) }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $faq->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    {{-- <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $faq->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $faqs->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            <a class="btn btn-default btn-sm" href="{{ route('backend.dashboard.faq.index') }}">
                Quay lại
            </a>
        </div>
    </div>
</section>
@include('backend.dashboard.faq_cate.modal')
@endsection

@section('scripts')
<script>

    function alertDelete(id) {
        $('#myModal').data('id', id);
        $('#myModal').modal('toggle');
    }

    $('#myModal button.delete').on('click', function(e) {
        e.preventDefault();
        window.location.href = "faq_cate/delete" + "?id=" + $('#myModal').data('id');
    });

    function alertLang(id) {
        $('#langModal').data('id', id);
        $('#langModal').modal('toggle');
    }
    $('#faqModal').on('hidden.bs.modal', function() {
        $('#id').val('');
        $('#name').val('');
        $('#lang_code').text('VI');
        $('body').css('padding-right', '');
        $('#language_id').val('1')
    });
    function getFaq(langId, langCode){
        $('#langModal').on('hidden.bs.modal', function () {
            $('#faqModal').modal('show');
            $(this).off('hidden.bs.modal');
        });
        $('#langModal').modal('hide'); 
        $('#lang_code').text(langCode);  
        $.ajax({
            type: 'GET',
            url: 'faq_cate/edit' + '?id=' + $('#langModal').data('id') + '&lang=' + langId,
            success: function(data){
                $('#id').val(data.faq.id);
                $('#language_id').val(langId);
                $('#name').val(data.translation?.name ?? '');
            },
            error: function(error){
                console.log(error);
            }
        })
    }
</script>
@endsection