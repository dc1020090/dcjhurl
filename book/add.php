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
				$_SESSION['error']=2;
				?>
				<meta http-equiv="refresh" content="0;url=http://localhost/dcjh/book/add.php?error=2"></meta>
				<?php  break;
			}
		}
	}
	if($check != false)
	{
		$sql="INSERT INTO `book`(`bookname`, `user`) VALUES (?,?)";
		$test->prepare($sql)->execute(array($name,$user));
	}
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<center><h3>新增教材</h3></center>
					<form name="form" method="POST" action="add.php" role="form">
						<center>
						<lable for="name">教材名稱</lable>
						<div class="form-group">
							<input type="name" class="textinput" name="name">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-default">加入</button>
						</div>
						</center>
					</form>
			</div>
        </div>
</div>
</body>
</html>