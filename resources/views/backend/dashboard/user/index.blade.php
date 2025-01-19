@extends('backend.layouts.app')
@section('content')
<section class="content-header">
    <div style="display: flex; justify-content: space-between;">
        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#userModal">
            Thêm mới
        </a>
        <form method="GET" action="{{ route('backend.dashboard.user.index') }}" class="form-inline" id="search-form">
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
                                <th>User Name</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th style="width: 100px;">Super user</th>
                                @if (Auth::user()->super_user == 1)
                                <th style="width: 100px;">Thực hiện</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = ($users->currentPage() - 1) * $users->perPage() + 1; ?>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <div class="picture" style="background-image: url('{{ asset('public/uploads/users/'. ($user->image->picture ?? 'admin.png')) }}')">
                                    </div>
                                </td>
                                <td>{{ $user->user_name }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                @if ($user->super_user == 1)
                                    <td><span class="label label-success">Super User</span></td>
                                @else
                                    <td><span class="label label-warning">Normal User</span></td>
                                @endif
                            
                                @if (Auth::user()->super_user == 1)
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#userModal" onclick="getUser({{ $user->id }})">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="alertDelete({{ $user->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                                @endif
                            </tr>
                            @empty
                                <tr>
                                    @if (Auth::user()->super_user == 1)
                                    <td colspan="7" class="text-center">Không có user nào</td>
                                    @else
                                    <td colspan="6" class="text-center">Không có user nào</td>
                                    @endif
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="text-center">
                {{ $users->appends(request()->except('page'))->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</section>
@include('backend.dashboard.user.modal')
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('/assets/backend/themes/plugins/iCheck/all.css') }}">
@endsection
@section('scripts')
<script src="{{ asset('/assets/backend/themes/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('/assets/backend/js/user.js') }}"></script>
@endsection