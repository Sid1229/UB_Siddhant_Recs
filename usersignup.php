         
<?php

//code for entry with checking the same username and entrying the password in diffrent format 


$nameid=$_POST['nameid'];
$passkey=$_POST['passkey'];
$repasskey=$_POST['repasskey'];


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



$cmd="select * from login where nameid='$nameid'";
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
    
    $sql_status=mysqli_query($conn,"insert into login (nameid,passkey) values ('$nameid','$hashpass')");
    echo"Entery Done<br>";
    
}

$sql_status=mysqli_query($conn,$cmd);
if($sql_status)
{
    
    header("Location:http://localhost/project/page.php");
    //Redirect to Login Page
}
else
{
    header("Location:http://localhost/project/error_page.html");
    // echo mysqli_error($conn);
}

?>

