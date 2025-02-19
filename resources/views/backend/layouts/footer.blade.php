
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
      extraPlugins: 'image2',
      removePlugins: 'image',
      height: 100,
      filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
      filebrowserUploadMethod: 'form',
      
      // filebrowserBrowseUrl: "{{ url('laravel-filemanager') }}?type=Files",
      // filebrowserImageBrowseUrl: "{{ url('laravel-filemanager') }}?type=Images",
      // filebrowserUploadUrl: "{{ url('laravel-filemanager/upload') }}?type=Files&_token={{ csrf_token() }}",
      // filebrowserImageUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}"
  };

  // CKEDITOR.on('instanceReady', function (event) {
  //     var editor = event.editor;

  //     editor.on('focus', function () {
  //         $('.modal-open .modal').css('overflow', 'visible'); // Tắt cuộn khi focus vào CKEditor
  //     });

  //     editor.on('blur', function () {
  //         $('.modal-open .modal').css('overflow-y', 'auto'); // Bật cuộn khi blur khỏi CKEditor
  //     });
  // });

  $(document).on('click', '.cke_toolbar', function () {
      $('.modal-open .modal').css('overflow', 'visible'); // Tắt cuộn khi click vào toolbar
  });

  $(document).on('click', function (e) {
      if (!$(e.target).closest('.cke').length) {
          $('.modal-open .modal').css('overflow-y', 'auto'); // Bật lại cuộn nếu click ra ngoài CKEditor
      }
  });
</script>
@yield('scripts')