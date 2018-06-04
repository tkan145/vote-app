<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('includes.head')
</head>
<body>
    <header>
    @include('includes.header')
  </header>
  <div class="container position-ref full-height mt-5">
    <main>
      @yield('content')
    </main>
  </div>

  @include('includes.scripts')

  <footer class="footer">
    @include('includes.footer')
  </footer>
    
</body>