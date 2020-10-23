<?php

try {

	$database=new PDO("mysql:host=localhost;dbname=doctracking;charset=utf8",'root','123456789');

	//echo "Veritabanı bağlantısı başarılı";
	
} catch (PDOException $e) {
	echo $e->getMessage();	
}

?>