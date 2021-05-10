<?php

require_once 'Admin/islem/baglanti.php';

if (isset($_POST['login'])) {
		
$kadi=htmlspecialchars($_POST['kadi']); //guvenli hale getiriyor
$sifre=htmlspecialchars($_POST['sifre']);
$sifreguclu=md5($sifre); //md5 formati. sifreyi karmasiklastiriyor

$kullanicisor=$baglanti->prepare("SELECT * from kullanici WHERE kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre and kullanici_yetki=:kullanici_yetki");

$kullanicisor->execute(array(
'kullanici_adi'=>$kadi,
'kullanici_sifre'=>$sifreguclu,
'kullanici_yetki'=>1



));


$var=$kullanicisor->rowCount();	// boyle bir kullanici varsa 1 yazdiriyor. 

if ($var >0) {
$_SESSION['normalgiris']=$kadi;
Header("Location:index?durum=hosgeldin");
}else
{
Header("Location:giris?durum=hata");
}
}


if (isset($_POST['register'])) {
	
	$kadi=htmlspecialchars($_POST['kadi']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$sifreiki=htmlspecialchars($_POST['sifretekrar']);
	$mail=htmlspecialchars($_POST['email']);
	$adsoyad=htmlspecialchars($_POST['adsoyad']);


	$kullanicisor=$baglanti->prepare("SELECT * from kullanici where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki");

	$kullanicisor->execute(array(
	'kullanici_adi'=>$kadi,
	'kullanici_yetki'=>1



));


	$var=$kullanicisor->rowCount();	// boyle bir kullanici varsa 1 yazdiriyor. 


	if ($var > 0) {
		Header("Location:giris?durum=kullanicivar");
	}else{
		if ($sifre == $sifreiki) {
			
			if (strlen($sifre)>=8) {
				
$kullanicikaydet=$baglanti->prepare("INSERT into kullanici SET 



		kullanici_adi=:kullanici_adi,
		kullanici_sifre=:kullanici_sifre,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_yetki=:kullanici_yetki,
		kullanici_mail=:kullanici_mail
		

		");

	$insert=$kullanicikaydet->execute(array(

		'kullanici_adi'=>$kadi,
		'kullanici_sifre'=>$sifre,
		'kullanici_adsoyad'=>$adsoyad,
		'kullanici_yetki'=>1,
		'kullanici_mail'=>$mail

	));

	if ($insert) {
	
	header("Location:kullanici?durum=basarili");

	}
	else
	{
	header("Location:diris?durum=basarisiz");
	}









			}else
			{
				Header("Location:giris?durum=sifreeksik");
			}

		}else
		{
			Header("Location:giris?durum=sifrehata");
		}
	}
}







?>