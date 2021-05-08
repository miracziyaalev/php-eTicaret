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

if (isset($_POST['logokaydet'])) {
	
	$uploads_dir='../resimler/logo';
	@$tmp_name=$_FILES['logo'] ["tmp_name"];
	@$name=$_FILES['logo'] ["name"];

	$sayi=rand(1,100000000);
	$sayi2=rand(1,100000000);
	$sayi3=rand(10000,200000000);

	$sayilar=$sayi.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;


	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

	$duzenle=$baglanti->prepare("UPDATE ayarlar SET 

		logo=:logo
		

	WHERE id=1

		");

	$update=$duzenle->execute(array('logo'=>$resimyolu));

	if ($update) {

	$resimsil=$_POST['eskilogo'];
	unlink("../resimler/logo/$resimsil");
	
	header("Location:../ayarlar.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../ayarlar.php?yuklenme=basarisiz");
	}






}
















