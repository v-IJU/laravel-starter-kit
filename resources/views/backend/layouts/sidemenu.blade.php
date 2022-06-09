<?php

if(request()->route() == Null){
$route='';
$prefix='';
}
else{
$route=Route::current()->getName();
$prefix=Request::route()->getPrefix();
}
//dd($prefix);
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!-- <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('administrator.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard

              </p>
            </a>
          </li>
          <li class="nav-header">USERS</li>
          <li class="nav-item">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              @can('user.index')

              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>user List</p>
                </a>
              </li>
              @endcan

              @can('user.create')
              <li class="nav-item">
                <a href="{{route('user.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Add</p>
                </a>
              </li>
              @endcan


            </ul>
          </li>
      <li class="nav-header">WEBSITE USERS</li>

      <li class="nav-item {{($prefix=='/siteuser')?' menu-is-opening menu-open':''}} ">

            <a href="#" class="nav-link {{($prefix=='/siteuser')?'active':''}} ">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Siteusers
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview ">
              @can('siteuser.index')

              <li class="nav-item" >
                <a href="{{route('siteuser.index')}}" class="nav-link  {{($route=='siteuser.index')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              @endcan

              @can('siteuser.create')
              <li class="nav-item">
                <a href="{{route('siteuser.create')}}" class="nav-link {{($route=='siteuser.create')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
              @endcan


            </ul>
          </li>
          @role('admin')
           <li class="nav-header">ROLES & PERMISSIONS</li>

      <li class="nav-item">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tasks"></i>
              <p>
                Roles
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
             

              <li class="nav-item">
                <a href="{{route('role.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{route('role.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            


            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('permission.index')}}" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Permission

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('mailconfig.view')}}" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Mail Configuration

              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('lfm.view')}}" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                LFM/Summernote

              </p>
            </a>
          </li>
@endrole
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
