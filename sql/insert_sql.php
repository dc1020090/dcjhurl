<?php
	/* 	�^�W�@�� (�аO�o���s��  ex. index.php ) */
	
	// ��k�@ �L��ĵ�i�T���������^�W�@��
	// header ("location: /*�п�J�s��*/ ");
	
	// ��k�G ��s: content=\0.1 �O'��s�ɶ�', ����ĵ�i�T����^�W�@��                      
	// echo "<meta http-equiv=\"refresh\" content=\"0.1; url=/*�п�J�s��*/ \">";
	
	
	// �s����Ʈw
	$root     = "dc1020090";
	$password = "xup6m3vu;6";
	
	mysql_connect("localhost", "$root" , "$password");
	
	/* ���ظ�Ʈw */
	// �פJ�ɦp�G�J��P��table�|���error, �קK���~�o��, �������ظ�Ʈw!!!
	// �p���ݭn���ظ�Ʈw, �е��ѩΧR���o�q���{���X
	/*if ( !mysql_query ("DROP DATABASE IF EXISTS `dcjhurl` ") )
	{
		echo '<script type="text/javascript">	alert("error!"); </script>';
		exit;
	}	
	
	if ( !mysql_query ("CREATE DATABASE IF NOT EXISTS `hw3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci; ") )
	{
		echo '<script type="text/javascript">	alert("error!"); </script>';
		exit;
	}*/
	
	/* ��h��Ʈw */ 
	mysql_select_db( "dcjhurl" );
	
	
	// �Ъ`�N�ɦW
	$filename = "dcjh.sql";
	
	// �P�_�פJ�ɮ׬O�_�s�b
	if ( !file_exists ("$filename") )
	{
		echo '<script type="text/javascript">	alert("error!�ɮפ��s�b"); </script>';
		exit;
	}	
	
	$fp=fopen("$filename","r");
	$array;
	
	// �}�l�פJ�ɮ�
	while(!feof($fp))
	{
		$tmp = fgets($fp);
		
		if( substr($tmp,0,2) != "--" )
			$array = $array.$tmp;
		
		// ������O
		if( substr($array,strlen($array)-2,1) == ";" )
		{
			if( !mysql_query($array) )
			{
				echo '<script type="text/javascript">	alert("error!"); </script>';
				exit;
			}
			else
				$array = "";
		}
	}
	fclose($fp);
?>