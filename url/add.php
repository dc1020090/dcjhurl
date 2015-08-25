<?php
require('../header.php');
require('../nav.php');
if(isset($_SESSION['username']))
{
	$root=root($_SESSION['username']);
	if($root>1)
	{
		deliver(1,"$url");
		exit;
	}
}
else
{
	deliver(1,"$url");
	exit;
}
?>
<?php
if(isset($_GET['book']))
{
	$book=$_GET['book'];
	$username=$_SESSION['username'];
	if(isset($_POST['name']))
	{
		$name=$_POST['name'];
		$addurl=$_POST['url'];
		$book=$_GET['book'];
		$sql="SELECT * FROM `url`";
		$res=$test->query($sql);
		//$db_size=mysql_num_rows($res);
		$check=true;
		while($value=$res->fetch())
		{
			//$value=mysql_fetch_row($res);
			if($value[1]==$name && $value[3]==$book)
			{
				$check=false;
				deliver(3,"'$url'url/add.php");
				break;
			}
		}
		if($check==true)
		{
			$sql="INSERT INTO `url`(`name`, `url`, `book`, `user`) VALUES (?,?,?,?)";
			$test->prepare($sql)->execute(array($name,$addurl,$book,$username));
		}
	}
}
else
{
	deliver(4,"'$url'url/add.php");
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<center><h3>新增連結到 <?php echo $book ?></h3></center>
				<center><h4>連結請加"http://"</h4></center>
					<form name="form" method="POST" action="add.php?book=<?php echo $_GET['book'] ?>" role="form">
						<center>
						<lable for="name">連結名稱</lable>
						<div class="form-group">
							<input type="name" class="textinput" name="name">
						</div>
						<lable for="name">連結網址</lable>
						<div class="form-group">
							<input type="url" class="textinput" name="url">
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