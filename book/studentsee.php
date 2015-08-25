<?php
require('../header.php');
require('../nav.php');
?>
<?php
if(isset($_SESSION['username']))
{
	$sql="SELECT * FROM `book`";
	$res=$test->query($sql);
	//$db_size=mysql_num_rows($res);
	//echo $db_size;
}
else
{
	$_SESSION['error']=1;
?>
<meta http-equiv="refresh" content="0;url=<?=$url?>index.php"></meta>
<?php
}
/*for($i=0;$i<$db_size;$i++)
{
	$value=mysql_fetch_row($res);
	$name[]=$value[1];
	$user[]=$value[2];
}*/
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
			<center>
			<table class="table table-hover">
			<tr class="active">
			<td class="active">名稱</td>
			<td >擁有者</td>
			<?php
			if(isset($_SESSION['username']))
			{
				?>
			<td class="info">操作</td>
			<?php } ?>
			</tr>
				<?php 
				//echo $db_size;
				while($value=$res->fetch())
						{
							//echo "in";
							//$value=mysql_fetch_row($res);
							$sql_name="SELECT * FROM `user` WHERE `name` LIKE '?'";
							$resname=$test->prepare($sql_name);
							$resname->execute(array($name));
							$varname=$resname->fetch();
				   ?>
				<tr >
					  <td ><?php echo htmlentities($value[1]); ?></td>
					  <td class="active"><?php echo htmlentities($varname[5]); ?></td>
				  <?php 
					if(isset($_SESSION['username']))
					{
						?>
					<td>
					<a href="../url/studentsee.php?book=<?php echo $value[0]?>">
                        學生檢視
                    </a>
					</td>
					   <?php } ?>
				  </tr><?php } ?>
			</table>
			</center>
			</div>
		</div>
</div>
</body>
</html>