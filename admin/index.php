<?php
require('../header.php');
require('../nav.php');
?>
<?php
if(isset($_SESSION['username']))
{
	$root=root($_SESSION['username']);
	if($root!=0)
	{
		deliver(1,"$url"."index.php");
	}
}
else
{
	deliver(1,"$url"."index.php");
}
?>
<body>
<div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 trans_form_mh300 panel panel-default">
            <center><h3>管理中心</h3></center>
            </div>
        </div>
</div>
</body>