<?php
include_once('assets/config.php');

$page = @$_GET['page'];
switch ($page) {
	case null:
	case "index":
		$getpage = "pages/home";
		break;
	case "home":
		$getpage = "pages/home";
		break;
	case "vote":
		$getpage = "pages/vote";
		break;
	default:
		$title = $servername."";
		$getpage = "pages/home";
		break;
}

include_once('assets/top.php');
include_once($getpage.".php");
include_once('assets/bottom.php');
?>