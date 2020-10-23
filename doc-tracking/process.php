<?php 

require_once 'connect.php';

if (isset($_POST['insertprocess'])) {

	$save=$database->prepare("INSERT into general set
		doc_way=:doc_way,
		doc_type=:doc_type,
		doc_no=:doc_no,
		doc_name=:doc_name,
		doc_delivered_person=:doc_delivered_person,
		doc_delivered_date=:doc_delivered_date,
		doc_delivered_time=:doc_delivered_time
		");

	$insert=$save->execute(array(

		'doc_way'=> $_POST['doc_way'],
		'doc_type'=> $_POST['doc_type'],
		'doc_no'=> $_POST['doc_no'],
		'doc_name'=> $_POST['doc_name'],
		'doc_delivered_person'=> $_POST['doc_delivered_person'],
		'doc_delivered_date'=> $_POST['doc_delivered_date'],
		'doc_delivered_time'=> $_POST['doc_delivered_time']
	));

	if ($insert) {

		Header("Location:index.php?status=save_ok");
		exit;

	} else {

		Header("Location:index.php?status=save_no");
		exit;
		
	}

}

if (isset($_POST['updateprocess'])) {

	$save=$database->prepare("INSERT into general set

		doc_way=:doc_way,
		doc_type=:doc_type,
		doc_no=:doc_no,
		doc_name=:doc_name,
		doc_delivered_person=:doc_delivered_person,
		doc_delivered_date=:doc_delivered_date,
		doc_delivered_time=:doc_delivered_time
		");

	$insert=$save->execute(array(

		'doc_way'=> $_POST['doc_way'],
		'doc_type'=> $_POST['doc_type'],
		'doc_no'=> $_POST['doc_no'],
		'doc_name'=> $_POST['doc_name'],
		'doc_delivered_person'=> $_POST['doc_delivered_person'],
		'doc_delivered_date'=> $_POST['doc_delivered_date'],
		'doc_delivered_time'=> $_POST['doc_delivered_time']
	));

	if ($insert) {

		Header("Location:index.php?status=update_ok");
		exit;

	} else {

		Header("Location:index.php?status=update_no");
		exit;
		
	}

}

if (isset($_POST['cancelprocess'])) {

		Header("Location:index.php?status=cancel_ok");
		exit;

	} else {

		Header("Location:index.php?status=cancel_no");
		exit;
		
	}


?>