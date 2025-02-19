@extends('backend.layouts.app')
@section ('content')
<section class="content-header">
    <div style="display: flex; justify-content: space-between;">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#menuModal">
            Thêm mới
        </a>
        <form method="GET" action="{{ route('backend.dashboard.menu.index') }}" class="form-inline" id="search-form">
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
                                <th>Tên danh mục</th>
                                <th style="width: 150px;">Bản dịch</th>
                                <th style="width: 100px;">Thực hiện</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($menus->currentPage() - 1) * $menus->perPage() + 1; ?>
                            @forelse($menus as $menu)
                            <tr>
                                <td>{{ $i }}</td>
                                <td style="padding: 0;">
                                    @if (!empty($menu->image))
                                    <div class="picture" style="background-image: url('{{ asset('public/uploads/menus/'. $menu->image->picture) }}')">
                                    </div>
                                    @endif
                                </td>
                                <td style="text-align: left; padding-left: 20px;">{{ $menu->translation->name }}</td>
                                <td>
                                    {{ implode(', ', $menu->language_codes->toArray()) }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $menu->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    {{-- @if ($menu->menu->count() == 0)
                                        <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $menu->id }})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    @endif --}}
                                </td>
                            </tr>
                            <?php $j = 1; ?>
                            @foreach($menu->Menu as $item)
                            <tr>
                                <td><?php echo $i . '.' . $j ?></td>
                                <td>
                                    @if (!empty($item->image))
                                    <div class="picture" style="background-image: url('{{ asset('public/uploads/menus/'. $item->image->picture) }}')">
                                    </div>
                                    @endif
                                </td>
                                <td style="text-align: left; padding-left: 20px;">- - - {{ $item->translation->name }}</td>
                                <td>{{ implode(', ',  $item->language_codes->toArray()) }}</td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" onclick="alertLang({{ $item->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $item->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                <?php $j++; ?>
                            </tr>
                            @endforeach
                            <?php $i++; ?>
                            @empty
                            <tr>
                                <td colspan="5">Không có dữ liệu</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <div class="text-center">
                {{ $menus->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.dashboard.menu.modal')
@endsection
@section('scripts')
<script>

</script>
<script src="{{ asset('/assets/backend/js/menu.js') }}">
</script>
@endsection