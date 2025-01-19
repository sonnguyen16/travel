@extends('backend.layouts.app')
@section ('content')

<form action="{{ route('backend.dashboard.user.store', ['id' => $user->id ?? '']) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Name <span style="color: red">*</span></label>
                    <input name="name" type="text" class="form-control" placeholder="Name..." value="{{ old('name', $user->name ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label>Phone <span style="color: red">*</span></label>
                    <input name="phone" type="tel" class="form-control" placeholder="Phone..." value="{{ old('phone', $user->phone ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label>Email <span style="color: red">*</span></label>
                    <input name="email" type="email" value="{{ old('email', $user->email ?? '') }}" class="form-control" placeholder="Email..." required>
                </div>
                <div class="form-group">
                    <label>Birthday <span style="color: red">*</span></label>
                    <input name="birthday" type="date" class="form-control" value="{{ old('birthday', $user->birthday ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label>Sex <span style="color: red">*</span></label>
                    <select name="sex" class="form-control">
                        <option value="1" {{ old('sex', $user->sex ?? '') == 1 ? 'selected' : '' }}>Male</option>
                        <option value="0" {{ old('sex', $user->sex ?? '') == 0 ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="picture" class="form-control">
                </div>
                @if(isset($user) && $user->image)
                    <img src="{{ asset('public/uploads/users/' . $user->image->picture) }}" alt="Profile Picture" style="width: 100px; margin-bottom: 15px;">
                @endif
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>User name <span style="color: red">*</span></label>
                    <input name="user_name" value="{{ old('user_name', $user->user_name ?? '' )}}" type="text" class="form-control" placeholder="Enter username..." required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" class="form-control" placeholder="New Password...">
                </div>
                <div class="form-group">
                    <label>Retype Password</label>
                    <input name="password_confirmation" type="password" class="form-control" placeholder="Retype New Password...">
                </div>
                @if ((!isset($user) && Auth::user()->super_user == 1) || (isset($user) && $title != 'Sửa Profile'))
                    <div class="form-group">
                        <label style="margin-top: 25px">
                            <input name="super_user" type="checkbox" class="flat-red" {{ old('super_user', $user->super_user ?? '') == 1 ? 'checked' : '' }}> Super Admin
                        </label>
                    </div>
                @else
                    <input type="text" name="super_user" value="{{ old('super_user', $user->super_user ?? '') }}" hidden> 
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">
                @if ($title != 'Sửa Profile')
                <a href="{{ route('backend.dashboard.user.index') }}" class="btn btn-danger me-2">Quay lại</a>
                @endif
                <button type="submit" class="btn btn-success">Lưu thông tin</button>
            </div>
        </div>
    </div>
</form>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('/assets/backend/themes/plugins/iCheck/all.css') }}">
@endsection

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('input[type="checkbox"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    })
</script>
<script src="{{ asset('/assets/backend/themes/plugins/iCheck/icheck.min.js') }}"></script>
@endsection
