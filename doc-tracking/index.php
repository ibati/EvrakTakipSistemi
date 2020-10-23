<?php require_once 'connect.php'; ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Evrak Listesi</title>
</head>

<h1>Evrak Takip Sistemi</h1> 
<a href="new-doc.php"><button>Yeni Ekle</button></a>
<hr>
<?php

if ($_GET['status']==save_ok){

	echo "Evrak bilgileri sisteme kaydedilmiştir.";

} elseif ($_GET['status']==save_no) {
	
	echo "Hata: Evrak bilgileri sisteme kaydedilemedi.";

} elseif ($_GET['status']==update_ok) {

	echo "Evrak kayıt bilgileri güncellenerek sisteme kaydedilmiştir.";
	
} elseif ($_GET['status']==update_no) {

	echo "Hata: Evrak kayıt bilgileri güncellenerek sisteme kaydedilemedi.";

} elseif ($_GET['status']==cancel_ok) {

	echo "İşlem iptal edildi, bir değişiklik yapılmadı";

} elseif ($_GET['status']==cancel_no) {

	echo "Hata: Bir hata oluştu, lütfen sistem yöneticisine bildiriniz.";

}
?>

<h3>Kayıt Listesi</h3>


<table style="width: 100%" border="1">
	<tr>
		<th>Sıra No</th>
		<th>Evrak Yönü</th>
		<th>Evrak Tipi</th>
		<th>Evrak No</th>
		<th>Evrak Adı</th>
		<th>Teslim Edilen Kişi</th>
		<th>Teslim Tarihi</th>
		<th>Teslim Saati</th>
		<th>İşlemler</th>
		<th>Evrak ID</th>
	</tr>
	<?php
	$inpage = 20;
	$query=$database->prepare("SELECT * from general");
	$query->execute();
	$total_count=$query -> rowCount();
	$total_page = ceil ($total_count/$inpage);
	$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
	if($page < 1) $sayfa = 1;
	if($page > $total_page) $page = $total_page;
	$limit = ($page - 1) * $inpage;

	$generalquery=$database->prepare("SELECT * from general order by doc_id DESC limit $limit, $inpage");
	$generalquery->execute();
	$count=0;

	while ($generaltake=$generalquery->fetch(PDO::FETCH_ASSOC)) { $count++ ?>
		<tr>
			<td><?php echo $count ?></td>
			<td><?php echo $generaltake['doc_way'] ?></td>
			<td><?php echo $generaltake['doc_type'] ?></td>
			<td><?php echo $generaltake['doc_no'] ?></td>
			<td><?php echo $generaltake['doc_name'] ?></td>
			<td><?php echo $generaltake['doc_delivered_person'] ?></td>
			<td align="center"><?php  echo $generaltake['doc_delivered_date'] ?></td>
			<td align="center"><?php echo $generaltake['doc_delivered_time'] ?></td>
			<td align="center"><a href="edit-doc.php?doc_id=<?php echo $generaltake['doc_id']?>"><button>Kayıt Güncelle</button></td>
			<td align="center"><?php echo $generaltake['doc_id'] ?></td>
			</tr>
		<?php } ?>
	</table>

	<div style="width: 100%" align="center">
		<?php 

		$p=0;

		while ($p < $total_page) { 

			$p++; ?>

			<?php 

			if ($p==$page) {?>

				
				<a href="?page=<?php echo $p; ?>"><?php echo $p; ?></a>

			<?php } else { ?>

				<a href="?page=<?php echo $p; ?>"><?php echo $p;?></a>
				

			<?php }

		}

		?>

	</table>	
	<body>
	</body>
	</html>
