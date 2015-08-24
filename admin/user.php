<?php
require('../header.php');
require('../nav.php');
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
$user=$_SESSION['username'];
$sql="SELECT * FROM `user` WHERE `name` NOT LIKE ? AND `root` NOT LIKE '-1'";
$res=$test->prepare($sql);
$res->execute(array($user));
//$db_size=mysql_num_rows($res);
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
            <center><h3>使用者管理</h3></center>
			<center>
			<table class="table table-hover">
			<tr class="active">
			<td class="active">帳號</td>
			<td >姓名</td>
			<td >身分</td>
			<td >操作</td>
			</tr>
			<?php
			while($value=$res->fetch())
			{
				//$value=mysql_fetch_row($res);
				switch($value[4])
				{
					case 0:
					$root="管理員";
					break;
					case 1:
					$root="老師";
					break;
					case 2:
					$root="學生";
					break;
				}
				?>
				<tr>
				<td class="active"><?=$value[1]?></td>
				<td ><?=$value[5]?></td>
				<td><?=$root?></td>
				<td >
				<a class="icon-bttn" href="delete.php?id=<?php echo $value[0]?>">
                    <span class="glyphicon glyphicon-trash" title="刪除"></span>
                </a>
				<a class="icon-bttn" href="../admin/update.php?id=<?php echo $value[0]?>">
                        <span class="glyphicon glyphicon-pencil" title="修改身分"></span>
                    </a>
				</td>
				</tr>
				<?php
			}
			?>
			</center>
            </div>
        </div>
</div>
</body>