<?php 
	
	require('db_connect.php');

	$name =	$_POST['name'];
	$photo = $_FILES['photo'];
	//var_dump($photo);

	$source_dir = 'imgae/brand/';


	$filename = mt_rand(100000, 999999);
	$file_exe_array = explode('.', $photo['name']);
	$file_exe = $file_exe_array[1];

	$fullpath = $source_dir.$filename.'.'.$file_exe;
	//var_dump($fullpath);
	move_uploaded_file($photo['tmp_name'], $fullpath);

	$sql = "INSERT INTO brands (name, logo) VALUES(:value1, :value2)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $name);
	$stmt->bindParam(':value2', $fullpath);
	$stmt->execute();

	header('location:brand_list.php');

?>
