@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div style="display: flex; justify-content: space-between; flex-wrap: nowrap; gap: 10px;">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#blogModal">
            Thêm mới
        </a>
        <form method="GET" action="{{ route('backend.dashboard.blog.index') }}" class="form-inline" id="search-form" style="display: flex; flex-wrap: nowrap; align-items: center;">
            <div class="input-group input-group-sm" style="margin-right: 10px;">
                <select name="status" class="form-control" onchange="this.form.submit()">
                <option value="1" {{ $status == 1 ? 'selected' : '' }}>Hoạt động</option>
                <option value="0" {{ $status == 0 ? 'selected' : '' }}>Tạm dừng</option>
                <option value="2" {{ $status == 2 ? 'selected' : '' }}>Tất cả</option>
                </select>
            </div>
            <div class="input-group input-group-sm" style="margin-right: 10px;">
                <select name="s_menu" class="form-control" tabindex="-1" aria-hidden="true" onchange="this.form.submit()">
                    <option value="" {{ $s_menu == '' ? 'selected' : '' }}>Tất cả</option>
                    @foreach($menus as $menu) 
                        <option value="{{ $menu->id }}" @if($s_menu == $menu->id) selected @endif>{{ $menu->translation->name . ' (' . $menu->Blogs()->count() .')' }} </option>
                    @endforeach
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
                    <table id="table_" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50px;">#</th>
                                <th style="width: 80px;">Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th style="width: 150px;">Bản dịch</th>
                                <th style="width: 100px;">Trạng thái</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($blogs->currentPage() - 1) * $blogs->perPage() + 1; ?>
                            @forelse($blogs as $blog)
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td>
                                    @if ($blog->image_fe)
                                    <div class="picture" style="background-image: url('{{ asset('public/uploads/blogs/'. $blog->image_fe->picture) }}')">
                                    </div>
                                    @endif
                                </td>
                                <td class="text-left td-b" style="max-width: 350px" title="{!! $blog->mota !!}">
                                    <b>{{ $blog->translation->name }}</b><br>
                                    {!! $blog->translation->description !!}
                                <td>
                                    {{$blog->menu->translation->name}}
                                </td>
                                <td>{{ implode(', ', $blog->language_codes->toArray()) }}</td>
                                <td>
                                    @if ($blog->active == 1)
                                    <span class="label label-success">Hoạt động</span>
                                    @else
                                    <span class="label label-danger">Tạm dừng</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $blog->id }}, {{ $blog->menu->id == 4 ? true : false }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $blog->id }})">
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
            <div class="text-center">
                {{ $blogs->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.dashboard.blog.modal')
@endsection
@section('styles')
<style>
    @media (max-width: 768px) {
        .modal-dialog {
            width: auto; 
        }
    }
    @media (min-width: 768px) {
        .modal-dialog {
            width: 768px;
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

    CKEDITOR.replace('content', ckConfig);
</script>
<script src="{{ asset('/assets/backend/js/blog.js') }}"></script>
@endsection