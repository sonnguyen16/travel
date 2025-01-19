<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="shortcut icon" type="image/jpg" href="/favicon.ico" />
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('assets/backend/themes/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/backend/themes/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('assets/backend/themes/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/assets/backend/themes/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('assets/backend/themes/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/themes/plugins/iCheck/square/blue.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/backend/themes/style_back.css') }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  
  <link rel="stylesheet" href="{{ asset('assets/backend/themes/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/backend/themes/plugins/iCheck/all.css') }}">
 
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .td-d {
        max-width: 150px;
        white-space: nowrap; 
        overflow: hidden; 
        text-overflow: ellipsis;
        cursor: pointer;
    }

    .table th, td{
        text-align: center;
        vertical-align: middle !important;
    }
    .table th {
        background-color: #3c8dbc ; 
        color: white;
    }

    .sidebar-menu .active > a {
        background-color: #3c8dbc !important;
        color: #ffffff !important;
        font-weight: bold;
    }
    .picture{
        height: 35px;
        background-size: contain;
        background-repeat: no-repeat;
        background-position: center;
        background-color: #f3f3f3
    }
    .form-group > input, select{
        height: 30px !important;
        border-radius: 3px !important;
        padding: 5px 10px !important;
    }
    .cke_dialog_ui_input_file{
        height: 150px !important;
    }

    .cke_dialog_ui_fileButton.cke_dialog_ui_button.cke_disabled{
        margin-top: 150px !important;
    }
    #lang_code{
        color: red;
    }
    .modal-content{
        border-radius: 10px !important;
    }
    @media (max-width: 768px) {
        .td-b {
            max-width: 150px;
            white-space: nowrap; 
            overflow: hidden; 
            text-overflow: ellipsis;
            cursor: pointer;
        }
    }
  </style>
  @yield('styles')
</head>
