 <header class="main-header">
    <a href="{{ route('backend.dashboard.home.index') }}" class="logo">
      <span class="logo-mini"><b>A</b>LT</span>
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <nav class="navbar navbar-static-top">
      <div style="display: flex; justify-content: space-between">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <h4 style="display: inline; margin-left: 15px; vertical-align: middle; margin-top: 50%; color: white;">
            {{ $title ?? 'Tiêu đề' }}
          </h4>
        </a>
        {{-- <div class="form-group form-group-sm" style="margin-top: 15px; margin-right: 10px;">
          <select name="lang" id="lang">
            <option value="1">VI</option>
          </select>
        </div> --}}
      </div>
	</nav>
  </header>