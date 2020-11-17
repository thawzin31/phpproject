<?php

	$name=$_POST['name'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];

	$profile=$_FILES['profile'];

	//var_dump($profile);

	$basepath='photo/';

	$fullpath =$basepath.$profile['name'];
	move_uploaded_file($profile['tmp_name'], $fullpath);

	$student =array(
			"name"=>$name,
			"email"=>$email,
			"gender"=>$gender,
			"address"=>$address,
			"profile"=>$fullpath
	);

	//var_dump($student);


	$jsondata = file_get_contents('studentlist.json');
	if (!$jsondata) {
		$jsondata='[]';
	}

	$data_arr =json_decode($jsondata);
	array_push($data_arr, $student);

	$jsondata=json_encode($data_arr,JSON_PRETTY_PRINT);

	file_put_contents('studentlist.json', $jsondata);

	header("location:index.php")




?>