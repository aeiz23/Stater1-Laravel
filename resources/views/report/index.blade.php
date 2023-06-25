@extends('layouts.appAdmin')
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('dash-template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dash-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dash-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
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
<main role="main" class="container">
    <h1 class="text-center mt-5">Report</h1>
    <div class="button-container">
      <a href="{{ route('admin.generatePdf') }}" class="btn btn-danger">Generate PDF</a>
    </div>
    <br>
    <table class="table">
        <thead class="table-danger">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Student Name</th>
                <th scope="col">Student Matric No.</th>
                <th scope="col">Report</th>
                <th scope="col">Schedule</th>
                <th scope="col">Plate No.</th>
               <th scope ="col">Date Created</th>
            </tr>
        </thead>
        <tbody>
             @foreach ($reports as $report)
             <tr>
            <th scope="row">{{ $report->id}}</th>
              <td>{{ $report->student->name }}</td>
              <td>{{ $report->student->matric_no }}</td>
              <td>{{ $report->desc }}</td>
              <td>{{ $report->bus->schedule }}</td>
              <td>{{ $report->bus->plate_no }}</td>
              <td>{{ $report->created_at }}</td>
            </tr>
      @endforeach
          </tbody>
    </table>
</main>
@endsection