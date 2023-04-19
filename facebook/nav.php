<style>
    *{
        list-style:none;
        text-decoration:none;
    }
    .sidebar{
        position:fixed;
        left:0;
        width:220px;
        height:100%;
        background:#1fad9f;
    }
    .sidebar header{
        font-size:22px;
        color:white;
        text-align:center;
        line-height:70px;
        background:aqua;
        user-select:none;

    }
    .sidebar ul a{
        
        height:90px;
        width:50%;
        line-height:65px;
        font-size:20px;
        color:white;
        padding-left:40px;
        box-sizing:border-box;
        border-top:1px solid rgba(255,255,255,.1);
        border-bottom:1px solid black;
        transition:.4s;


    }
    ul li:hover a{
        padding-left:50px;

    }
    

    </style>
<body>
    <div class="sidebar">
        <br><br><br>
        <ul>
	    <li><a href="watchother.php"><strong>Home</strong></a></li>
            <li><a href="upp.php"><strong>upload</strong></a></li>
            <li><a href="watchall.php"><strong>Your posts</strong></a></li>
	    
	    <li><a href="edit.php"><strong>Profile details</strong></a></li>
         </ul>
</div>
</body>



