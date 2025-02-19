@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#activityModal">
            Thêm mới
        </a>
    </div>
</section>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body table-responsive no-padding">
                    <table id="table_" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th style="width: 80px;">Hình ảnh</th>
                                <th>Tiêu đề</th>
                                <th style="width: 150px;">Bản dịch</th>
                                <th style="width: 100px;">Trạng thái</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            @forelse($activities as $activity)
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>
                                    @if ($activity->image)
                                    <div class="picture" style="background-image: url('{{ asset('public/uploads/activities/'. $activity->image?->picture ?? '') }}')">
                                    </div>
                                    @endif
                                </td>
                                <td style="text-align: left; padding-left: 20px;">
                                    {{ $activity->translation->name }}
                                </td>
                                <td>{{ implode(', ', $activity->language_codes->toArray()) }}</td>
                                <td>
                                    @if ($activity->active == 1)
                                    <span class="label label-success">Hoạt động</span>
                                    @else
                                    <span class="label label-danger">Tạm dừng</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $activity->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $activity->id }}, {{ request('blog_id') }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-default btn-sm" href="{{ route('backend.dashboard.blog.index') }}">
                Quay lại
            </a>
        </div>
    </div>
</section>
@include('backend.dashboard.activity.modal')
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
<script>
    CKEDITOR.replace('content', ckConfig);
</script>
<script src="{{ asset('/assets/backend/js/activity.js') }}"></script>
@endsection