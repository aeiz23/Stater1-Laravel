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
    <h1 class="text-center mt-5">Edit Status Bus</h1>
   
    <tr>
      <td align="center">
          <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
              <!-- Email Body -->
              @if(Session::has('type'))
              <div class="alert alert-{{ Session::get('type') }}" role="alert">
              <strong>{{ Session::get('title') }}</strong><br> {{ Session::get('message') }}
              </div>
              @endif
              <tr>
                  <td class="body" width="100%" cellpadding="0" cellspacing="0">
                      <table class="inner-body" align="center" width="80%" cellpadding="0" cellspacing="0" role="presentation">
                           <!-- Body content -->
                           <tr>
                              <td class="content-cell">
  
                             
                                  <form action="{{ route('driver.update', $bus->id) }}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <div class="form-group row">
                                        <label for="name" class="col-4 col-form-label">Driver Name</label> 
                                        <div class="col-8">
                                          {{-- <input id="name" name="name" type="text" class="form-control" value="{{ $bus->driver->user->name }}" readonly> --}}
                                          <input id="name" name="name" type="text" class="form-control" value="{{ $bus->user->name }}" readonly>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="phone" class="col-4 col-form-label">Phone Number</label> 
                                        <div class="col-8">
                                          {{-- <input id="phone" phone="phone" type="text" class="form-control" value="{{ $bus->driver->user->phone }}" readonly> --}}
                                          <input id="phone" name="phone" type="text" class="form-control" value="{{ $bus->user->phone }}" required= "required">
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="route" class="col-4 col-form-label">Bus Route</label> 
                                        <div class="col-8">
                                          <input id="route" name="route" type="text" class="form-control" value="{{ $bus->route }}" readonly>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="plate_no" class="col-4 col-form-label">Plate No.</label> 
                                        <div class="col-8">
                                          <input id="plate_no" name="plate_no" type="text" class="form-control" value="{{ $bus->plate_no }}" readonly>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="schedule" class="col-4 col-form-label">Schedule</label> 
                                        <div class="col-8">
                                          <input id="schedule" name="schedule" type="text" class="form-control" value="{{ $bus->schedule }}" readonly>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <label for="status" class="col-4 col-form-label">Status</label> 
                                        <div class="col-8">
                                          <select name="status" class="form-control" value="{{ $bus->status }}" required="required">
                                            <option value="Not full">Not Full</option>
                                            <option value="Full">Full</option>
                                        </select>
                                        </div>
                                      </div>
                                      <div class="form-group row">
                                        <div class="offset-4 col-8">
                                          <button name="submit" type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                      </div>
                                    </form>
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
          </table>
      </td>
    </tr>
  </table>
@endsection