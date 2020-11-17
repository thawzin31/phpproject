<?php 
	
	require('db_connect.php');

	$name =	$_POST['name'];
	//var_dump($name);
	$image = $_FILES['image'];
	//var_dump($image);
	$price = $_POST['unitprice'];
	//var_dump($price);
	$discount=$_POST['discount'];
	//var_dump($discount);
	$text = $_POST['text'];
	$brand = $_POST['brand'];
	//var_dump($brand);
	$subcategory=$_POST['subcategory'];
	//var_dump($subcategory);

	$codeno = "OP_".mt_rand(100000, 999999);

	$source_dir = 'imgae/item/';


	$filename=mt_rand(100000,999999);
	$file_exe_array = explode('.', $image['name']);
	$file_exe = $file_exe_array[1];

	$fullpath = $source_dir.$filename.'.'.$file_exe;
	//var_dump($fullpath);
	move_uploaded_file($image['tmp_name'], $fullpath);

	$sql = "INSERT INTO items (codeno,name,photo,price,discount,description,brand_id,subcategory_id) VALUES(:value1, :value2, :value3, :value4, :value5, :value6, :value7, :value8)";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':value1', $codeno);
	$stmt->bindParam(':value2', $name);
	$stmt->bindParam(':value3', $fullpath);
	$stmt->bindParam(':value4', $price);
	$stmt->bindParam(':value5', $discount);
	$stmt->bindParam(':value6', $text);
	$stmt->bindParam(':value7', $brand);
	$stmt->bindParam(':value8',$subcategory);
	$stmt->execute();

	header('location:item_list.php');

?>