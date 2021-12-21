<?php
function cekilisSifirla()
{

	include 'core/settings.php';
	if($_POST['sifirla'] == 'sifirla')
	{
		
		mysqli_query($conn, "TRUNCATE TABLE `kazananlar`");
	}

}



 ?>
