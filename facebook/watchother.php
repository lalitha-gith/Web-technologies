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
        height:80px;
        background:#68bde1;
    }
</style>
<?php
session_start();
if($_SESSION["name"]){
    ?>
<body style="background-color:white">
<div class="s">
<h1 align="center" id="h1">welcome to facebook
    <?php
    echo "<i>";
    echo"<br>";
    echo $_SESSION["name"];
    echo "</i>";
    ?></h1>
    <a href='logout.php' ><h3 style="color:crimson; float:right;width:150"><button>logout</button></a>
        
</div>
</body><?php
}
else{
    header("location:main1.php");
}?><?php
include("nav.php");
?>
<style>
.t{
padding-top:80;
margin-left:0;
padding-left:250;
background-color:#bae8e8;
padding-right:450;
}
</style>

<div class="t">
<?php
$pat="";
$n="";
$con = mysqli_connect("localhost","root","","lalitha");
$id=$_SESSION['name'];
$qr="select path from ins where id not in ('$id');";
$res=mysqli_query($con,$qr);

if(mysqli_num_rows($res)>=1)
{
while($row=mysqli_fetch_assoc($res))
{

$pat=$row['path'];
$we="select id as c from ins where path in ('$pat');";
$z=mysqli_query($con,$we);
while($row=mysqli_fetch_assoc($z)){
echo "<div style='float:left;width:35%;'>";
echo "<center>";
echo '<p style="font-size:15px;height:15px;color:#155363" align="center"> '.$row['c'].' posted</p>';
break;
}
$ga="   ";
echo "<div align='center' style='background-color:#f67280'><img  src='$pat' height='200'  width='250' align='center'>";
echo '<form method="post" >';
echo  '<input type="hidden" name="path" value="'.$pat.'">';
echo '<button type="submit" name="like_but">like</button>';
echo '<span class="likes" >'.$ga.count_likes($pat).'</span><br>';
echo '</form>';
//veiw all comments
echo '<div style="background-color:#fab2ac">';
echo '<p align="left">All comments</p><br>';
$rt="select id,comment from comments where path='$pat';";
$resu=mysqli_query($con,$rt);
if(mysqli_num_rows($resu)>=1)
{
while($row=mysqli_fetch_assoc($resu))
{
echo "<strong>".($row['id'])."</strong>".'  commented  '.($row['comment']).'<br>';
}

}
echo '</div>';


echo '<form method="post" >';
echo  '<input type="hidden" name="path" value="'.$pat.'">';
echo '<input type="text" name="comment" placeholder="enter your comment" style=" height: 20px; width:200px">';
echo  '<button type="submit" name="comments" >post</button>';
echo '</form>';
echo '<br>';
echo '</div>';
echo "</center>";
echo "</div>"
;
}
}
//likes
if (isset($_POST['like_but'])){
$pid=$_POST['path'];

$qy=mysqli_query($con,"select * from likes where id='$id' and path='$pid';");
if(mysqli_num_rows($qy)==0){
mysqli_query($con,"insert into likes values('$id','$pid');");
}
}


//comments 
if(isset($_POST['comments'])){

$pid=$_POST['path'];
$com=$_POST['comment'];
if($com!=""){
$qy=mysqli_query($con,"select * from comments where id='$id' and path='$pid' and comment='$com';");
if(mysqli_num_rows($qy)==0){
$qu="insert into comments values ('$id','$pid','$com');";
mysqli_query($con,$qu);
}

}
}



//counting likes
function count_likes($hj){
global $con;
$res=mysqli_query($con,"select count(*) as num from likes where path='$hj';");

while($data=mysqli_fetch_assoc($res)){

return $data['num'];
}
}

mysqli_close($con);

?>
</div>