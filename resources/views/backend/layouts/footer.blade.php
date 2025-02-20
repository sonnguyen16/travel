
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.4.0
  </div>
  <strong>Copyright &copy; 2025 <a>travel.vn</a>.</strong> All rights reserved.
</footer>

<script src="{{ asset('assets/backend/themes/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('assets/backend/themes/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/backend/themes/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('assets/backend/themes/bower_components/fastclick/lib/fastclick.js') }}"></script>
<script src="{{ asset('assets/backend/themes/dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('assets/backend/themes/dist/js/demo.js') }}"></script>

<script src="{{ asset('/assets/backend/themes/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/assets/backend/themes/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('/assets/backend/themes/plugins/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('/assets/backend/themes/bower_components/ckeditor/ckeditor.js') }}"></script>

<script src="{{ asset('/assets/backend/js/script.js') }}"></script>
<script>
  
  var ckConfig = {
    extraPlugins: 'image2,justify,colorbutton,colordialog,emoji,indent',
    removePlugins: 'image',
    height: 100,
    filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
    filebrowserUploadMethod: 'form',
  };

  function toggleModalOverflow() {
    let ckeditorBg = $('.cke_dialog_background_cover');

    if (ckeditorBg.length > 0 && ckeditorBg.css('display') !== 'none') {
        $('.modal-open .modal').css('overflow', 'visible');
    } else {
        $('.modal-open .modal').css('overflow-y', 'auto');
    }
  }

  setInterval(toggleModalOverflow, 500);


</script>
@yield('scripts')