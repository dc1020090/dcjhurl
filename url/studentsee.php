<?php
require('../header.php');
require('../nav.php');
/*if(!isset($_SESSION['username']))
{
		deliver(1,"'$url'");
}*/
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
	//deliver(4,"$url"."book/seeall.php");
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
				<center><h3><?php echo $book ?> 的連結</h3></center>
				<center>
						<?php while($value=$res->fetch())
								{
									//$value=mysql_fetch_row($res);
						   ?>
						   <a class="btn btn-default" href="<?php echo $value[2]?>" role="button"><?php echo $value[1]?></a>
						   <?php } ?>
						   <br>
						   <img src="<?=$url?>qrcode/php/qr.php?d=<?=$url?>url/studentsee.php?book=<?=(int)$id?>">
				</table>
				</center>
			</div>
        </div>
</div>
</body>