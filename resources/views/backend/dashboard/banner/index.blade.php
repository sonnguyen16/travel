@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div style="display: flex; justify-content: space-between;">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#bannerModal">
            Thêm mới
        </a>
        <form method="GET" action="{{ route('backend.dashboard.banner.index') }}" class="form-inline" id="search-form" style="display: flex; flex-wrap: nowrap; align-items: center;">
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
                                <th style="width: 50px;">Item</th>
                                <th style="width: 80px;">Hình ảnh</th>
                                <th style="width: 300px;">Tên</th>
                                <th>Link</th>
                                <th style="width: 100px;">Trạng thái</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($banners as $banner)
                            <tr>
                                <td>{{$banner->item}}</td>
                                <td>
                                    <div class="picture" style="background-image: url('{{ asset('public/uploads/banners/'. $banner->image->picture) }}')">
                                    </div>
                                </td>
                                <td style="text-align: left; padding-left: 20px;">{{ $banner->name }} </td>
                                <td>{{ $banner->link }} </td>
                                <td>
                                    @if ($banner->active == 1)
                                    <span class="label label-success">Hoạt động</span>
                                    @else
                                    <span class="label label-danger">Tạm dừng</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="getBanner({{ $banner->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $banner->id }})">
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
            {{ $banners->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</section>
@include('backend.dashboard.banner.modal')
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('/assets/backend/themes/plugins/iCheck/all.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('/assets/backend/themes/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('/assets/backend/js/banner.js') }}"></script>
@endsection