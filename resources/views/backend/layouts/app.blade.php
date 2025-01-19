<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('backend.layouts.head')
<body class="hold-transition skin-blue fixed sidebar-mini">

    <div id="wrapper">
        <!-- Navigation -->
        
            
            @include('backend.layouts.header')

            @include('backend.layouts.sidebar')
            
       
         <!-- Page Content -->
         <div class="content-wrapper">
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <strong>Oops! There were some problems with your input.</strong>
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
           
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    @include('backend.layouts.footer')
</body>
</html>
