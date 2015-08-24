<body>
<nav class="navbar navbar-default navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $url ?>index.php">大橋國中-教學連結</a>
				<a class="navbar-brand" href="<?php echo $url ?>form.php">意見回饋</a>
            </div>
			
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                     <?php 
					  if(!isset($_SESSION['username']))
					  {
						  
						 ?>
						 <li><a href="#" data-toggle="modal" data-target="#login">登入</a></li>
						 <li><a href="<?php echo $url ?>log/add.php">加入會員</a></li>
					  <?php
					  }
					  else
					  {
						  ?>
						  <li><a href="<?=$url?>user/update.php"><?php echo $_SESSION['name']; ?></a></li>
                          <li><a href="<?php echo $url ?>log/logout.php">登出</a></li>  
				</ul>
				<?php } ?>
                </ul>
            </div>
        </div>
		
		
	</nav>
	<?php
	if(isset($_SESSION['error']))
	{
		error($_SESSION['error']);
	}
	?>
    </div>
	<div class="container-fluid">
    <div class="row">
			<?php 
			if(isset($_SESSION['username']))
			{
				if(root($_SESSION['username'])==1)
				{ ?>
					<div class="col-lg-2 col-md-2 col-sm-2 trans_form">
						<ul class="nav nav-pills nav-stacked">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dLabe3">教材管理<span class="caret"></span></a>
								<ul class="dropdown-menu" aria-labelledby="dLabe3">
									<li><a href="<?php echo $url ?>book/seeall.php">教材總覽</a></li>
									<li><a href="<?php echo $url ?>book/add.php">新增教材</a></li>
								</ul>
							</li>
						</ul>
					</div>
				<?php }
				elseif(root($_SESSION['username'])<=0)
				{?>
					<div class="col-lg-2 col-md-2 col-sm-2 trans_form">
						<ul class="nav nav-pills nav-stacked">
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dLabe3">教材管理<span class="caret"></span></a>
								<ul class="dropdown-menu" aria-labelledby="dLabe3">
									<li><a href="<?php echo $url ?>book/seeall.php">教材總覽</a></li>
									<li><a href="<?php echo $url ?>book/add.php">新增教材</a></li>
								</ul>
							</li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="<?=$url?>admin.php" id="dLabe3">管理中心<span class="caret"></span></a>
								<?php
								if(root($_SESSION['username'])==0)
								{?>
									<ul class="dropdown-menu" aria-labelledby="dLabe3">
									<li><a href="<?php echo $url ?>admin/user.php">使用者管理</a></li>
									</ul>
								<?php }
								elseif(root($_SESSION['username'])==-1)
								{?>
									<ul class="dropdown-menu" aria-labelledby="dLabe3">
									<li><a href="<?php echo $url ?>admin/rootuser.php">使用者管理</a></li>
									</ul>
								<?php } ?>
							</li>
						</ul>
					</div>
				<?php }
				else
				{ ?>
					<div class="col-lg-2 col-md-2 col-sm-2 trans_form">
						<ul class="nav nav-pills nav-stacked">
							<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dLabe3">教材<span class="caret"></span></a>
									<ul class="dropdown-menu" aria-labelledby="dLabe3">
										<li><a href="<?php echo $url ?>book/studentsee.php">教材總覽</a></li>
									</ul>
								</li>	
						</ul>
					</div>
				<?php }
			}?>
		<div class="col-lg-1 col-md-1 col-sm-1"><br>
		</div>
   <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">登入</h4>
                </div>
                <div class="modal-body">
                    <form id="login_form" action="<?=$url?>log/login.php" method="post">
                        <div class="form-group">
                            <label for="name">帳號</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="pass">密碼</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>
                        <button type="submit" class="btn btn-default">登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>