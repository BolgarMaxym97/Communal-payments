<?php
/** @var JsValidator $jsValidator */
?>
<!-- jQuery 3 -->
<script src="{{ asset('admin/bower_components/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/bootstrap-daterangepicker/moment.min.js') }}"></script>
<!-- ChartJS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js"></script>

<script src="{{ asset('admin/bower_components/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jQueryUI/jquery-ui.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('admin/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap  -->
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- SlimScroll -->
<script src="{{ asset('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- Nestable -->
<script src="{{ asset('admin/dev/jquery.nestable.min.js') }}"></script>

<script src="{{ asset('admin/plugins/iCheck/icheck.min.js') }}"></script>

<script src="{{ asset('admin/plugins/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('admin/plugins/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('admin/plugins/noty/noty.js') }}"></script>
<script src="{{ asset('admin/plugins/toastr/min.js') }}"></script>
<script src="{{ asset('admin/plugins/magnific/popup.js') }}"></script>
<script src="{{ asset('admin/dev/jquery.multi-select.js') }}"></script>
<script src="{{ asset('admin/dev/wajax.js') }}"></script>
<script src="{{ asset('admin/dev/custom.js') }}"></script>

@if(isset($jsValidator))
    <script type="text/javascript" src="{{ url('admin/plugins/validation/jsvalidation.js')}}"></script>
    {!! $jsValidator !!}
@endif
