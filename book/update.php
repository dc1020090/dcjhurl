<?php

require('../header.php');
require('../nav.php');
//require('../Connections/dcjh.php');
$go="'$url'index.php";
if(isset($_SESSION['username']))
{
	$root=root($_SESSION['username']);
	if($root>1)
	{
		deliver(1 ,$go);
		exit;
	}
}
else
{
	deliver(1 ,$go);
	exit;
}
?>
<?php
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$sql="SELECT * FROM `book` WHERE `id` LIKE ?";
	$res=$test->prepare($sql);
	$res->execute(array($id));
	$updatename=$res->fetch();
}
if(isset($_POST['name']))
{
	//echo "into!!!!";
	//$data="dcjh";
	$name=$_POST['name'];
	$user=$_SESSION['username'];
	$sql="SELECT * FROM `book`";
	$res=$test->query($sql);
	//$db_size=mysql_num_rows($res);
	$check=true;
	while($value=$res->fetch())
	{
		//$value=mysql_fetch_row($res);
		if($name==$value[1])
		{
			if($user==$value[2])
			{
				$check=false;
				deliver(2,"'$url'book/update.php");
				break;
			}
		}
	}
	if($check != false)
	{
		$sql="UPDATE `book` SET `bookname`=? WHERE `id` LIKE ?";
		$test->prepare($sql)->execute(array($name,$id));
		?><meta http-equiv="refresh" content="0;url=http://localhost/dcjh/book/seeall.php"></meta><?php
	}
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<center><h3>修改 <?php echo $updatename[1] ?> 名稱</h3></center>
					<form name="form" method="POST" action="update.php?id=<?php echo $id ?>" role="form">
						<center>
						<lable for="name">教材名稱</lable>
						<div class="form-group">
							<input type="name" class="textinput" name="name" >
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default">修改</button>
							<a class="btn btn-default" href="<?php echo $url?>book/seeall.php" role="button">取消</a>
						</div>
						</center>
					</form>
			</div>
        </div>
</div>
</body>
</html>