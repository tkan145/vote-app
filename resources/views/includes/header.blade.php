<nav class="navbar navbar-expand-lg navbar-light bg-white flex-row flex-md-row shadow bd-navbar">
  @guest
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/') }}" aria-label="PY">Vote System</a>
  @else
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{ url('/admin') }}" aria-label="PY">Vote System</a>
  @endguest
  <ul class="navbar-nav flex-row ml-md-auto d-md-flex d-none">
    <!-- Authentication Links -->
    @guest

      <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
      <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
      
    @else

      <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img alt"Account photo" class="circle" src="/images/faceholder.svg" style="height:32px width:32px" />
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

        <div class="account-summary">
          <img alt"Account photo" class="circle" src="/images/faceholder.svg" style="height:32px width:32px" />
          <span class="caret ml-2"></span>{{ Auth::user()->name }}
        </div>
        <div class="dropdown-divider c-blue"></div>
          <a class="dropdown-item" href="{{ route('other.about')}}">  {{ __('About') }}</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Sign out') }}
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </div>
      </li>

    @endguest
    
  </ul>
</nav>
