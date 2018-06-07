<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('includes.head')
</head>
<body>
  <header>
    @include('includes.header')
  </header>
  <div class="container-fluid position-ref full-height">
    <div class="row flex-xl-nowrap">
      <nav class="col-sm-3 col-md-3 col-xl-2  d-md-block bg-white sidebar full-height">
        @include('includes.sidebar')
      </nav>
      <main role="main" class="col-sm-9 col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content" role="main">
        @yield('content')
      </main>
    </div>
  </div>

  @include('includes.scripts')

  <footer class="footer">
    @include('includes.footer')
  </footer>
    
</body>