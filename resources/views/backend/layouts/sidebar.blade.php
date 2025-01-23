<aside class="main-sidebar">
   <section class="sidebar">
       {{-- @if(Auth::check())
       <div class="user-panel">
           <div class="pull-left image">
            <img src="{{ asset('public/uploads/users/' . (Auth::user()->image?->picture ?? 'admin.png')) }}" class="img-circle" alt="User Image">
        </div>
           <div class="pull-left info">
               <p>{{ Auth::user()->user_name }}</p>
               <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
           </div>
       </div>
       @endif --}}
       <ul class="sidebar-menu" data-widget="tree">
           <li class="header">MAIN NAVIGATION</li>
           <li class="{{ Route::is('backend.dashboard.home.index') ? 'active' : '' }}">
               <a href="{{ route('backend.dashboard.home.index') }}">
                   <i class="fa fa-dashboard"></i> <span>Dashboard</span>
               </a>
           </li>
           <li class="{{ Route::is('backend.dashboard.order.index') ? 'active' : '' }}">
                <a href="{{ route('backend.dashboard.order.index') }}">
                    <i class="fa fa-shopping-cart"></i> <span>Đơn vé</span>
                </a>
            </li>
           <li class="{{ Route::is('backend.dashboard.product.index') ? 'active' : '' }}">
               <a href="{{ route('backend.dashboard.product.index') }}">
                   <i class="fa fa-ticket"></i> <span>Vé</span>
               </a>
           </li>
           
           <li class="{{ Route::is('backend.dashboard.blog.index') ||
                        Route::is('backend.dashboard.activity.index') ? 'active' : '' }}">
               <a href="{{ route('backend.dashboard.blog.index') }}">
                   <i class="fa fa-newspaper-o"></i> <span>Bài viết</span>
               </a>
           </li>
           <li class="{{ Route::is('backend.dashboard.recruitment.index') ? 'active' : '' }}">
               <a href="{{ route('backend.dashboard.recruitment.index') }}">
                   <i class="fa fa-newspaper-o"></i> <span>Tuyển dụng</span>
               </a>
           </li>
           
           <li class="{{ Route::is('backend.dashboard.pages.index') ? 'active' : '' }}">
               <a href="{{ route('backend.dashboard.pages.index') }}">
                   <i class="fa fa-newspaper-o"></i> <span>Trang</span>
               </a>
           </li>
           <li class="{{ Route::is('backend.dashboard.banner.index') ? 'active' : '' }}">
                <a href="{{ route('backend.dashboard.banner.index') }}">
                    <i class="fa fa-picture-o"></i> <span>Banner</span>
                </a>
            </li>
           <li class="{{ Route::is('backend.dashboard.menu.index') ? 'active' : '' }}">
                <a href="{{ route('backend.dashboard.menu.index') }}">
                    <i class="fa fa-bars"></i> <span>Danh mục</span>
                </a>
            </li>
            <li class="{{ Route::is('backend.dashboard.location.index') ? 'active' : '' }}">
                <a href="{{ route('backend.dashboard.location.index') }}">
                    <i class="fa fa-map-marker"></i> <span>Địa điểm</span>
                </a>
            </li>
           <li class="{{ Route::is('backend.dashboard.language.index') ? 'active' : '' }}">
               <a href="{{ route('backend.dashboard.language.index') }}">
                   <i class="fa fa-language"></i> <span>Ngôn ngữ</span>
               </a>
           </li>
           <li class="{{ Route::is('backend.dashboard.user.index') ? 'active' : '' }}">
               <a href="{{ route('backend.dashboard.user.index') }}">
                  <i class="fa fa-user"></i> <span>Users</span>
               </a>
            </li>
            <li>
                <a data-toggle="modal" data-target="#profileModal" onclick="getProfile({{ Auth::user()->id }})" style="cursor: pointer;">
                   <i class="fa fa-user-circle-o"></i> <span>Profile</span>
                </a>
             </li>
           <li>
               <a href="{{ route('backend.dashboard.logout') }}">
                   <i class="fa fa-sign-out"></i> <span>Đăng xuất</span>
               </a>
           </li>
       </ul>
   </section>
</aside>
