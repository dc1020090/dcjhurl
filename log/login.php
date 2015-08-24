<?php
require('../header.php');
require('../nav.php');
?>
<body>
<?php /*
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
            <center><h3>登入</h3>
                <form name="form" method="POST" action="login.php" role="form">
                
                    <center><lable for="name">帳號</lable>
                    <div class="form-group">
                    	<input type="name" class="textinput" name="name">
                    </div>
                    	<lable for="pass">密碼</lable>
                    <div class="form-group">
                    	<input type="pass" class="textinput" name="pass">
                    </div>
                    <div class="form-group">
                    	<button type="submit" class="btn btn-default">登入</button>
                    </div>
                
                <input type="hidden" name="MM_insert" value="form" />
                </form>
                </div>
           </center>
           </div>
</div>
*/?>
    
<?php
if(isset($_POST['name']))
{
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$sql=$test->query("SELECT * FROM `user`");
	//$size=mysql_num_rows($sql);
	$check=false;
	while($value=$sql->fetch())
	{
		//$value=mysql_fetch_row($sql);
		if($value[1]==$name)
		{
			if($value[2]==$pass)
			{
				$_SESSION['username']=$value[1];
				$_SESSION['name']=$value[5];
				//$_SESSION['root']=$value[4];
				echo "歡迎!";
				echo $_SESSION['username'];?>
                <meta http-equiv="refresh" content="0;url=<?php echo $url ?>index.php"></meta>
                <?php
				$check=true;
				break;
			}
		}
	}
	if($check!=true)
	{
		deliver(5,"$url"."index.php");
	}
}
?>
</body>
</html>