<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Hatoy Sukabumi</title>
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
        <script src="{{ url('https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js') }}"></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
        <link href="{{ url('https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css') }}" rel="stylesheet" />
        <link
rel="stylesheet"
href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css"
type="text/css"
/>
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
    @yield('map')  
    @yield('script') 
 </body>
    
</html>