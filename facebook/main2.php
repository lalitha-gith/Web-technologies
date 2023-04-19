<style>
    *{
        list-style:none;
        text-decoration:none;
    }
    *{
        margin:0;

    }
    body{
        background-color:#7bc7fa;
    }
    #div1{
	margin:0;
        background-color:#38598b;
        height:140px;
        text-align:center;
	padding:0;
 }
    #div2{
	margin:0;
        background-color:orange;
        height:603px;
        text-align:center; 
        width:607px;
        float:left;
	padding:0;
	padding-left:0;
}
    #div3{
        background-color:#93deff;
        height:565px;
        text-align:center; 
    float:left;
    padding-right:0;
width:810px;
height:600px}
    </style>
<body>
    <div id="div1">
        <h1>welcome to facebook</h1>
    </div>
    <div id="div2">
        <?php
        include("highest.php");
        ?>
    </div>
    <div id="div3">
       <?php include("login.php");
       ?>
</div>
</body>