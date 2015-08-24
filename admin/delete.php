<?php
require('../header.php');
require('../nav.php');
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
if(isset($_GET['id']) && $root<=0)
{
	
	$id=$_GET['id'];
	$sql="DELETE FROM `user` WHERE `user`.`id` = ?";
	$test->prepare($sql)->execute(array($id));
	?><meta http-equiv="refresh" content="0;url=<?=$url?>admin/user.php"></meta><?php
	//echo "已刪除!";
}
else
{
	echo "error!";
}
?>