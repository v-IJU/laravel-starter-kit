
<nav class="main-header navbar navbar-expand navbar-white navbar-light">


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!---location find--->

      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-location"  role="button" id="logged_user_location" target="_blank">
          <i class="fas fa-map-marker"></i> 
          
        </a>
      </li>
      {{-- //go to website --}}
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-website"  role="button" id="website" target="_blank" href="{{url('/')}}">
          <i class="fas fa-globe"></i> 
          Website
        </a>
      </li>

      <!-- Messages Dropdown Menu -->

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        @foreach (Config::get('languages') as $lang => $language)
            @if ($lang != App::getLocale())
                    <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
            @endif
        @endforeach
        </div>
    </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">{{count(Auth::user()->unreadNotifications)}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">{{count(Auth::user()->unreadNotifications)}} Notifications</span>
          <div class="dropdown-divider"></div>
          @forelse (Auth::user()->unreadNotifications  as $notification) 
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> {{$notification->data['message']}}
            <span class="float-right text-muted text-sm">{{ \Carbon\Carbon::parse($notification->created_at )->diffForHumans() }}</span>
          </a>

          @if($loop->last)
          <a href="{{route('readnotification')}}" class="dropdown-item dropdown-footer">Mark all Us read</a>
          @endif
          @empty
          <a href="#" class="dropdown-item dropdown-footer">No Notifications</a>
          @endforelse
         

          
        </div>
      </li>
<!-- User  -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user">{{Auth::user()->name}}</i>

        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          
          <div class="dropdown-divider"></div>
          
          <a href="{{ route('user.index') }}" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Profile

          </a>
          <div class="dropdown-divider"></div>
          <form method="POST" action="{{ route('administrator.logout') }}">
            @csrf
          <a href="{{ route('administrator.logout') }}" class="dropdown-item"
          onclick="event.preventDefault();this.closest('form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout

          </a>
          </form>
         
        </div>
        
      </li>


    </ul>
  </nav>
