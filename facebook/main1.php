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
        background-color:#38598b;
        height:140px;
        text-align:center; }
    #div2{
        background-color:orange;
        height:603px;
        text-align:center; 
        width:607px;
        float:left;
}
    #div3{
        background-color:#7bc7fa;
        height:603px;
        text-align:center; 
    float:right;
	padding-top:10px;
    padding-right:0;
width:800px;
height:400px}
    

   
    

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
       <?php include("register.html");
       ?>
</div>
</body>