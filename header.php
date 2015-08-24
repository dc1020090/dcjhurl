<?php
if(!isset($_SESSION))session_start();
require('var.php');
require("Connections/dcjh.php");
require('error.php');
require('check.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh‐Hant">
<head>
<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>大橋國中-教學連結</title>
    <link rel="stylesheet" href="<?php echo $url ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url ?>css/css.css">
    <!--[if lt IE 9]>
    <script src="<?=$url?>js/html5shiv.min.js"></script>
    <![endif]-->
    <script src="<?=$url?>js/jquery.min.js"></script>
    <script src="<?php echo $url ?>js/bootstrap.min.js"></script>
    <style>
        body{
            background-image: url('<?php echo $url ?>src/01.jpg');<?php //index-background?>
            background-size: cover;
            background-repeat:no-repeat;
            background-attachment:fixed
        }
    </style>
</head>