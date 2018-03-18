<nav class="navbar navbar-expand-lg navbar-dark bg-gradient">
  <div class="container">
    <a class="navbar-brand" href="#"><img src="{{ asset('/img/karyaku-white-full-200px.png') }}" alt="karyaku logo" height="30" class="img-responsive"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() == "home" ? 'active' : '' }}" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Route::currentRouteName() == "profile" ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
        </li>
        <li>
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        
      </ul>
    </div>
  </div>
</nav>