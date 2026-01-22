<?php include("header.html") ?>
<style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
    }
    .header {
      background-color: #214162;
      color: white;
      padding: 30px;
      text-align: center;
    }
    .content {
      flex: 1;
      background: white;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding-left: 4%;
    }
    .card {
      display: inline-block;
      width: 200px;
      height: 100px;
      margin: 10px;
      background: #214162;
      color: white;
      text-align: center;
      vertical-align: middle;
      line-height: 100px;
      font-size: 16px;
      border-radius: 5px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-decoration: none;
    }
    .card:hover {
      background: #15283c;
      color:white;
      transform: scale(1.05);
      transition: 0.3s;
    }
  </style>
<body>
  <div class="header">
    <h1 style="color:white">Admin Dashboard</h1>
    <p style="color:antiquewhite">Welcome, Admin!</p>
  </div>

    <div class="content">
      <p>Choose an action below:</p>
      <div class="card-container">
        <a href="userview.php" class="card"><i class="fa fa-users green_color"></i> Users</a>
        <a href="hotelbookingview.php" class="card"><i class="fa fa-home purple_color"></i> Hotels</a>
        <a href="flightbookingview.php" class="card"><i class="fa fa-plane blue2_color"></i> Flights</a>
        <a href="trainbookingview.php" class="card"><i class="fa fa-bus red_color"></i> Trains</a>
        <a href="hotelreportname.php" class="card"><i class="fa fa-book yellow_color"></i> Reports</a>
      </div>
    </div>
  </div>
<?php include("footer.html") ?>