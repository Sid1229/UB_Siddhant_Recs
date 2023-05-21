<?php



$conn= new mysqli("localhost","root","","project");

if ($conn->connect_error){
    header("Location:http://localhost/project/error_page.html");
    die;
}
echo"connection success<br>";


print_r($_POST);

echo "<br>";
print_r($_FILES['pdtimg']);

$actual_name=$_FILES['pdtimg']['name'];

$tmp_path = $_FILES['pdtimg']['tmp_name'];

$target_path="image//$actual_name";

move_uploaded_file($tmp_path,$target_path);

echo("<br><br><br><br>".$target_path);




$seller_name=$_POST['seller_name'];
$product_name=$_POST['product_name'];

$about=$_POST['about'];
$price=$_POST['price'];


    
    $sql_status=mysqli_query($conn,"insert into seller_product (seller_name,product_name,about,price,product_image) values ('$seller_name','$product_name','$about','$price','$target_path')");
    echo"Entery Done<br>";
    
    header("Location:http://localhost/project/error_page.html");

// $sql_status=mysqli_query($cmd);
// if($sql_status)
// {
//     echo("success")
//     //Redirect to Login Page
// }
// else
// {
//     echo "Failed Signup!<br>Signup Again";
//     // echo mysqli_error($conn);
// }





















