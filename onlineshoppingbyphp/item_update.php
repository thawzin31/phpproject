<?php 

	require('db_connect.php');


	$id = $_POST['id'];
	$name = $_POST['name'];
	$oldphoto = $_POST['oldphoto'];

	$newphoto = $_FILES['newphoto'];

	if ($newphoto['size'] > 0) {

		$source_dir = 'imgae/item/';
		$filename = mt_rand(100000, 999999);
		$file_exe_array = explode('.', $newphoto['name']);
		$file_exe = $file_exe_array[1];

		$fullpath = $source_dir.$filename.'.'.$file_exe;
		move_uploaded_file($newphoto['tmp_name'], $fullpath);
	}
	else{
		$fullpath = $oldphoto;
	}
	$codeno = "OP_".mt_rand(100000, 999999);
	$price =$_POST['unitprice'];
	$discount=$_POST['discount'];
	//var_dump($discount);
	$text = $_POST['text'];
	$brand = $_POST['brand'];
	//var_dump($brand);
	$subcategory=$_POST['subcategory'];

	$sql = "UPDATE items SET codeno=:value1, name=:value2, photo=:value3,price=:value4, discount=:value5, description=:value6, brand_id=:value7, subcategory_id=:value8  WHERE id=:value9";

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $codeno);
	$stmt->bindParam(':value2', $name);
	$stmt->bindParam(':value3', $fullpath);
	$stmt->bindParam(':value4', $price);
	$stmt->bindParam(':value5', $discount);
	$stmt->bindParam(':value6', $text);
	$stmt->bindParam(':value7', $brand);
	$stmt->bindParam(':value8',$subcategory);
	$stmt->bindParam(':value9', $id);
	$stmt->execute();

	header('location:item_list.php');



?>