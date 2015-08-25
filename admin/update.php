<?php

require('../header.php');
require('../nav.php');
//require('../Connections/dcjh.php');
?>
<?php
if(isset($_SESSION['username']))
{
	$root=root($_SESSION['username']);
	if($root>0)
	{
		deliver(1,"$url"."index.php");
	}
}
else
{
	deliver(1,"$url"."index.php");
}
?>
<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="SELECT * FROM `user` WHERE `id` LIKE ?";
	$res=$test->prepare($sql);
	$res->execute(array($id));
	$updatename=$res->fetch();
}
if(isset($_POST['name']) && $root<=0)
{
	//echo "into!!!!";
	//$data="dcjh";
	$name=$_POST['name'];
	if($name=="0" || $name=="2" || $name=="1")
	{
		//$user=$_SESSION['username'];
		$sql="UPDATE `user` SET `root`=? WHERE `id` LIKE ?";
		$test->prepare($sql)->execute(array($name,$id));
		?><meta http-equiv="refresh" content="0;url=<?=$url?>admin/user.php"></meta><?php
	}
	else
	{
		deliver(8,"$url"."admin/user.php");
	}
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<center><h3>修改 <?php echo htmlentities($updatename[5]) ?> 身分</h3></center>
				<center><p>0:管理員</p><p>1:老師</p><p>2:學生</p></center>
					<form name="form" method="POST" action="update.php?id=<?php echo $id ?>" role="form">
						<center>
						<lable for="name">身分</lable>
						<div class="form-group">
							<select class="form‐control" name="name">
								<option>0</option>
								<option>1</option>
								<option>2</option>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default">修改</button>
							<a class="btn btn-default" href="<?php echo $url?>admin/user.php" role="button">取消</a>
						</div>
						</center>
					</form>
			</div>
        </div>
</div>
</body>
</html>