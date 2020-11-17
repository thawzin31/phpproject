<?php

	require('db_connect.php');


	$name=$_POST['name'];
	
	$categoryid=$_POST['catagoryid'];
	var_dump($categoryid);

	//$category_id="SELECT id FROM categories";

	
	$sql = "INSERT INTO subcategories (name,category_id) VALUES(:name, :categoryid)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':name', $name);
	
	$stmt->bindParam(':categoryid', $categoryid);
	
	$stmt->execute();

	header('location:subcategory_list.php');




?>