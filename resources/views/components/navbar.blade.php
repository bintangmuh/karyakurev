<nav class="navbar navbar-expand-lg navbar-dark bg-gradient">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="{{ asset('/img/karyaku-white-full-200px.png') }}" alt="karyaku logo" height="30" class="img-responsive"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @if (Auth::check())
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == "home" ? 'active' : '' }}" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::currentRouteName() == "profile" ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
          </li>
        </ul>
      @endif
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() == "explore" ? 'active' : '' }}" href="{{ route('explore') }}">Jelajah</a>
        </li>
        @if (Auth::check())
          <li class="nav-item dropdown" style="color: black">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-gear"></i> Setting
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('/profile/edit') }}">Edit Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                  Logout
                </a>

              </div>
              
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @endif
      </ul>
    </div>
  </div>
</nav>