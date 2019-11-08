<?php 
	include "config.php";
	$name=$_POST["name"];
	$email=$_POST["email"];
	$mobile=$_POST["mobile"];
	$address=$_POST["address"];
	$sql="INSERT INTO user (Name,EMAIL,Mobile, Address) values ('$name','$email', '$mobile', '$address')";
	$con->query($sql);
	$id=$con->insert_id;

	echo "<td>{$name}</td>";
	echo "<td>{$email}</td>";
	echo "<td>{$mobile}</td>";
	echo "<td>{$address}</td>";
	echo"<td><button type='button' class='btn btn-sm btn-info edit'data-id='{$id}'><i class='fa fa-edit'></i></td>";
	echo"<td><button type='button' class='btn btn-sm btn-danger del' data-id='{$id}'><i class='fa fa-trash'></i></td>";

?>