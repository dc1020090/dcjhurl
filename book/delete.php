<?php
require('../header.php');
require('../nav.php');
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	$username=$_GET['user'];
	$sql="SELECT * FROM `book` WHERE `id`=? ";
	$res=$test->prepare($sql);
	$res->execute(array($id));
	$value=$res->fetch();
	//echo $value[1];
	$bookname=$value[1];
	//echo $bookname;
	unset($value);
	$sql="DELETE FROM `url` WHERE `url`.`book`=? AND `user` LIKE ?";
	$test->prepare($sql)->execute(array($bookname,$username));
	$sql="DELETE FROM `book` WHERE `book`.`id`=?";
	$test->prepare($sql)->execute(array($id));
	?><meta http-equiv="refresh" content="0;url=<?=$url?>book/seeall.php"></meta><?php
}
else
{
	echo "erro!";
}
?>
<body>
</body>
</html>