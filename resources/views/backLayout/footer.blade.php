<!-- footer content -->
        <footer>
          <div class="text-center">

              © 2018. HRMS App
              by <a href="#">Subhash GC</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ URL::asset('/backend/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ URL::asset('/backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('/backend/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ URL::asset('/backend/vendors/nprogress/nprogress.js') }}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ URL::asset('/backend/build/js/custom.min.js ') }}"></script>
    <!-- datatables -->
    <script src="{{ URL::asset('/backend/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('/backend/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>

<script src="{{asset('assets/lib/tinymce/tinymce.min.js')}}"></script>
<script src="{{asset('assets/lib/tinymce/tinymce-init.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/plugins/notifications/sweet_alert.min.js')}}"></script>


    <script type="text/javascript">
      $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    </script>



<script src="{{asset('assets/lib/fancybox/source/jquery.fancybox.js')}}"></script>

<script type="text/javascript" src="{{asset('assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
<script src="{{asset('assets/check-all/js/jquery-check-all.js')}}"></script>
<!-- /theme JS files -->
<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
<!--custom admin js -->
<!-- /footer -->







    @yield('scripts')
  </body>
</html>