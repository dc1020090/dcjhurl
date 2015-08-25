<?php

require('../header.php');
require('../nav.php');
//require('../Connections/dcjh.php');
$go="'$url'index.php";
if(!isset($_SESSION['username']))
{
		deliver(1 ,$go);
}
?>
<?php
if(isset($_SESSION['username']))
{
	$username=$_SESSION['username'];
	$sql="SELECT * FROM `user` WHERE `name` LIKE '$username'";
	$res=$test->query($sql);
	$updatename=$res->fetch();
}
if(isset($_POST['name']))
{
	//echo "into!!!!";
	//$data="dcjh";
	$id=$_GET['id'];
	$newname=$_POST['name'];
	$newpass=$_POST['pass'];
	//$user=$_SESSION['username'];
	//$sql="SELECT * FROM `user`";
	//$res=mysql_db_query($data ,$sql,$test);
	//$db_size=mysql_num_rows($res);
	$sql="UPDATE `user` SET `username`=? , `pass`=? WHERE `id` LIKE ?";
	$test->prepare($sql)->execute(array($newname,$newpass,$id));
	$_SESSION['name']=$newname;
	?><meta http-equiv="refresh" content="0;url=<?=$url?>"></meta><?php
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<center><h3>修改 <?php echo htmlentities($updatename[5]); ?> 的資料</h3></center>
					<form name="form" method="POST" action="update.php?id=<?php echo htmlentities($updatename[0]) ?>" role="form">
						<center>
						<lable for="name">姓名</lable>
						<div class="form-group">
							<input type="name" class="textinput" name="name" value="<?php echo htmlentities($updatename[5])?>">
						</div>
						<lable for="name">密碼</lable>
						<div class="form-group">
							<input type="name" class="password" name="pass" value="<?php echo htmlentities($updatename[2])?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default">修改</button>
						</div>
						</center>
					</form>
			</div>
        </div>
</div>
</body>
</html>