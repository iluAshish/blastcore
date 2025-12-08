<main class="main--container">
      @yield('content')
    <footer class="main--footer main--footer-light">
      <p>Copyright &copy; <a href="{{ url('/') }}">{{ config('app.name') }}</a>. All Rights Reserved.</p>
    </footer>
  </main>
  </div>
  <script src="{{asset('app/js/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('app/js/raphael.min.js')}}"></script>
  <script src="{{asset('app/select2/js/select2.full.min.js')}}"></script>
  <script src="{{asset('app/js/jquery.validate.min.js')}}"></script>
  <script src="{{asset('app/js/bootstrap-notify.js')}}"></script>
  <script src="{{asset('app/js/bootstrap-notify.min.js')}}"></script>
  <script src="{{asset('app/js/sweetalert.min.js')}}"></script>
  <script src="{{asset('app/js/sweetalert-init.js')}}"></script>
  <script src="{{asset('app/js/bootstrap-switch.js')}}"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.fileinput-remove').html('Reset');
      <?php if (Session::has('message')) { ?>
              $.notify({
                icon: "fa fa-check",
                message: "{{ Session::get('message') }}"

              },{
                type: "success"
              });
      <?php }?>
    });
  </script>
  </body>
</html>
