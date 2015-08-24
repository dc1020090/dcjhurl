<?php
require('../header.php');
require('../nav.php');
if(isset($_GET['id']))
{
	
	$id=$_GET['id'];
	$book=$_GET['book'];
	$sql="DELETE FROM `url` WHERE `url`.`id`=?";
	$test->prepare($sql)->execute(array($id));
	?><meta http-equiv="refresh" content="0;url=<?=$url?>url/adminsee.php?book=<?php echo $book ?>"></meta><?php
}
else
{
	echo "erro!";
}
?>
<body>
</body>
</html>