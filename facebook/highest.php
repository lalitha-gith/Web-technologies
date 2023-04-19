

<?php
$con = mysqli_connect("localhost","root","","lalitha");
$q="select path,count(*) as high from likes group by path order by high  desc limit 5;";
$res=mysqli_query($con,$q);


if(mysqli_num_rows($res)>=1)
{
echo '<h4 style="background-color:f67280"><strong>Top 4 posts with highest likes</strong></h4>';
while($row=mysqli_fetch_assoc($res))
{
$pat=$row['path'];
$we="select id as c from ins where path in ('$pat');";
$z=mysqli_query($con,$we);
while($row=mysqli_fetch_assoc($z)){
echo "<div style='float:left;width:40%;'>";
echo "<center>";
echo '<p style="font-size:15px;color:#bee4d2" align="center"> '.$row['c'].' posted</p>';
break;
}
echo "<div align='center' style='background-color:#f67280'><img  src='$pat' height='200'  width='200' align='center'>";
echo '<span class="likes">'.'<br>number of likes: '.count_likes($pat).'</span><br>';
echo "</div>";

echo "</center>";
echo "</div>";
}
}
function count_likes($hj){
global $con;
$res=mysqli_query($con,"select count(*) as num from likes where path='$hj';");

while($data=mysqli_fetch_assoc($res)){

return $data['num'];
}
}

mysqli_close($con);

?>

