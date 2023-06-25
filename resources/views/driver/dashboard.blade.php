@extends('layouts.appAdmin')

@section('content')
<!-- /.col-md-6 -->
<div class="col-lg-12">
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <h5 class="mb-2">Mini Info</h5>
    <div class="card-body">
      <div class="row">
      <table class="table">
        <thead class="table-success">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Driver Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Bus Route</th>
                <th scope="col">Plate No</th>
                <th scope="col">Schedule</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($buses as $bus)
            @if ($bus->user->id === Auth::user()->id)
                <tr class="text-center">
                    <th scope="row">{{ $bus->id }}</th>
                    <td>{{ Auth::user()->name }}</td>
                    <td>{{ Auth::user()->phone }}</td>
                    <td>{{ $bus->route }}</td>
                    <td>{{ $bus->plate_no }}</td>
                    <td>{{ $bus->schedule }}</td>
                    <td>{{ $bus->status }}</td>
                    <td>
            
                      <a href="{{ route('driver.edit', $bus->id) }}" class="btn btn-warning">Update</a>
                  </td>@endif
                </tr>
            @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection