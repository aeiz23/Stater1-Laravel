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

<script src="{{ asset('ckeditor/assets/js/editor/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckeditor/assets/js/editor/ckeditor/adapters/jquery.js') }}"></script>
<script src="{{ asset('ckeditor/assets/js/editor/ckeditor/styles.js') }}"></script>
<script src="{{ asset('ckeditor/assets/js/editor/ckeditor/ckeditor.custom.js') }}"></script>
@endsection
@section('content')
<div class="container">
   
    <h1 class="text-center mt-5">Manage Bus</h1>
    {{-- <h5 class="text-center mt-5">Status of bus that is Full is not allowed to edit and delete.</h5> --}}
      
        <table class="table">
            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Driver Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Plate No.</th>
                                <th scope="col">Route</th>
                                <th scope="col">Schedule</th>
                                <th scope="col">Link</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buses as $bus)
                                <tr>
                                    <th scope="row">{{ $bus->id }}</th>
                                    <td>{{ $bus->user->name }}</td>
                                    <td>{{ $bus->user->phone }}</td>
                                    <td>{{ $bus->plate_no }}</td>
                                    <td>{{ $bus->route }}</td>
                                    <td>{{ $bus->schedule }}</td>
                                    <td>{{ $bus->link }}</td>
                                    <td>{{ $bus->status }}</td>
                                    <td>
                                        <a href="{{ route('bus.edit', $bus->id) }}" class="btn btn-warning">EDIT</a>
                                        <form action="{{ route('bus.destroy', $bus->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection