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
</style>
<?php
session_start();
if($_SESSION["name"]){
    ?>
<body style="background-color:ffaaa6">
<div class="s">
<h1 align="center" id="h1">welcome to facebook
    <?php
    echo "<i>";
    echo"<br>";
    echo $_SESSION["name"];
    echo "</i>";
    ?></h1>
   <a href='logout.php'><h3 style="color:crimson; float:right; width:140"><button>logout</button></a>
        
</div>
</body><?php
}
else{
    header("location:main1.php");
}?>
<div>
<?php include("nav.php")?>


<html>
<style>
   
    .d{
        padding-left:550;
        padding-top:300;
        background-color:ffaaa6;
        width:200px;
        height:170px;
    }
    .a{
        align-items:center;
        padding-left:150;
        padding-top:60;
        background-color:#DC143C;
        width:300px;
	height:150px;
    }
    input{
        font-size:15px;
        align-items:center;
    }
    h3{

align-items:center;
}
    </style>

<div class="d">
<div class="a">
<form  enctype="multipart/form-data" action="uploadp.php" method="post">
<h3 ><i>upload your post:</i></h3><br><input type="file" name="usefile">
<br><br>
<input type="submit" value="upload file" name="submit">
</form>
</div>
</div>

</html>