<?php 

    include "config.php";
	
	$sql="DELETE FROM user where id=".$_POST["id"];
	$con->query($sql);
?>


