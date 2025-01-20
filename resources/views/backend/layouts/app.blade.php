<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('backend.layouts.head')
<body class="hold-transition skin-blue fixed sidebar-mini">
    <div id="wrapper">
        @include('backend.layouts.header')
        @include('backend.layouts.sidebar')
        <div class="content-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert" style="min-width: 270px;">
                    <button type="button" class="close" data-dismiss="alert" style="color: white; opacity: .8;">&times;</button>
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')  
            @include('backend.layouts.modal')
        </div>
    </div>
    @include('backend.layouts.footer')
</body>
</html>
