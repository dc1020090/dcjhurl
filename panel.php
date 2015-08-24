<?php 
require('header.php');
require('nav.php');
?>
<?php 
    
    if( !isset( $tmpl['market_panel_active'] ) )
        $tmpl['market_panel_active'] = "";
    $tname = $tmpl['market_panel_active'];
    
    function market_panel_active($name,$tname)
    {
        if( $tname == $name )
            echo 'active';
    }

?>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation"><a href="market.php">購買列表</a></li>
    <?php foreach($tmpl['panel_list'] as $row) { ?>
    <li role="presentation" class="<?php market_panel_active("mlist-".$row['lid'],$tname)?>"><a href="market.php?id=<?=$row['lid']?>"><?=htmlspecialchars($row['name'])?></a></li>
    <?php }?>
    
    <li class="dropdown <?php market_panel_active('site',$tname)?>">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="dLabe3">帳號管理<span class="caret"></span></a>
        <ul class="dropdown-menu" aria-labelledby="dLabe3">
            <li><a href="#">購買紀錄</a></li>
            <li><a href="#">修改密碼</a></li>
        </ul>
    </li>
</ul>