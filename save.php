<?php
	session_start();
	include('includes/dbconfig.php');
	if(isset($_POST['submitdata'])){
		$message =$_POST['message'];

		if($message == ""){
			$_SESSION['status'] = "Please add message!";
			header("Location: index.php");
			return;
		}

		$data = [
			'message' => $message,
			'reported_at' => date('Y-m-d H:i:s'),
			'status' => 1
		];
		$ref = 'report_messages/';
		$postdata = $database->getReference($ref)->push($data);

		if($postdata){
			$_SESSION['statuscode'] = "0";
			$_SESSION['status'] = "Your response submitted successfully";
			header("Location: index.php");
		}else{
			$_SESSION['statuscode'] = "1";
			$_SESSION['status'] = "Something went wrong! Pls try again!";
			header("Location: index.php");
		}
	}
?>
