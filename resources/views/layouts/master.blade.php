<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Hatoy Sukabumi</title>
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" href="{{ asset('/css/dropify.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.fancybox.min.css') }}">

    <script type="text/javascript" src="{{asset('/chartjs/Chart.js')}}"></script>

        @include('layouts.head')
  </head>
<body>
          <!-- Begin page -->
          <div id="wrapper">
      @include('layouts.topbar')
      @include('layouts.sidebar')
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
      @yield('content')
                </div> <!-- content -->
    @include('layouts.footer')    
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    @include('layouts.footer-script') 
    @yield('script-bottom')    
    @yield('script') 
 </body>
    
</html>