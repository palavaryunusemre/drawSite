<?php
function katilimciEkle()
{
	include 'core/settings.php';

	$katilimciAdi 	= preg_replace('#([^0-9a-zA-Z ])#','',$_POST['isim']);
	$hak 			= intval($_POST['hak']);
	if(!empty($katilimciAdi) && !empty($hak))
	{
		
		$sql="INSERT INTO katilimcilar VALUES (null,'$katilimciAdi','$hak')";
		$stmt = mysqli_query($conn,$sql);
		if($stmt)
		{
			echo "Katılımcı başarıyla eklendi.";
		}
		else
		{
			echo "Eklemede sorun oluştu. Lütfen katılımcı adını kontrol ediniz. Katılımcı adı mevcut";
		}
		mysqli_close($conn);
	}

	else
	{
		echo "Hiç bir alan boş bırakılamaz.";
	}
}
