<?php
	/* 	回上一頁 (請記得更改連結  ex. index.php ) */
	
	// 方法一 無視警告訊息直接跳回上一頁
	// header ("location: /*請輸入連結*/ ");
	
	// 方法二 刷新: content=\0.1 是'刷新時間', 關閉警告訊息後回上一頁                      
	// echo "<meta http-equiv=\"refresh\" content=\"0.1; url=/*請輸入連結*/ \">";
	
	
	// 連接資料庫
	$root     = "dc1020090";
	$password = "xup6m3vu;6";
	
	mysql_connect("localhost", "$root" , "$password");
	
	/* 重建資料庫 */
	// 匯入時如果遇到同樣table會顯示error, 避免錯誤發生, 直接重建資料庫!!!
	// 如不需要重建資料庫, 請註解或刪除這段落程式碼
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
	
	/* 選則資料庫 */ 
	mysql_select_db( "dcjhurl" );
	
	
	// 請注意檔名
	$filename = "dcjh.sql";
	
	// 判斷匯入檔案是否存在
	if ( !file_exists ("$filename") )
	{
		echo '<script type="text/javascript">	alert("error!檔案不存在"); </script>';
		exit;
	}	
	
	$fp=fopen("$filename","r");
	$array;
	
	// 開始匯入檔案
	while(!feof($fp))
	{
		$tmp = fgets($fp);
		
		if( substr($tmp,0,2) != "--" )
			$array = $array.$tmp;
		
		// 執行指令
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