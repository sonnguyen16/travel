@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#recruitmentModal" style="margin-right: 5px;">
            Thêm mới
        </a>
        
        <form method="GET" action="{{ route('backend.dashboard.recruitment.index') }}" class="form-inline" id="search-form" style="display: flex; flex-wrap: nowrap; align-items: center;">
            <div class="input-group input-group-sm" style="margin-right: 5px;">
                <select name="status" class="form-control" onchange="this.form.submit()">
                <option value="1" {{ $status == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $status == 0 ? 'selected' : '' }}>Tạm dừng</option>
                <option value="2" {{ $status == 2 ? 'selected' : '' }}>Tất cả</option>
                </select>
            </div>
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Tìm kiếm ...">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    @if(request('search'))
                    <button type="button" id="clear-search" class="btn btn-default" onclick="clearSearch()"><i class="fa fa-remove"></i></button>
                    @endif 
                </div>
            </div>
        </form>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table id="table_" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th style="width: 80px;">Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th>Địa chỉ</th>
                                <th>Hạn nộp</th>
                                <th>Phòng ban</th>
                                <th style="width: 150px;">Bản dịch</th>
                                <th style="width: 100px;">Trạng thái</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($recruitments->currentPage() - 1) * $recruitments->perPage() + 1; ?>
                            @forelse($recruitments as $recruitment)
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td>
                                    @if ($recruitment->image_fe)
                                    <div class="picture" style="background-image: url('{{ asset('public/uploads/recruitments/'. $recruitment->image_fe?->picture ?? '') }}')">
                                    </div>
                                    @endif
                                </td>
                                <td style="text-align: left; padding-left: 20px;">{{ $recruitment->translation->name }}</td>
                                <td style="text-align: left; padding-left: 20px;">{{ $recruitment->translation->address }}</td>
                                <td>{{ \Carbon\Carbon::parse($recruitment->deadline)->format('d-m-Y') }}</td>
                                <td style="text-align: left; padding-left: 20px;">{{ $recruitment->translation->department }}</td>
                                <td>{{ implode(', ', $recruitment->language_codes->toArray()) }}</td>
                                <td>
                                    @if ($recruitment->active == 1)
                                    <span class="label label-success">Hoạt động</span>
                                    @else
                                    <span class="label label-danger">Tạm dừng</span>
                                    @endif
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $recruitment->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $recruitment->id }})">
                                    <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $recruitments->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>

@include('backend.dashboard.recruitment.modal')
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
<link rel="stylesheet" href="{{ asset('/assets/backend/themes/plugins/iCheck/all.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('/assets/backend/themes/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('/assets/backend/themes/bower_components/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('description', ckConfig);
</script>
<script src="{{ asset('/assets/backend/js/recruitment.js') }}"></script>
@endsection