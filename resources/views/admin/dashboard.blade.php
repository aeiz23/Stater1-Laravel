@extends('layouts.appAdmin')

@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('dash-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dash-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dash-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
@endsection

@section('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('dash-template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('dash-template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('dash-template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<!-- Page specific script -->
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": false, 
        "lengthChange": false, 
        "autoWidth": false,
        "lengthChange": true,
        "buttons": ["csv", "excel", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": false,
      });
    });
</script>
@endsection

@section('content')
<!-- /.col-md-6 -->
<div class="col-lg-12">
    <h5 class="mb-2">Mini Info</h5>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fa fa-bus" aria-hidden="true"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL BUS</span>
              <span class="info-box-number">{{ $totalBus ?? 0 }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-md-4 col-sm-4 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="fa fa-user-circle" aria-hidden="true"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL Driver</span>
              <span class="info-box-number">{{ $totalDriver ?? 0 }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-4 col-12">
          <div class="info-box">
            <span class="info-box-icon bg-success"><i class="fa fa-comment" aria-hidden="true"></i>
            </span>

            <div class="info-box-content">
              <span class="info-box-text">TOTAL Report</span>
              <span class="info-box-number">{{ $totalReport ?? 0 }}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
    
    </div>
</div>

<!-- /.col-md-6 -->
@endsection