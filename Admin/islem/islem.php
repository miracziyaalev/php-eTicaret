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
	echo "basarili";
	# code...
	}
	else
	{
	echo "basarisiz";
	}




}














