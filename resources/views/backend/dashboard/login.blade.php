<html lang="{{ app()->getLocale() }}">
    @include('backend.layouts.head')
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ route('backend.dashboard.home.index') }}"><b>Admin</b></a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('backend.dashboard.login.check') }}" method="post">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <div class="form-group has-feedback">
                        <input name="user_name" type="text" class="form-control" placeholder="User name">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="password" type="password" class="form-control" placeholder="Password">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-xs-4">
                        </div>
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <div class="col-xs-4">
                        </div>
                    </div>
                    @error('message')
                        <div class="text-center">
                            <span class="text-danger">{{ $message }}</span>
                        </div>
                    @enderror
                </form>
            </div>
        </div>
        <!-- jQuery 3 -->
        <script src="{{ asset('assets/backend/themes/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{ asset('assets/backend/themes/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset('assets/backend/themes/plugins/iCheck/icheck.min.js') }}"></script>
        <script>
            $(function () {
            
              $('input').iCheck({
            
                checkboxClass: 'icheckbox_square-blue',
            
                radioClass: 'iradio_square-blue',
            
                increaseArea: '20%' /* optional */
            
              });
            
            });
            
        </script>
    </body>
</html>