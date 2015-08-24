<?php
require('../header.php');
require('../nav.php');
?>
<?php
if(isset($_POST['name'],$_POST['pass'],$_POST['checkpass'],$_POST['mail']))
{
	//echo "in";
	$username=$_POST['username'];
	$name=$_POST['name'];
	$pass=$_POST['pass'];
	$checkpass=$_POST['checkpass'];
	$mail=$_POST['mail'];
	$check=true;
	if($pass!=$checkpass)
	{
		deliver(6,"$url"."log/add.php");
	}
	else if($username=='' || $name=='' || $pass=='' || $checkpass=='')
	{
		$check=false;
		deliver(7,"$url"."log/add.php");
	}
	else if($check)
	{
		$sql="SELECT * FROM `user`";
		$res=$test->query($sql);
		//$size=mysql_num_rows($res);
		$check="1";
		while($value=$res->fetch())
		{
			//$value=mysql_fetch_row($res);
			if($name==$value[1])
			{
				$check="0";
				break;
			}
		}
		if($check != "0")
		{
			$sql="INSERT INTO `user`(`name`, `pass`,`email`,`username`) VALUES (?,?,?,?)";
			$test->prepare($sql)->execute(array($name,$pass,$mail,$username));
			?><meta http-equiv="refresh" content="0;url=<?=$url?>"></meta><?php
		}
		else if($check == "0")
		{
			echo "已有此使用者!";
		}
	}
	
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<form name="form" method="POST" action="add.php" role="form">
				<center><h3>加入會員</h3></center>
				<center>
					<lable for="name">姓名</lable>
					<div class="form-group">
						<input type="name" class="textinput" name="username">
					</div>
					<lable for="name">帳號</lable>
					<div class="form-group">
						<input type="name" class="textinput" name="name">
					</div>
					<lable for="pass">密碼</lable>
					<div class="form-group">
						<input type="password" class="textinput" name="pass">
					</div>
					<lable for="pass">確認密碼</lable>
					<div class="form-group">
						<input type="password" class="textinput" name="checkpass">
					</div>
					<lable for="mail">電子郵件</lable>
					<div class="form-group">
						<input type="email" class="textinput" name="mail">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-default">送出</button>
					</div>
				</center>
				</form>
			</div>
		</div>
</div>

</body>
</html>