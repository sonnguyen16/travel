@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#languageModal">
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
                                <th>Tên</th>
                                <th style="width: 150px;">Mã</th>
                                <th style="width: 100px;">Trạng thái</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($languages->currentPage() - 1) * $languages->perPage() + 1; ?>
                            @forelse($languages as $language)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td style="text-align: left; padding-left: 20px;">{{ $language->name }} </td>
                                <td>{{ $language->code }} </td>
                                <td>
                                    @if ($language->active == 1)
                                        <span class="label label-success">Hoạt động</span>
                                    @else
                                        <span class="label label-danger">Tạm dừng</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#languageModal" onclick="getLanguage({{ $language->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>

                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $language->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
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
            {{ $languages->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</section>
@include('backend.dashboard.language.modal')
@endsection
@section('scripts')
<script src="{{ asset('/assets/backend/js/language.js') }}">
</script>
@endsection