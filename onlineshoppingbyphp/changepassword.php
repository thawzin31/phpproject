<?php 
	require('db_connect.php');
	session_start();

	$changepassword=$_POST['changepassword'];
	$currentpassword=$_POST['currentpassword'];

	$id=$_SESSION['login_user']['id'];
	$oldpassword=$_SESSION['login_user']['password'];

	if ($currentpassword==$oldpassword) {
		$sql="UPDATE users SET password=:value1 WHERE id=:value2";
		$stmt=$conn->prepare($sql);
		$stmt->bindParam(':value1',$id);
		$stmt->bindParam(':value2',$changepassword);
		$stmt->execute();

		$_SESSION['chppassword_success']="Please Login with new password";
		session_destroy();
		header('location:login.php');
	}else{
		$_SESSION['chppassword_fail']="Your current password is not the same with oldpassword";
		header('location:secret.php');
	}
?>