<?php
		//require('../url.php');
		function deliver($error ,$go)
		{
			$_SESSION['error']=$error;
			?>
			<meta http-equiv="refresh" content="0;url=<?php echo $go ?>"></meta>
			<?php
		}
		function error($check)
		{
			switch($check)
			{
				case 1:
				$text="權限不足";
				break;
				case 2:
				$text="已有此教材名稱";
				break;
				case 3:
				$text="已有此連結名稱在本教材中，請改名";
				break;
				case 4:
				$text="您未選擇教材";
				break;
				case 5:
				$text="帳號或密碼錯誤!";
				break;
				case 6:
				$text="兩次密碼輸入不符!";
				break;
				case 7:
				$text="尚有欄位未輸入!";
				break;
				case 8:
				$text="輸入錯誤!";
				break;
				case 9:
				$text="資料庫新增失敗!";
				break;
			}
			?>
			<div class="alert alert-danger fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
					<strong>Oh! <?php echo $text ?></strong>
					<ul>
					</ul>
				</div>
				
			<?php
				unset($_SESSION['error']);			
		}?>