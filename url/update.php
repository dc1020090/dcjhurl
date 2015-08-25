<?php

require('../header.php');
require('../nav.php');
//require('../Connections/dcjh.php');
$go="$url"."index.php";
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
	$book=$_GET['book'];
	$sql="SELECT * FROM `book` WHERE `id`=?";
	$res=$test->prepare($sql);
	$res->execute(array($book));
	$value=$res->fetch();
	//echo $value[1];
	$bookname=$value[1];
	//echo $book;
	unset($value);
	$sql="SELECT * FROM `url` WHERE `id` LIKE ?";
	$res=$test->prepare($sql);
	$res->execute(array($id));
	$updatename=$res->fetch();
}
if(isset($_POST['name']))
{
	//echo "into!!!!";
	//$data="dcjh";
	$name=$_POST['name'];
	$updateurl=$_POST['updateurl'];
	$user=$_SESSION['username'];
	$sql="SELECT * FROM `url`";
	$res=$test->query($sql);
	//$db_size=mysql_num_rows($res);
	$check=true;
	while($value=$res->fetch())
	{
		//$value=mysql_fetch_row($res);
		if($name==$value[1] && $value[0] != $id && $bookname==$value[3])
		{
			$check=false;
			deliver(3,"$url"."url/adminsee.php?book=$book");
			break;
		}
	}
	if($check != false)
	{
		$sql="UPDATE `url` SET `name`=? , `url`=? WHERE `id` LIKE ?";
		$test->prepare($sql)->execute(array($name,$updateurl,$id));
		?><meta http-equiv="refresh" content="0;url=<?=$url?>url/adminsee.php?book=<?php echo $book ?>"></meta><?php
	}
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<center><h3>修改 <?php echo $updatename[1] ?> 內容</h3></center>
					<form name="form" method="POST" action="update.php?id=<?php echo $id ?>&book=<?php echo $book ?>" role="form">
						<center>
						<lable for="name">連結名稱</lable>
						<div class="form-group">
							<input type="name" class="textinput" name="name" value="<?php echo $updatename[1] ?>">
						</div>
						<lable for="name">連結網址</lable>
						<div class="form-group">
							<input type="url" class="textinput" name="updateurl" value="<?php echo $updatename[2] ?>">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default">修改</button>
							<a class="btn btn-default" href="<?php echo $url?>url/adminsee.php?book=<?php echo $book ?>" role="button">取消</a>
						</div>
						</center>
					</form>
			</div>
        </div>
</div>
</body>
</html>