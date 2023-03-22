<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="style.css">

  <title>BANK OF MYSURU</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light " style="height:100px">
    <div align="center" href="#" style="font:42px italic">
      <a href="/bank"> <img src="image6.jpg" alt="" width="80" height="40" class="d-inline-block align-top"></a>
      BANK OF MYSURU
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
  </nav>
  <?php
  error_reporting(E_ERROR | E_PARSE);

  include('connect.php');

  $pin = md5($_POST['pin']);
  $lt = $_POST['loan_type'];
  $loan_id = rand(1000, 100000);
  $ifsc = $_POST['ifsc'];
  $tmp = $_POST['loan_amt'];
  $array = explode(" ", $tmp);
  $amt = $array[0];
  $interest = $array[1];
  $acc_no = $_POST['acc_no'];
  $q = "INSERT INTO loan
              VALUES($loan_id,'$lt',$amt,$interest);";
  $result = mysqli_query($db, $q);
  $q0 = "select balance 
      from accounts 
      where accounts.acc_no=$acc_no;";
  $result1 = mysqli_query($db, $q0);
  $num_rows = mysqli_num_rows($result1);

  if (!$result or $num_rows == 0) {

    print
      "<div style='width:500px; border:3px solid black; border-radius: 10px; margin-left:34% ;margin-top:90px;background-color: #EAF0DC;'>
        <div class='text-center' style='background-color: #FF4933; height: 50px ;font: 30px italic;border-bottom: 3px solid black'>Application was Rejected: </div>
      
      
      <p  align='center'  style='font:20px italic;margin-top:25px;'>
      Enter valid Account Number </p></div>";
  } else {


    $query1 = "select pin from accounts 
    where accounts.acc_no=$acc_no;";
    $result2 = mysqli_query($db, $query1);
    $row = mysqli_fetch_assoc($result2);
    $values = array_values($row);
    $pin2 = $values[0];
    if ($pin != $pin2) {
      print "<div style='width:500px; border:3px solid black; border-radius: 10px; margin-left:34% ;margin-top:90px;background-color: #EAF0DC;'>
        <div class='text-center' style='background-color: #FF4933; height: 50px ;font: 35px italic;border-bottom: 3px solid black'>Error: </div>
      
      
      <p  align='center'  style='font:20px italic;margin-top:25px;'>
      Enter valid PIN Number </p></div>";
    } else {
      print "<div style='width:500px; border:3px solid black; border-radius: 10px;background-color: #EAF0DC; margin-left:34% ;margin-top:90px;'>
        <div class='text-center' style='background-color: #9BF679; height: 50px ;font: 35px italic;border-bottom: 3px solid black'>SUCCESS: </div>
      
      
      <p  align='center'  style='font:20px italic;margin-top:25px;'>
      Your Loan ID is: " . $loan_id . "</p></div>";

      $query = "insert into offer 
      values('$ifsc',$loan_id);";
      $result = mysqli_query($db, $query);
      $query1 = "insert into takes
      values($loan_id,(select cust_id from holds where holds.acc_no=$acc_no));";
      $result = mysqli_query($db, $query1);
    }
  }

  ?>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>