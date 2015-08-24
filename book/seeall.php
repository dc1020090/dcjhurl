<?php
require('../header.php');
require('../nav.php');
?>
<?php
if(isset($_SESSION['username']))
{
	//$data="dcjh";
	$user=$_SESSION['username'];
	$sql="SELECT * FROM `book`";
	$res=$test->query($sql);
	//$res->execute(array($user));
	//$db_size=mysql_num_rows($res);
}
else
{
	$_SESSION['error']=1;
?>
<meta http-equiv="refresh" content="0;url=http://localhost/dcjh/index.php"></meta>
<?php
}
/*for($i=0;$i<$db_size;$i++)
{
	$value=mysql_fetch_row($res);
	$name[]=$value[1];
	$user[]=$value[2];
}*/
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
			<center>
			<table class="table table-hover">
			<tr class="active">
			<td class="active">名稱</td>
			<td >擁有者</td>
			<td >qrcode</td>
			<?php
			if(isset($_SESSION['username']))
			{
				?>
			<td class="info">操作</td>
			<?php } ?>
			</tr>
				<?php while($value=$res->fetch())
						{
							//$value=mysql_fetch_row($res);
							$name=$value[2];
							$sql_name="SELECT * FROM `user` WHERE `name` LIKE ?";
							$resname=$test->prepare($sql_name);
							$resname->execute(array($name));
							$varname=$resname->fetch();
				   ?>
				<tr >
					  <td ><?php echo $value[1]; ?></td>
					  <td class="active"><?php echo $varname[5]; ?></td>
					  <?php $qr="$url"."qrcode/php/qr.php?d="."$url"."url/studentsee.php?book="."$value[0]"; ?>
					  <td ><a href="<?= $qr ?>">qrcode</td>
				  <?php 
					if(isset($_SESSION['username']))
					{
						?>
					<td>
					<?php if($_SESSION['username']==$varname[1]){?>
					<a class="icon-bttn" href="delete.php?id=<?php echo $value[0]?>&user=<?php echo $value[2]?>">
                        <span class="glyphicon glyphicon-trash" title="刪除"></span>
                    </a>
					<a class="icon-bttn" href="../url/add.php?book=<?php echo $value[1]?>">
                        <span class="glyphicon glyphicon-plus" title="加入"></span>
                    </a>
					<a class="icon-bttn" href="../url/adminsee.php?book=<?php echo $value[0]?>">
                        <span class="glyphicon glyphicon-eye-open" title="檢視"></span>
                    </a>
					<a class="icon-bttn" href="../book/update.php?id=<?php echo $value[0]?>">
                        <span class="glyphicon glyphicon-pencil" title="修改名稱"></span>
                    </a>
					<?php } ?>
					<a class="icon-bttn" href="../book/print.php?book=<?php echo $value[0]?>">
                        <span class="glyphicon glyphicon-print" title="列印"></span>
                    </a>
					<a href="../url/studentsee.php?book=<?php echo $value[0]?>">
                        學生檢視
                    </a>
					</td>
					   <?php } ?>
				  </tr><?php } ?>
			</table>
			</center>
			</div>
		</div>
</div>
</body>
</html>