<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  @include('includes.head')
</head>
<body>
    <header>
    @include('includes.header')
  </header>

  <main id="content" class="bd-masthead" role="main">
      @yield('content')
  </main>


  @include('includes.scripts')

  <footer class="footer">
    @include('includes.footer')
  </footer>

</body>