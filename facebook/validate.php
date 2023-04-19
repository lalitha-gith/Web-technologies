<?php
$server_name="localhost";
$username="root";
$password="";
$database_name="lalitha";

$conn=mysqli_connect($server_name,$username,$password,$database_name);

//now check the connection
if(!$conn)
{
    die("Connection Failed:" . mysqli_connect_error());

}

if(isset($_POST['register']))
{   
     $first_name = $_POST['fname'];
     $last_name = $_POST['lname'];
     $gender = $_POST['gender'];
     $email = $_POST['email'];
     $phone = $_POST['phn'];
    
    
     $password=$_POST['password'];

     $sql_query = "INSERT INTO insert_inf(first_name,last_name,gender,email,mobile,passwords)
     VALUES ('$first_name','$last_name','$gender','$email','$phone','$password')";

     if (mysqli_query($conn, $sql_query)) 
     {
        echo "<h2><i> you've register,click below to login</i></h2>";
	echo "<br><br>";
     } 
     else
     {
        echo "Error: " . $sql . "" . mysqli_error($conn);
     }
    
     mysqli_close($conn);
}
?>
<html>
    <br>
    <h2 >
    <a href="main2.php" >login here</a>
</h2>
</html>