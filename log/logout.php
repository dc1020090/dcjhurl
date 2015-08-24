<?php
if(isset($_SESSION))
{
	session_start();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh‐Hant">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/bootstrap.min.css" rel="stylesheet">
<title>登出</title>
</head>
<?php require('../header.php'); ?>
<body>
<?php 
	if(isset($_SESSION['username']))
	{
		unset($_SESSION['username']);
		//unset($_SESSION['root']);
	}
	if(!isset($_SESSION['username']))
	{
		echo "已登出";?>
        <meta http-equiv="refresh" content="0;url=<?php echo $url ?>index.php"></meta>
        <?php
	}
?>
</body>
</html>