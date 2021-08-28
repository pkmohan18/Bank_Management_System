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
     
      $dob=$_POST['dob'];
      $fname=$_POST['fname'];
      $mname=$_POST['mname'];
      $lname=$_POST['lname'];
      $pin=$_POST['pin'];
      $acc=$_POST['account_type'];
      $city=$_POST['city'];
      $address=$_POST['address'];
      $gender=$_POST['gender'];
      $ifsc=$_POST['ifsc'];
      $acc_no=rand(10000,1000000);
      $q="INSERT INTO accounts
              VALUES($acc_no,'$acc',0,md5($pin));";
      $result=mysqli_query($db,$q);
      if(!$result){

      print "<div style='width:500px; border:3px solid black; border-radius: 10px; margin-left:34% ;margin-top:90px;background-color: #EAF0DC;'>
        <div class='text-center' style='background-color: #FF4933; height: 50px ;font: 35px italic;border-bottom: 3px solid black'>Registration Error: </div>
      
      
      <p  align='center'  style='font:20px italic;margin-top:25px;'>
      The entered data is inappropriate </p></div>";
    }
    else{
      
      
       print "<div style='width:500px; border:3px solid black; border-radius: 10px;background-color: #EAF0DC; margin-left:34% ;margin-top:90px;'>
        <div class='text-center' style='background-color: #9BF679; height: 50px ;font: 35px italic;border-bottom: 3px solid black'>SUCCESS: </div>
      
      
      <p  align='center'  style='font:20px italic;margin-top:25px;'>
      Your Account Number is:".$acc_no. "</p></div>";
      $cust_id=rand(100,100000);
      $query2="INSERT INTO customer
               VALUES($cust_id,'$fname','$mname','$lname','$dob','$gender','$address');";
      $result1=mysqli_query($db,$query2);
      $query3="insert into holds values($acc_no,$cust_id);";
      $result2=mysqli_query($db,$query3);
      $query4="insert into has values('$ifsc',$acc_no);";
      $result3=mysqli_query($db,$query4);
    }
    ?>

   
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>