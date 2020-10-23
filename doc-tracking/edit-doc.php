<?php include 'connect.php'; ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Evrak Bilgileri Güncelleme</title>
</head>

<h1>Evrak Takip Sistemi</h1>
<a href="index.php"><button>Kayıt Listesi</button></a>
<a href="new-doc.php"><button>Yeni Ekle</button></a>
<hr>

<?php

$generalquery=$database->prepare("SELECT * from general where doc_id=:id");
$generalquery->execute(array('id' => $_GET['doc_id']
));

$generaltake=$generalquery->fetch(PDO::FETCH_ASSOC); 

?>

<h3>Evrak bilgilerini düzenleyiniz.</h3>
<form action="process.php" method="POST">
	Evrak ID : <?php echo $generaltake['doc_id'] ?> <br><br>
	Evrak Yönü : 
	<input type="radio" required="" name="doc_way" id="gelen" <?php if($generaltake['doc_way'] == "Gelen Evrak") { echo "checked"; }?> value="Gelen Evrak"><label for="gelen">Gelen Evrak</label>
	<input type="radio" required="" name="doc_way" id="giden" <?php if($generaltake['doc_way'] == "Giden Evrak") { echo "checked"; }?> value="Giden Evrak"><label for="giden">Giden Evrak</label>
	<br><br>
	Evrak Türü : 
	<select name="doc_type" id="doc_type">
		<option value="<?php echo $generaltake['doc_type'] ?>" hidden selected="<?php echo $generaltake['doc_type'] ?>"><?php echo $generaltake['doc_type'] ?></option>
		<option value="">--- Evrak türü seçiniz ---</option>
		<option value="Resmi Belge">Resmi Belge</option>
		<option value="Fatura">Fatura</option>
		<option value="İrsaliye">İrsaliye</option>
		<option value="Paket">Paket</option>
		<option value="Diğer">Diğer</option>
	</select><br><br>
	Evrak No : <input type="type" required="" name="doc_no" value="<?php echo $generaltake['doc_no'] ?>"><br><br>
	Evrak Adı: <input type="type" required="" name="doc_name" value="<?php echo $generaltake['doc_name'] ?>"><br><br>
	Teslim Edilen Kişi: 
	<select name="doc_delivered_person" id="doc_delivered_person" required="">
		<optgroup label="Satış Departmanı">
			<option value="<?php echo $generaltake['doc_delivered_person'] ?>" hidden selected="<?php echo $generaltake['doc_delivered_person'] ?>"><?php echo $generaltake['doc_delivered_person'] ?></option>
			<option value="Burak Şirin">Burak Şirin</option>
			<option value="Arzu Uz">Arzu Uz</option>
			<option value="Tuncay Serbest">Tuncay Serbest</option>
			<option value="Hakan Haşal">Hakan Haşal</option>
			<option value="İsmigül Özgür">İsmigül Özgür</option>
		</optgroup>
		<optgroup label="Finans / Muhasbe / İnsan Kaynakları Departmanı">
			<option value="Erdem Besler">Erdem Besler</option>
			<option value="Selma Sever">Selma Sever</option>
			<option value="Şahinde Demir">Şahinde Demir</option>
			<option value="Melek Özçelik">Melek Özçelik</option>
			<option value="Gamze Doğru Özkan">Gamze Doğru Özkan</option>
			<option value="Arda Alpay">Arda Alpay</option>
			<option value="Müge Demir">Müge Demir</option>
		</optgroup>
		<optgroup label="Satın Alma Departmanı">
			<option value="Fatih Sağır">Fatih Sağır</option>
			<option value="İbrahim Oyalı">İbrahim Oyalı</option>
			<option value="Deniz Fidan">Deniz Fidan</option>
			<option value="İpek Kaypak">İpek Kaypak</option>
			<option value="Recep Çağman">Recep Çağman</option>
			<option value="Recai Akça">Recai Akça</option>
		</optgroup>
		<optgroup label="Operasyon Departmanı">
			<option value="Mustafa Çam">Mustafa Çam</option>
			<option value="Emin Üstüner">Emin Üstüner</option>
			<option value="Aziz Tunç">Aziz Tunç</option>
			<option value="Bülent Şener">Bülent Şener</option>
			<option value="İmdat Kara">İmdat Kara</option>
			<option value="Erkan Çeliker">Erkan Çeliker</option>
			<option value="Güven Kara">Güven Kara</option>
			<option value="Görkem Saraç">Görkem Saraç</option>	
		</optgroup>
		<optgroup label="QHSE">
			<option value="Kübra Karaöz">Kübra Karaöz</option>
		</optgroup>
		<optgroup label="ARGE">
			<option value="Şener Keskin">Şener Keskin</option>
			<option value="Hasan Çınar">Hasan Çınar</option>
			<option value="Hamdi Korkmaz">Hasan Çınar</option>
		</optgroup>
		<optgroup label="Bilgi İşlem">
			<option value="İbrahim Batı">İbrahim Batı</option>
		</optgroup>
	</select><br><br>
	Teslim Tarihi: <input type="date" required="" value="<?php echo date("Y-m-d"); ?>" name="doc_delivered_date" value="<?php echo $generaltake['doc_delivered_date'] ?>"><br><br>
	Teslim Saati: <input type="time" required="" value="<?php echo date("H:i"); ?>" name="doc_delivered_time"><br><br>
	<button type="submit" name="updateprocess">Evrak kayıt bilgilerini güncelle</button>
	<button type="submit" name="cancelprocess">İşlemi iptal et</button>
</form>
<br>

<body>
</body>
</html>
