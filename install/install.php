<?php
require('../header.php');
require('../nav.php');
?>
<?PHP
$dataname=$_POST['dataname'];

try
{
	$test->prepare("CREATE DATABASE IF NOT EXISTS ? DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;")->execute(array($dataname));
}
catch(PDOException $e )
{
	deliver(9,"$url"."install/index.php");
}
?>