<!DOCTYPE html>
<html>
<head>
  <title>Bus Tracking Website</title>
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

<script src="{{ asset('ckeditor/assets/js/editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ asset('ckeditor/assets/js/editor/ckeditor/styles.js') }}"></script>
<script src="{{ asset('ckeditor/assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>
@endsection
<style>
    /* CSS styles for the homepage */
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      text-align: center;
    }
    
    .header {
      background-color: #57eca4;
      color: #080000;
      padding: 20px;
    }
    
    .header h1 {
      margin: 0;
      padding: 0;
    }
    
    .content {
      background-color: #fff;
      color: #333;
      padding: 20px;
    }
    
    .image-container {
      display: flex;
      justify-content: center;
      margin-bottom: 20px;
    }
    
    .image-container img {
      max-width: 100%;
      height: auto;
    }

    .button-container {
      margin-bottom: 20px;
      text-align: right;
    }
    
    .button-container a {
      background-color: #07f813;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
      margin-right: 10px;
    }
    
    .button-container a:hover {
      background-color: #f59dd9;
    }
    .button-container2 {
      margin-bottom: 20px;
      text-align: right;
    }
    
    .button-container2 a {
      background-color: #f8071b;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
      margin-right: 10px;
      float:left;
    }
    
    .button-container2 a:hover {
      background-color: #ffd500;
    }
    .table {
        border-collapse: collapse;
        width: 100%;
    }
    .th,.td{
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .th{
        background-color: #f2f2f2;
    }
    .footer {
      background-color: #e9b046;
      color: #070000;
      padding: 20px;
    }
  </style>
</head>
<body>
    <div class="container">
        <div class="header">
          <h1>Bus Route</h1>
        </div>
        <div class="content">
            <div class="button-container2">
                <a href="{{ route('main') }}" >Back</a>
              </div>
    {{-- <h5 class="text-center mt-5">Status of bus that is Full is not allowed to edit and delete.</h5> --}}
    <table class="table">
      <thead class="thead-dark">
           
                            <tr>
                                <th scope="col">Driver Name</th>
                                  <th scope="col">Plate No.</th>
                                  <th scope="col">Route</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $bus->user->name }}</td>
                                <td>{{ $bus->plate_no }}</td>
                                <td>{{ $bus->route }}</td>
                                <td>{{ $bus->schedule }}</td> 
                                <td>{{ $bus->status }}</td>
                               <td> <div class="button-container">
                                <br>
                                <a href="{{ $bus->link }}" class="btn btn-primary">Map</a>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>
               </div>
</div>
{{-- <div class="footer">
    <p>&copy; 2023 UPSI MES3073 Group 1. All rights reserved.</p>
  </div> --}}
</body>
</html>