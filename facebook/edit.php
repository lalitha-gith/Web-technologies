<style>
    *{
        list-style:none;
        margin:0;
        padding:0;
    }
    .s{
        position:fixed;
        top:0;
        width:1532px;
        height:140px;
        background:#68bde1;
    }
    table,th,td{
	width:100%;
	height:100%;
	background-color:aqua;
	border-collapse:collapse;
	border:2px solid black;
        font-size:20px;
        align-items:center;
    }
    .y{
	
        padding-left:550;
        padding-top:340;
        
        width:180px;
        height:170px;
    }
    .x{
        align-items:center;
        padding-left:150;
        padding-top:60;
       
        width:280px;
        height:120px;
    }
</style>
<?php
session_start();
if($_SESSION["name"]){
    ?>
<body style="background-color:white">
<div class="s">
//echo $_SESSION['name'];
<h1 align="center" id="h1">welcome to facebook
    <?php
    echo "<i>";
    echo"<br>";
    echo $_SESSION["name"];
    echo "</i>";
    ?></h1>
    <a href='logout.php'><h3 style="color:crimson; float:right;width:150"><button>logout</button></a>
        
</div>
</body><?php
}
else{
    header("location:main1.php");
}?><?php
include("nav.php");
?>
<?php
$connect=mysqli_connect("localhost","root","","lalitha");
$sql="select * from insert_inf";
$rows=mysqli_query($connect,$sql);
?>
<div class="y">
<div class="x">
<?php
while($row = mysqli_fetch_array($rows)) {

echo "<br>";
$j=$_SESSION["name"];
$k="select * from insert_inf where first_name='$j';";
$r=mysqli_query($connect,$k);
if(mysqli_num_rows($r)>0){
echo "<table>";
    echo "<tr><td>Name:</td>"."<td><strong>".($j)."</strong></td></tr>";
    while($row=mysqli_fetch_assoc($r))
    {
    echo "<tr><td>Email:</td>"."<td><strong>".($row['email'])."</strong></td></tr>";
    echo "<tr><td>Phone number:</td>"."<td><strong>".($row['mobile'])."</strong></td></tr>";
    echo "<tr><td>Gender:</td>"."<td><strong>".($row['gender'])."</strong></td></tr>";
    break;
    }
    
    }
break;
}
echo "</table>";
?>

</div>
</div>


