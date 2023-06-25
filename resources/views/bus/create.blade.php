
<!DOCTYPE html>
<html>
<head>
  <title>Add Driver Page</title>
</head>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
}

/* Container styles */
.card {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.button-container {
      margin-bottom: 20px;
      text-align: right;
    }
    
    .button-container a {
      background-color: #ec0d0d;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
      margin-right: 10px;
    }
    
    .button-container a:hover {
      background-color: #f39e00;
    }
/* Heading styles */
h5 {
  text-align: center;
  margin-bottom: 20px;
}

/* Form styles */
form {
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 8px;
}

input[type="text"],
select {
  width: 100%;
  padding: 10px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type="submit"] {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #bbd20c;
}

/* Error message styles */
.error-message {
  color: red;
  margin-bottom: 8px;
}


  </style>

<body>
<div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h5 class="m-0">Add Driver with Bus Form</h5>
        <div class="button-container">
          <a href="{{ route('admin.dashboard') }}" >Back</a>
        </div>
    </div>
     
      <div class="card-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form action="{{ route ('bus.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="name">Driver Name *</label> 
                  <select name="name" id="name">
                      @foreach ($users as $user)
                          @if ($user->role === 'driver')
                              <option value="{{ $user->name }}">{{ $user->name }}</option>
                          @endif
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                  <label for="phone">Driver Phone Number *</label> 
                  <select name="phone" id="phone">
                    {{-- @foreach ($user as $users)
                      <option value="{{ $user->phone }}" data-name="{{ $user->name }}">{{ $user->phone }}</option>
                    @endforeach --}}
                  </select>
              </div>
                <script>
                  // Get the driver name select element
                  const nameSelect = document.getElementById('name');
                    const phoneSelect = document.getElementById('phone');
                    
                    // Convert the $users data to a JavaScript object
                    const usersData = @json($users->where('role', 'driver')->keyBy('name'));

                    nameSelect.addEventListener('change', function() {
                        // Clear previous phone options
                        phoneSelect.innerHTML = '';

                        // Get the selected driver's name
                        const selectedName = nameSelect.value;

                        // Find the corresponding phone number
                        const selectedPhone = usersData[selectedName].phone;

                        // Create a new option with the selected phone number
                        const option = document.createElement('option');
                        option.value = selectedPhone;
                        option.text = selectedPhone;
                        phoneSelect.appendChild(option);
                    });
                    </script>
                 <div class="form-group">
                  <label for="plate_no">Plate No:</label>
                  <input id="plate_no" name="plate_no" type="text" class="form-control" required="required" aria-describedby="plate_noHelpBlock" value="{{ old('plate_no') }}"> 
                @error('plate_no')
                  <span id="plate_noHelpBlock" class="form-text text-danger">{{ $message }}</span>
                @enderror
                  </select>
                </div>
                <div class="form-group">
                    <label for="route">Bus Route:</label>
                    <input id="route" name="route" type="text" class="form-control" required="required" aria-describedby="routeHelpBlock" value="{{ old('route') }}"> 
                  @error('route')
                    <span id="routeHelpBlock" class="form-text text-danger">{{ $message }}</span>
                  @enderror
                    </select>
                  </div>
                <div class="form-group">
                  <label for="schedule">Schedule:</label>
                  <input id="schedule" name="schedule" type="time" class="form-control" required="required" aria-describedby="scheduleHelpBlock" value="{{ old('schedule') }}"> 
                  @error('schedule')
                    <span id="scheduleHelpBlock" class="form-text text-danger">{{ $message }}</span>
                  @enderror
                  </select>
                </div>
                <div class="form-group">
                    <label for="link">Link *</label> 
                    <input id="link" name="link" type="text" class="form-control" required="required" aria-describedby="linkHelpBlock" value="{{ old('link') }}"> 
                    @error('link')
                      <span id="linkHelpBlock" class="form-text text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="Not full">Not Full</option>
                        <!--<option value="Full">Full</option>-->
                    </select>
                  </div>
                <div class="form-group">
                  <button name="submit" type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </form>
      </div>
    </div>
</div>

<!-- /.col-md-6 -->
</body>
</html>