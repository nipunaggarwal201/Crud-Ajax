<?php 

    include "config.php";
	
	$sql="UPDATE user set Name='{$_POST["name"]}',EMAIL='{$_POST["email"]}',Mobile='{$_POST["mobile"]}',Address='{$_POST["address"]}' WHERE id=".$_POST["id"];
	$con->query($sql);
?>


