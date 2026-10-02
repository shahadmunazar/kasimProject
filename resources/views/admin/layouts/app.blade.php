<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin Dashboard')</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('adminassets/assets/css/styles.min.css') }}" />
  @stack('styles')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    
    @include('admin.layouts.sidebar')

    <!--  Main wrapper -->
    <div class="body-wrapper">
      
      @include('admin.layouts.header')

      <div class="container-fluid">
        @yield('content')
        
        <div class="py-6 px-6 text-center">
          <p class="mb-0 fs-4">Design and Developed by <a href="#" class="pe-1 text-primary text-decoration-underline">Shahad</a></p>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('adminassets/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('adminassets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('adminassets/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('adminassets/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('adminassets/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('adminassets/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('adminassets/assets/js/dashboard.js') }}"></script>
  @stack('scripts')
</body>

</html>
