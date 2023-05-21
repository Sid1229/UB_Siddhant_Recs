<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>









.card{
    display:inline-block;
}

.card-img-top{
    width:222px;
    height:200px
}




/* Create two unequal columns that floats next to each other */
.column {
  box-sizing: border-box;
  float: left;
  padding: 10px;
  margin: 25px;
}

.left {
  box-sizing: border-box;
  width: 15%;
  height: 900px; /* Should be removed. Only for demonstration */
  background-color: rgb(130 130 227);
}

.right {
    box-sizing: border-box;
    width: 76%;
    height: auto; /* Should be removed. Only for demonstration */
    background-color: rgb(143, 227, 130);
    float:right;
  }
  
  /* Clear floats after the columns */
  .row:after {
    box-sizing: border-box;
    content: "";
    display: table;
    clear: both;
  }
  .buybutton{
    float:right;
    background-color: #9100ff;
  
}
<
    </style>
</head>
<body>
    
</body>
</html>         




<?php

//code for entry with checking the same username and entrying the password in diffrent format 


$nameid=$_POST['nameid'];
$ph_number=$_POST['ph_number'];
$address=$_POST['address'];
$repasskey=$_POST['repasskey'];
$passkey=$_POST['passkey'];

if($passkey!=$repasskey)
{
    echo "Password Mismatch";
    die;
}

$conn= new mysqli("localhost","root","","project");

    if ($conn->connect_error){
     echo"Connection failed<br>";
     die;
    }
    echo"connection success<br>";



$cmd="select * from sellerlogin where nameid='$nameid'";
$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);
//echo "total_row_count=$total_row_count";
if($total_row_count>0)
{
    echo "Username already taken, try differen username";
    die;
}
else
{

    $hashpass=md5($passkey);
    
    $sql_status=mysqli_query($conn,"insert into sellerlogin (nameid,passkey,ph_number,address) values ('$nameid','$hashpass','$ph_number','$address')");
     
    echo"Entery Done<br>";
} 
header("Location:http://localhost/project/oldsellerlogin.html");