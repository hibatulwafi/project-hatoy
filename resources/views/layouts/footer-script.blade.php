        <!-- jQuery  -->
        <script src="{{ URL::asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ URL::asset('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ URL::asset('assets/js/waves.min.js')}}"></script>
        <script src="{{ asset('/js/toastr.min.js') }}"></script>
        <script src="{{ URL::asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        @yield('script')

        <!-- App js -->
        <script src="{{ URL::asset('assets/js/app.js')}}"></script>
           
        @if (session()->has('success'))
        <script>
            $(document).ready(function() {
                toastr["success"]('{{ session()->get('success') }}')

            });
        </script>
        @endif

        @if(session()->has('error'))
        <script>
            $(document).ready(function () {
                toastr["info"]('{{ session()->get('error') }}')
            });

        </script>
        @endif

        @yield('script-bottom')