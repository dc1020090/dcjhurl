<?php
//require('../Connections/dcjh.php');
function root($name)
{
	global $test,$data;
	//$data="dcjh";
	//$sql=$test->query("SELECT * FROM `user`");
	//$res=mysql_db_query($data ,$sql ,$test);
	//$db_size=mysql_num_rows($res);
	$res=$test->query("SELECT * FROM `user` WHERE `name` LIKE '$name'");
	//$res=mysql_db_query($data ,$sql ,$test);
	if($res)
	{
		$value=$res->fetch();
		return $value[4];
	}
	/*for($i=0;$i<$db_size;$i++)
	{
		$value=mysql_fetch_row($res);
		if($value[4])
		{
			return $value[4];
			break;
		}
		
	}*/
}
?>