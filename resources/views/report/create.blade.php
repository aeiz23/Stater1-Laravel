
<!DOCTYPE html>
<html>
<head>
  <title>Report Page</title>
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
        <h5 class="m-0">Add Report Form</h5>
        <div class="button-container">
          <a href="{{ route('main') }}" >Back</a>
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
            <form action="{{ route('report.store') }}" method="POST">
                @csrf
                <h5 class="m-0">The name will not released to anyone.</h5>
                <div class="form-group">
                  <label for="name">Student Name *</label> 
                  <input id="name" name="name" type="text" class="form-control" required="required" aria-describedby="nameHelpBlock" value="{{ old('name') }}"> 
                  @error('name')
                    <span id="nameHelpBlock" class="form-text text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="matric_no">Student Matric No *</label> 
                  <input id="matric_no" name="matric_no" type="text" class="form-control" required="required" aria-describedby="matric_noHelpBlock" value="{{ old('matric_no') }}"> 
                  @error('matric_no')
                    <span id="matric_noHelpBlock" class="form-text text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="desc">Report Description *</label> 
                  <textarea id="desc" name="desc" cols="40" rows="5" class="form-control" required="required" aria-describedby="descHelpBlock" value="{{ old('desc') }}"></textarea>
                    @error('desc')
                        <span id="descHelpBlock" class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="plate_no">Plate Number:</label>
                  <select name="plate_no" id="plate_no">
                    @foreach ($buses as $bus)
                      <option value="{{ $bus->plate_no }}">{{ $bus->plate_no }}</option>
                    @endforeach
                  </select>
                </div>
                
                <div class="form-group">
                  <label for="schedule">Schedule: </label>
                  <h6>This will be fill in automatically based on the plate no. selected</h6>
                  <select name="schedule" id="schedule">
                    @foreach ($buses as $bus)
                      <option value="{{ $bus->schedule }}" data-plate="{{ $bus->plate_no }}">{{ $bus->schedule }}</option>
                    @endforeach
                  </select>
                </div>
                <script>
                  // Retrieve the select elements
                  const plateNoSelect = document.getElementById('plate_no');
                  const scheduleSelect = document.getElementById('schedule');
                
                  // Add event listener to plate number select
                  plateNoSelect.addEventListener('change', function() {
                    // Get the selected plate number
                    const selectedPlate = plateNoSelect.value;
                
                    // Find the corresponding schedule option
                    const scheduleOption = Array.from(scheduleSelect.options).find(option => option.dataset.plate === selectedPlate);
                
                    // Set the selected schedule based on the plate number
                    if (scheduleOption) {
                      scheduleOption.selected = true;
                    }
                  });
                </script>
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