 <?php require_once 'baglanti.php';

if (isset($_POST['ayarkaydet'])) {



	$duzenle=$baglanti->prepare("UPDATE ayarlar SET 



		baslik=:baslik,
		aciklama=:aciklama,
		anahtarkelime=:anahtarkelime

	WHERE id =1

		");

	$update=$duzenle->execute(array(



		'baslik'=>$_POST['baslik'],
		
		'anahtarkelime'=>$_POST['anahtarkelime'],

		'aciklama'=>$_POST['aciklama']


	));

	if ($update) {
	
	header("Location:../ayarlar.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../ayarlar.php?yuklenme=basarisiz");
	}




}

if (isset($_POST['iletisimkaydet'])) {



	$duzenle=$baglanti->prepare("UPDATE ayarlar SET 



		telefon=:telefon,
		email=:email,
		adres=:adres,
		mesai=:mesai


	WHERE id =1

		");

	$update=$duzenle->execute(array(



		'telefon'=>$_POST['telefon'],
		
		'email'=>$_POST['email'],

		'adres'=>$_POST['adres'],

		'mesai'=>$_POST['mesai']


	));

	if ($update) {
	
	header("Location:../iletisim.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../iletisim.php?yuklenme=basarisiz");
	}




}

if (isset($_POST['sosyalmedyakaydet'])) {



	$duzenle=$baglanti->prepare("UPDATE ayarlar SET 



		facebook=:facebook,
		instagram=:instagram,
		twitter=:twitter,
		youtube=:youtube


	WHERE id =1

		");

	$update=$duzenle->execute(array(



		'facebook'=>$_POST['facebook'],
		
		'instagram'=>$_POST['instagram'],

		'twitter'=>$_POST['twitter'],

		'youtube'=>$_POST['youtube']


	));

	if ($update) {
	
	header("Location:../sosyalmedya.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../sosyalmedya.php?yuklenme=basarisiz");
	}




}
















