<?php
require('../header.php');
//require('../nav.php');
?>
<?php
if(isset($_GET['book']))
{
	$id=$_GET['book'];
}
else
{
	deliver(4,"$url"."book/seeall.php");
}
?>
<?php
$sql="SELECT * FROM `book` WHERE `id` = ?";
$res=$test->prepare($sql);
$res->execute(array($id));
$value=$res->fetch();
$book=$value[1];
unset($value);
$sql="SELECT * FROM `url` WHERE `book` LIKE ?";
$res=$test->prepare($sql);
$res->execute(array($book));
?>
<div class="container-fluid">
        <div class="row">
			<center>
				<table border="3">
					<tr>
						<td>名稱</td>
						<td>網址</td>
						<td>qrcode</td>
					
					</tr>
					<?php
					while($value=$res->fetch())
					{
						?>
						<tr>
						<td><?=htmlentities($value[1])?></td>
						<td><?=htmlentities($value[2])?></td>
						<td><img src="<?=$url?>qrcode/php/qr.php?d=<?=$value[2]?>" > </td>
						</tr>
						<?php
					}
					?>
					
				</table>
			</center>
		</div>
	</div>