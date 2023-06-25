<!DOCTYPE html>
<html>
<head>
  <title>Bus Tracking Website</title>
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
      background-color: #f2b8b8;
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
      background-color: #0d39ec;
      color: #fff;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 3px;
      margin-right: 10px;
    }
    
    .button-container a:hover {
      background-color: #d8e217;
    }

    .dropdown {
        display: inline-block;
    }
    
    /* CSS styles for the dropdown button */
    .dropbtn {
      background-color: #135ee0;
      color: #fff;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      border-radius: 3px;
    }
    
    .dropbtn:hover {
      background-color: #d32f2f;
    }
    
    /* CSS styles for the dropdown content */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 200px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }
    
    .dropdown-content a {
      color: #333;
      padding: 12px 16px;
      text-decoration: none;
      display:block;
    }
    
    .dropdown-content a:hover {
      background-color: #ddd;
    }
    
    .dropdown:hover .dropdown-content {
      display: block;
    }
    
    .footer {
      background-color: #f2b8b8;
      color: #070000;
      padding: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>UPSI Bus Tracking</h1>
    </div>
    
    <div class="content">
        <div class="button-container">
         
          <a href="{{ route('report.create') }}" >Report</a>
          <a href="{{ route('login') }}">Log in</a>
        </div>
        
      <h2>Route UPSI BUS </h2>
      <div class="dropdown">
        <button class="dropbtn">Select Route</button>
        <div class="dropdown-content">
          <!--<a href="https://www.protrack365.com/page/share.jsp?mapType=google&token=S1688549520p53I21377938145dc1d263fdde51d38d200dbb98b4">PT-TB (shuttle)</a>
          <a href="https://www.protrack365.com/page/share.jsp?mapType=google&token=S1688549520p53I21377938145dc1d263fdde51d38d200dbb98b4">PT-KSAS (shuttle)</a>
          <a href="https://www.protrack365.com/page/share.jsp?mapType=google&token=S1688549520p53I21377938145dc1d263fdde51d38d200dbb98b4">KSAS (shuttle)</a>
          <a href="https://www.protrack365.com/page/share.jsp?mapType=google&token=S1688549520p53I21377938145dc1d263fdde51d38d200dbb98b4">TB-KSAS</a>
          <a href="https://www.protrack365.com/page/share.jsp?mapType=google&token=S1688549520p53I21377938145dc1d263fdde51d38d200dbb98b4">Proton City - KSAS</a>
          <a href="https://www.protrack365.com/page/share.jsp?mapType=google&token=S1688549520p53I21377938145dc1d263fdde51d38d200dbb98b4">Proton City - PT</a>-->
          @foreach ($buses as $bus)
          <a href = "{{ $bus->link }}">{{ $bus->route }}</a>
        @endforeach
        </div>
      </div>
    <br>
       <div class="image-container">
        <img src="/images/imagemain.jpeg" alt="Image">
      </div>
    </div>
   
    
    <div class="footer">
      <p>&copy; 2023 UPSI MES3073 Group 1. All rights reserved.</p>
    </div>
  </div>
</body>
</html>