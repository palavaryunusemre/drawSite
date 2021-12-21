<?php

if (isset($_GET['sil']))
{
	require_once dirname( __DIR__ ) . '/core/settings.php';
	$id=$_GET['sil'];
	if($id)
		{
			if(!empty($id))
			{
				$sql = "DELETE FROM katilimcilar WHERE id=$id";

				if (mysqli_query($conn, $sql))
				{
	  			echo "silme işlemi başarılı";
				}
				else
				{
	  			echo "silme işlemi esnasında sorun oluştu: " . mysqli_error($conn);
				}
				mysqli_close($conn);
			}


		}
		header('Location: ' . $_SERVER['HTTP_REFERER']);

}



 ?>
