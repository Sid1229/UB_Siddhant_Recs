<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>


body {
            background-image: url("bgimage.jpg");
            width: 1510px;
            height: 730px;
}
.card{
  display:inline-block;
}

.card-img-top{
  width:222px;
  height:200px
}

* {
  box-sizing: border-box;
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
  width: 32%;
  height: 900px; /* Should be removed. Only for demonstration */
  background-color: rgb(130 130 227);
}

.right {
  box-sizing: border-box;
  width: 61%;
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
.label{
  font-size:70px;
  text-align:center;
  color:white;
  display:inline-block;
}
.upper{
  font-size:75px;
  text-align:center;
  color:#0312fb;
  
}
.textbox{
  text-align:center;
  display:inline-block;
  font-weight: 100;
}
    </style>
</head>
<body>
    
    


<?php

$nameid=$_POST['nameid'];
$passkey=$_POST['passkey'];


$conn= new mysqli("localhost","root","","project");

    if ($conn->connect_error){
      header("Location:http://localhost/project/error_page.html");
     die;
    }
    //  echo"connection success<br>";

$hashlogin=md5($passkey);

$cmd="select * from sellerlogin where nameid='$nameid' and passkey='$hashlogin'";
$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);

if($total_row_count==1)
{
    
    
}
else
{
  header("Location:http://localhost/project/error_page.html");
}


?>

<?php

//code for entry with checking the same username and entrying the password in diffrent format 


// $nameid=$_POST['nameid'];
// $ph_number=$_POST['ph_number'];
// $address=$_POST['address'];
// $repasskey=$_POST['repasskey'];
// $passkey=$_POST['passkey'];

// if($passkey!=$repasskey)
// {
//     echo "Password Mismatch";
//     die;
// }

// $conn= new mysqli("localhost","root","","project");

//     if ($conn->connect_error){
//      echo"Connection failed<br>";
//      die;
//     }
//     echo"connection success<br>";



// $cmd="select * from sellerlogin where nameid='$nameid'";
// $sql_result=mysqli_query($conn,$cmd);

// $total_row_count=mysqli_num_rows($sql_result);
// //echo "total_row_count=$total_row_count";
// if($total_row_count>0)
// {
//     echo "Username already taken, try differen username";
//     die;
// }
// else
// {

//     $hashpass=md5($passkey);
    
//     $sql_status=mysqli_query($conn,"insert into sellerlogin (nameid,passkey,ph_number,address) values ('$nameid','$hashpass','$ph_number','$address')");
//     echo"Entery Done<br>";
    
// }

// $sql_status=mysqli_query($conn,$cmd);
// if($sql_status)
// {
    
//For the seeing in the login pa

//  "connection";
$conn= new mysqli("localhost","root","","project");


 if ($conn->connect_error){
  header("Location:http://localhost/project/error_page.html");
     die;
 }

// echo"connection success<br>";


$cursor_obj=mysqli_query($conn,"select * from seller_product");
// // $cursor_obj=mysqli_query($conn,"select * from seller_product");



echo"
<form enctype='multipart/form-data'  action='oldsellerupload.php' method='POST'>


<div class='row'>
<div class='column left' >
<p class='upper'><u>ADD PRODUCT:</u>
<p class='label'>Details:<p>
<div class='row g-1'>
    <div class='col'>
    <input type='text' class='form-control textbox' value=$nameid aria-label='First name' name='seller_name' readonly>
  </div>
  <div class='col'>
    <input type='text' class='form-control textbox' placeholder='Product name' aria-label='Last name' name='product_name' required>
  </div>
  <div class='mb-3'>
  <p class='label'>Product Details:<p>
  <input type='number' class='form-control textbox' placeholder='Product Price' aria-label='Last name' name='price'  required><br><br>
    <input type='text' class='form-control textbox' id='formGroupExampleInput' placeholder='About the product ' name='about'  required>
  </div>
  <input type='file' name='pdtimg' accept='.jpg'  required>
  <input type='submit'> 



  </div>
</div>

<div class='column right' >

</form>


";
  


while($row=mysqli_fetch_assoc($cursor_obj))
{

    
    $seller_name=$row['seller_name'];
    $product_name=$row['product_name'];
    $about=$row['about'];
    $price=$row['price'];
    $product_image=$row['product_image'];
     if($seller_name==$nameid){
        //  echo($nameid);
        
        echo "
        
        <br>
        <div class='card' style='width: 14rem;'>
        <img src='$product_image' class='card-img-top' alt='...'>
        <div class='card-body'>
        <h5 class='card-title'>$product_name</h5>
        <p class='card-text'>$about</p>
        <a href='#' class='btn btn-primary'>$price</a>
        </div>
        </div>



        ";
     }
}





    // header("Location:http://localhost/php1/page.php");
    //Redirect to Login Page



?>


</body>
</html>