 <?php
 session_start();
 require_once 'baglanti.php';

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

if (isset($_POST['hakkimizdakaydet'])) {

if ($_FILES['resim'] ["size"]>0) {

	$uploads_dir='../resimler/hakkimizda';
	@$tmp_name=$_FILES['resim'] ["tmp_name"];
	@$name=$_FILES['resim'] ["name"];

	$sayi=rand(1,100000000);
	$sayi2=rand(1,100000000);
	$sayi3=rand(10000,200000000);

	$sayilar=$sayi.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;


	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

	$duzenle=$baglanti->prepare("UPDATE hakkimizda SET 



		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_detay=:hakkimizda_detay,
		hakkimizda_misyon=:hakkimizda_misyon,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_resim=:hakkimizda_resim


	WHERE hakkimizda_id =1

		");

	$update=$duzenle->execute(array(



		'hakkimizda_baslik'=>$_POST['baslik'],
		
		'hakkimizda_detay'=>$_POST['detay'],

		'hakkimizda_misyon'=>$_POST['misyon'],

		'hakkimizda_vizyon'=>$_POST['vizyon'],

		'hakkimizda_resim'=>$resimyolu


	));

	if ($update) {

	$resimsil=$_POST['eskiresim'];

	unlink("../resimler/hakkimizda/$resimsil");
	
	header("Location:../hakkimizda.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../hakkimizda.php?yuklenme=basarisiz");
	}
	







}else{
	$duzenle=$baglanti->prepare("UPDATE hakkimizda SET 



		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_detay=:hakkimizda_detay,
		hakkimizda_misyon=:hakkimizda_misyon,
		hakkimizda_vizyon=:hakkimizda_vizyon
		


	WHERE hakkimizda_id =1

		");

	$update=$duzenle->execute(array(



		'hakkimizda_baslik'=>$_POST['baslik'],
		
		'hakkimizda_detay'=>$_POST['detay'],

		'hakkimizda_misyon'=>$_POST['misyon'],

		'hakkimizda_vizyon'=>$_POST['vizyon']

		


	));

	if ($update) {
	
	header("Location:../hakkimizda.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../hakkimizda.php?yuklenme=basarisiz");
	}
}



}

if (isset($_POST['girisyap'])) {
	
$kadi=htmlspecialchars($_POST['kadi']); //guvenli hale getiriyor
$sifre=htmlspecialchars($_POST['sifre']);
$sifreguclu=md5($sifre); //md5 formati. sifreyi karmasiklastiriyor

$kullanicisor=$baglanti->prepare("SELECT * from kullanici WHERE kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre");

$kullanicisor->execute(array(
'kullanici_adi'=>$kadi,
'kullanici_sifre'=>$sifreguclu



));


$var=$kullanicisor->rowCount();	// boyle bir kullanici varsa 1 yazdiriyor. 

if ($var >0) {
$_SESSION['girisbelgesi']=$kadi;
Header("Location:../index?durum=hosgeldin");
}else
{
Header("Location:../login?durum=hata");
}




}

if (isset($_POST['uyelerkaydet'])) {

	$kadi=htmlspecialchars($_POST['kadi']); //guvenli hale getiriyor
	$sifre=htmlspecialchars($_POST['sifre']);
	$adsoyad=htmlspecialchars($_POST['adsoyad']);
	$sifreguclu=md5($sifre); 

	$kullanicisor=$baglanti->prepare("SELECT * from kullanici where kullanici_adi=:kullanici_adi");

	$kullanicisor->execute(array(
	'kullanici_adi'=>$kadi
	



));


	$var=$kullanicisor->rowCount();	// boyle bir kullanici varsa 1 yazdiriyor. 

	if ($var>0) {
		Header("Location:../uyeler-ekle?yuklenme=kullanicivar");
		# code...
	}else{
		echo "kullanici yok";
	
	



	$uploads_dir='../resimler/kullanici';
	@$tmp_name=$_FILES['resim'] ["tmp_name"];
	@$name=$_FILES['resim'] ["name"];

	$sayi=rand(1,100000000);
	$sayi2=rand(1,100000000);
	$sayi3=rand(10000,200000000);

	$sayilar=$sayi.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;


	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

	
	
	$kullanicikaydet=$baglanti->prepare("INSERT into kullanici SET 



		kullanici_adi=:kullanici_adi,
		kullanici_sifre=:kullanici_sifre,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_yetki=:kullanici_yetki,
		kullanici_resim=:kullanici_resim
		

		");

	$insert=$kullanicikaydet->execute(array(



		'kullanici_adi'=>$kadi,
		
		'kullanici_sifre'=>$sifreguclu,

		'kullanici_adsoyad'=>$adsoyad,

		'kullanici_yetki'=>2,
		'kullanici_resim'=>$resimyolu

		


	));

	if ($insert) {
	
	header("Location:../uyeler?yuklenme=basarili");

	}
	else
	{
	header("Location:../uyeler?yuklenme=basarisiz");
	}
}
}

if (isset($_GET['kullanicisil'])) {



	$kullanicisil=$baglanti->prepare("DELETE from kullanici where kullanici_id=:kullanici_id");

	$kullanicisil->execute(array(
		'kullanici_id'=>$_GET['id']

	));

	

	if ($kullanicisil) {
		Header('Location:../uyeler?durum=basarili');
	}else
	{
		Header('Location:../uyeler?durum=basarisiz');
	}
	
}

if (isset($_POST['kategorikaydet'])) {
	
	$kategorikaydet=$baglanti->prepare("INSERT into kategori SET 



		kategori_adi=:kategori_adi,
		kategori_sira=:kategori_sira,
		kategori_durum=:kategori_durum
		

		");

	$insert=$kategorikaydet->execute(array(



		'kategori_adi'=>$_POST['katadi'],
		
		'kategori_sira'=>$_POST['sira'],

		'kategori_durum'=>$_POST['kategoridurum']

		
		


	));

	if ($insert) {
	
	header("Location:../kategori?yuklenme=basarili");

	}
	else
	{
	header("Location:../kategori?yuklenme=basarisiz");
	}
}

if (isset($_POST['kategoriduzenle'])) {
	$kat=$_POST['katid'];

	$duzenle=$baglanti->prepare("UPDATE kategori SET 


		kategori_adi=:kategori_adi,
		kategori_sira=:kategori_sira,
		kategori_durum=:kategori_durum

	WHERE kategori_id =$kat
		");

	$update=$duzenle->execute(array(



		'kategori_adi'=>$_POST['katadi'],
		
		'kategori_sira'=>$_POST['sira'],

		'kategori_durum'=>$_POST['kategoridurum']


	));

	if ($update) {
	
	header("Location:../kategori.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../kategori.php?yuklenme=basarisiz");
	}
}


if (isset($_GET['kategorisil'])) {



	$kategorisil=$baglanti->prepare("DELETE from kategori where kategori_id=:kategori_id");

	$kategorisil->execute(array(
		'kategori_id'=>$_GET['id']

	));

	

	if ($kategorisil) {
		Header('Location:../kategori?yuklenme=basarili');
	}else
	{
		Header('Location:../kategori?yuklenme=basarisiz');
	}
	
}






if (isset($_POST['sliderkaydet'])) {

	$uploads_dir='../resimler/slider';
	@$tmp_name=$_FILES['slideresim'] ["tmp_name"];
	@$name=$_FILES['slideresim'] ["name"];

	$sayi=rand(1,100000000);
	$sayi2=rand(1,100000000);
	$sayi3=rand(10000,200000000);

	$sayilar=$sayi.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;


	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
	
	$sliderkaydet=$baglanti->prepare("INSERT into slider SET 



		slider_baslik=:slider_baslik,
		slider_aciklama=:slider_aciklama,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_button=:slider_button,
		slider_durum=:slider_durum,
		slider_banner=:slider_banner,
		slider_resim=:slider_resim
		

		");

	$insert=$sliderkaydet->execute(array(



		'slider_baslik'=>$_POST['sliderbaslik'],
		'slider_aciklama'=>$_POST['slideraciklama'],
		'slider_sira'=>$_POST['slidersira'],
		'slider_link'=>$_POST['sliderlink'],
		'slider_button'=>$_POST['sliderbutton'],
		'slider_durum'=>$_POST['sliderdurum'],
		'slider_banner'=>$_POST['sliderbanner'],
		'slider_resim'=>$resimyolu

		
		


	));

	if ($insert) {
	
	header("Location:../slider?yuklenme=basarili");

	}
	else
	{
	header("Location:../slider?yuklenme=basarisiz");
	}
}

if (isset($_POST['sliderduzenle'])) {

	$slideid=$_POST['id'];


	if ($_FILES['slideresim'] ["size"]>0) {
	$uploads_dir='../resimler/slider';
	@$tmp_name=$_FILES['slideresim'] ["tmp_name"];
	@$name=$_FILES['slideresim'] ["name"];

	$sayi=rand(1,100000000);
	$sayi2=rand(1,100000000);
	$sayi3=rand(10000,200000000);

	$sayilar=$sayi.$sayi2.$sayi3;
	$resimyolu=$sayilar.$name;


	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


	

	$duzenle=$baglanti->prepare("UPDATE slider SET 


		slider_baslik=:slider_baslik,
		slider_aciklama=:slider_aciklama,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_button=:slider_button,
		slider_durum=:slider_durum,
		slider_banner=:slider_banner,
		slider_resim=:slider_resim

	WHERE slider_id =$slideid
		");

	$update=$duzenle->execute(array(



		'slider_baslik'=>$_POST['sliderbaslik'],
		'slider_aciklama'=>$_POST['slideraciklama'],
		'slider_sira'=>$_POST['slidersira'],
		'slider_link'=>$_POST['sliderlink'],
		'slider_button'=>$_POST['sliderbutton'],
		'slider_durum'=>$_POST['sliderdurum'],
		'slider_banner'=>$_POST['sliderbanner'],
		'slider_resim'=>$resimyolu


	));

	if ($update) {

	$resimsil=$_POST['eskiresim'];

	unlink("../resimler/slider/$resimsil");
	
	header("Location:../slider.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../slider.php?yuklenme=basarisiz");
	}

}else
{
	$duzenle=$baglanti->prepare("UPDATE slider SET 


		slider_baslik=:slider_baslik,
		slider_aciklama=:slider_aciklama,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_button=:slider_button,
		slider_durum=:slider_durum,
		slider_banner=:slider_banner
		

	WHERE slider_id =$slideid
		");

	$update=$duzenle->execute(array(



		'slider_baslik'=>$_POST['sliderbaslik'],
		'slider_aciklama'=>$_POST['slideraciklama'],
		'slider_sira'=>$_POST['slidersira'],
		'slider_link'=>$_POST['sliderlink'],
		'slider_button'=>$_POST['sliderbutton'],
		'slider_durum'=>$_POST['sliderdurum'],
		'slider_banner'=>$_POST['sliderbanner']


	));

	if ($update) {
	
	header("Location:../slider.php?yuklenme=basarili");

	}
	else
	{
	header("Location:../slider.php?yuklenme=basarisiz");
	}
}
}


if (isset($_POST['slidersil'])) {



	$slidersil=$baglanti->prepare("DELETE from slider where slider_id=:slider_id");

	$slidersil->execute(array(
		'slider_id'=>$_POST['id']

	));

	

	if ($slidersil) {
		echo $_POST['resim'];
		
		$resimsil=$_POST['resim'];

		unlink("../resimler/slider/$resimsil");
		Header('Location:../slider?yuklenme=basarili');
	}else
	{
		Header('Location:../slider?yuklenme=basarisiz');
	}
	
}














