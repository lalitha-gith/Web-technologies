<?php

include("dashd.php");
include("nav.php");
?>
<?php
   if(isset($_POST["submit"]) && !empty($_FILES["usefile"]["name"])){
      $errors= array();
      $file_name = $_FILES["usefile"]["name"];
      $file_size = $_FILES["usefile"]["size"];
      $file_tmp = $_FILES["usefile"]["tmp_name"];
      $file_type = $_FILES["usefile"]["type"];
      $dedir="faceup/".$file_name;
      $ty=time();
      $id=$_SESSION['name'];
     
      
      
         if(move_uploaded_file($file_tmp,$dedir)){
         $con = mysqli_connect("localhost","root","","lalitha");
	 if($con){
	
	$sql_q="INSERT into ins (id,path,po_time) values ('$id','$dedir','$ty');";
	if(mysqli_query($con,$sql_q)){
	echo "";
}
}
      }
mysqli_close($con);
   }
else
echo "erro";
?>