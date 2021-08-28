<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">

    <title>BANK OF MYSURU</title>
  </head>
  <body >
    <nav class="navbar navbar-expand-lg navbar-light " style="height:100px">
    <div align="center" href="#" style="font:42px italic">      <img src="image6.jpg" alt="" width="80" height="40" class="d-inline-block align-top">
BANK OF MYSURU</div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    </div>
   </nav>
   <?php
      error_reporting(E_ERROR|E_PARSE);
      
      include('connect.php');

      $ifsc=$_POST['ifsc'];
      $acc_no=$_POST['acc_no'];
      $amt=$_POST['amt'];
      $q="UPDATE accounts 
         SET balance = balance+$amt 
         WHERE accounts.acc_no = $acc_no;";
      $result=mysqli_query($db,$q);
      $q0="select balance from accounts where acc_no=$acc_no;";
      $result1=mysqli_query($db,$q0);
      $num_rows=mysqli_num_rows($result1);
      if($num_rows==0){

       print "<div style='width:500px; border:3px solid black; border-radius: 10px; margin-left:34% ;margin-top:90px;background-color: #EAF0DC;'>
        <div class='text-center' style='background-color: #FF4933; height: 50px ;font: 35px italic;border-bottom: 3px solid black'>Deposition Error: </div>
      
      
      <p  align='center'  style='font:20px italic;margin-top:25px;'>
      Enter valid Account Number </p></div>";
    }
    else{
      
     print "<div style='width:500px; border:3px solid black; border-radius: 10px;background-color: #EAF0DC; margin-left:34% ;margin-top:90px;'>
        <div class='text-center' style='background-color: #9BF679; height: 50px ;font: 35px italic;border-bottom: 3px solid black'>SUCCESS: </div>
      
      
      <p  align='center'  style='font:20px italic;margin-top:25px;'>
      You Have Successfully Deposited </p></div>";
     
    }
    ?>

   
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>