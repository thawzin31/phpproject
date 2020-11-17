<?php
	require('db_connect.php');

	$id=$_POST['id'];
	$name=$_POST['name'];
	//var_dump($name);
	$oldphoto=$_['oldphoto'];
	//var_dump($oldphoto);
	$newphoto=$_FILES['newphoto'];
	//var_dump($newphoto);
	//die();

	if ($newphoto['size']>0) {
		$source_dir='imgae/brand';
		$filename=mt_rand(100000,999999);
		$file_exe_arr=('.'.$newphoto['name']);
		$file_exe = $file_exe_array[1];

		$fullpath = $source_dir.$filename.'.'.$file_exe;
		move_uploaded_file($newphoto['tmp_name'], $fullpath);
	
	}
	else{
		$fullpath = $oldphoto;
	}

	$sql = "UPDATE brands SET name=:value1, logo=:value2 WHERE id=:value3";
	$stmt= $conn->prepare($sql);
	$stmt->bindParam(':value1', $name);
	$stmt->bindParam(':value2', $fullpath);
	$stmt->bindParam(':value3', $id);
	$stmt->execute();

	header('location:brand_list.php');




?>