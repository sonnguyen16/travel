@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#pageModal">
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
                                <th>Tiêu đề</th>
                                <th style="width: 150px;">Bản dịch</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($pages->currentPage() - 1) * $pages->perPage() + 1; ?>
                            @forelse($pages as $page)
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td style="text-align: left; padding-left: 20px;">{{ $page->translation->name }}</td>
                                <td>{{ implode(', ', $page->language_codes->toArray()) }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $page->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    {{-- <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $page->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $pages->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.dashboard.pages.modal')
@endsection
@section('styles')
<style>
    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 400px;
            width: auto; 
        }
    }
</style>
@endsection
@section('scripts')
<script src="{{ asset('/assets/backend/themes/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('content', ckConfig);
</script>
<script src="{{ asset('/assets/backend/js/page.js') }}"></script>

@endsection