<?php

$nameid=$_POST['nameid'];
$passkey=$_POST['passkey'];

/*
hash the received password using md5

filter the username from user table
get the hashed password from db
compare 
if matched show success
else invalid login
*/


$conn= new mysqli("localhost","root","","project");

    if ($conn->connect_error){
         header("Location:http://localhost/project/error_page.html");
     die;
    }
    //  echo"connection success<br>";

$hashlogin=md5($passkey);

$cmd="select * from login where nameid='$nameid' and passkey='$hashlogin'";
$sql_result=mysqli_query($conn,$cmd);

$total_row_count=mysqli_num_rows($sql_result);

if($total_row_count==1)
{
   
//  header("Location:http://localhost/project/page.php");
    //  echo "Login Success";

}
else
{
     header("Location:http://localhost/project/error_page.html");

}

/*

echo "$input_hash <br>";

$row=mysqli_fetch_assoc($sql_result);
print_r($row);

if($row['password']==$input_hash)
{
    echo "Login Success";
}
else
{
    echo "Login Failed";
}

*/

?>







<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">



<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<style>


    





    body {
            background-image: url("bgimage.jpg");
            width: 1510px;
            ;
            height: 730px;
            ;
        }

        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: rgb(204 171 250);
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 47px 8px 8px 32px;
            text-decoration: none;
            font-size: 33px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: rgb(55, 230, 58);
        }

        #iris {
            font-size: 50px;
            color: rgb(55, 70, 230);
            text-align:center;
        }

        #iris:hover {
            color: rgb(55, 230, 58);

        }

        .menu {
            color: white;
        }

        .menu:hover {
            color: rgb(43 54 208);
            ;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

        /* .mainbox {
        border: 1px solid black;
        text-align: center;
        width: 1500px;
        height: 1000px;
    } */
    /* .box1 {
        background-color: rgb(130 130 227);
        display: inline-block;
        height: 990px;
        width: 240px;
        margin: 2px , 2px , 2px ,2px ;
    } */
    
    /* .box2 {
        background-color: blue;
        width: 1253px;
        border: 1px solid red;
        height: 990px;
        display: inline-block;
        }   */


        #tasktitle {
            background-color:rgb(161 165 255);
            font-size: 30px;
            padding: 4px 30px 4px 30px;
            margin: 17px 55px 7px 50px;
        }
        
        /* #taskdescription { */
            /* font-size: 20px; */
            /* background-color: rgb(142 234 203); */
            /* padding: 15px 150px 7px 150px; */
            /* margin: 1px 0px 7px 100px;  */
            /* text-align: center; */
        /* } */
        
        #studentid{
            float: right;
            font-size: 30px;
            padding: 10px 5px 10px 5px;
            width:212px;
            background-color: aliceblue;
            text-align: center;
            height: 66px;
            

        }
        #studentimage{
            height: 50px;
            width: 50px;
            float:left;
        }
        .taskdescription{
            margin:112px,  2px, 2px,  12px;
            padding:112px,  2px, 2px,  12px;
        }
        .searchbar {
            background-color: rgba(225, 217, 236, 0.982);
            border-radius: 13px;
            border-color: rgba(201, 174, 238, 0.982);
            border: 3px solid rgba(201, 174, 238, 0.982);
            font-size: 23px;
            font-weight: 800;
            font-family: 'Times New Roman', Times, serif;
            text-align: center;
        }

        .searchbutton{
            background-color: blue;
            margin: 2px , 2px , 2px ,2px ;
            padding: 2px, 2px, 2px, 2px  ;
        }





.card{
    display:inline-block;
}

.card-img-top{
    width:285px;
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
    width: 78%;
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
</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeBar()">&times;</a>
    <img id="image" src="image//ecommerce.jpg" alt="error">
    <br><br>
    <slang id="iris">
        EBUY
    </slang>
    <!-- <a href="#">Dashboard</a> -->
    <a href="#">See Past Orders</a>
    <!-- <a href="#">Add Task to Google Calender </a> -->
    <a href="loginpage.html">Logout</a>
</div>
<?php
echo("
<div id='main'>
<h2></h2>
<p></p>
<span  id='bar' style='font-size:30px;cursor:pointer' onclick='openBar()'>&#9776; Menu Bar</span>
<span id='tasktitle'>Search By Seller</span>
<span id='taskdescription'>
<input type='text' class='searchbar' id= placeholder='Search Here'>
</span>
<strong class='searchbutton'>
Search 
</strong>
<span id='studentid' >
<img id='studentimage' src='image//download.png' alt='error'>
<b>$nameid</b>
<br> 
</span>
")
?>
<script>
    

    function openBar() {
        document.getElementById("mySidebar").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeBar() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }
</script>


<br>

<br><br>

<?php

//For the seeing in the login pa

//  "connection";


$conn= new mysqli("localhost","root","","project");
if ($conn->connect_error){
    header("Location:http://localhost/project/error_page.html");
    die;
}


$cursor_obj=mysqli_query($conn,"select * from seller_product");



echo"
<div class='row'>
<div class='column left' >
<h2>Column 1</h2>
<p>Some text..</p>
</div>
<div class='column right' >
";
  
while($row=mysqli_fetch_assoc($cursor_obj))
{
    $seller_name=$row['seller_name'];
    $product_name=$row['product_name'];
    $about=$row['about'];
    $price=$row['price'];
    $product_image=$row['product_image'];
   
    echo "
    
    <div class='card' style='width: 18rem;'>
  <img src='$product_image' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$product_name</h5>
    <p class='card-text'>$about</p>
    <a href='#' class='btn btn-primary'>$price</a>
    <button Class='btn btn-primary buybutton'>Buy now </button>
  </div>
</div>
          
    ";
}
?>








</body>
</html>
