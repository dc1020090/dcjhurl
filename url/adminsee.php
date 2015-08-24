<?php
require('../header.php');
require('../nav.php');
if(isset($_SESSION['username']))
{
	$root=root($_SESSION['username']);
	if($root>1)
	{
		deliver(1,"$url");
	}
}
else
{
	deliver(1,"$url");
}
?>
<?php
if(isset($_GET['book']))
{
	$id=$_GET['book'];
	$sql="SELECT * FROM `book` WHERE `id`=?";
	$res=$test->prepare($sql);
	$res->execute(array($id));
	$value=$res->fetch();
	//echo $value[1];
	$book=$value[1];
	//echo $book;
	unset($value);
	$sql="SELECT * FROM `url` WHERE `book` LIKE ?";
	$res=$test->prepare($sql);
	$res->execute(array($book));
	//$db_size=mysql_num_rows($res);
}
else
{
	deliver(4,"'$url'book/seeall.php");
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<center><h3><?php echo $book ?> 的連結</h3></center>
				<center>
				<table class="table table-hover">
					<tr class="active">
					<td class="active">名稱</td>
					<td class="active">網址</td>
					<td class="active">操作</td>
					</tr>
						<?php while($value=$res->fetch())
								{
									//$value=mysql_fetch_row($res);
						   ?>
						<tr >
							<td ><?php echo $value[1]; ?></td>
							<td class="active"><?php echo $value[2]; ?></td>
							<td>
							<a class="icon-bttn" href="delete.php?id=<?php echo $value[0]?>&book=<?php echo $id ?>">
								<span class="glyphicon glyphicon-trash" title="刪除"></span>
							</a>
							<a class="icon-bttn" href="../url/update.php?id=<?php echo $value[0]?>&book=<?php echo $id ?>">
								<span class="glyphicon glyphicon-pencil" title="修改"></span>
							</a>
							  </td>
						  </tr><?php } ?>
				</table>
				</center>
			</div>
        </div>
</div>
</body>