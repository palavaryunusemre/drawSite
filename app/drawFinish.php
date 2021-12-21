<?php
function cekilisBitir($kacKisi)
{

	include 'core/settings.php';
	include 'app/participant.php';

	mysqli_query($conn, "TRUNCATE TABLE `kazananlar`");

	$katilimcilar = [];
	$kazananlar   = [];


	$sql="SELECT * FROM katilimcilar";
	$sorgu= mysqli_query($conn,$sql);
	$katilimciSay = mysqli_num_rows($sorgu);
	while($yaz = mysqli_fetch_object($sorgu))
	{
		for($i=1;$i<=$yaz->hak;$i++)
		{
			$katilimcilar[] = $yaz->katilimci;
		}
	}
	if(count($katilimcilar)>0)
	{
		if(is_countable($katilimcilar) >= is_countable($kacKisi))
		{
			shuffle($katilimcilar);
			for($i=1;$i<=$kacKisi; )
			{
				$rastgeleSec = array_rand($katilimcilar);
				$katilimci = $katilimcilar[$rastgeleSec];
				if(!in_array($katilimci,$kazananlar))
				{
					$kazananlar[] = $katilimci;

					$i++;
				}
			}
		}

		foreach($kazananlar as $kazanan)
		{
			mysqli_query($conn,"INSERT INTO kazananlar VALUES (null,'$kazanan')");
		}
		if(is_countable($kazananlar) > 0){?>
			<h2>Kazananlar</h2>
			<ul>
				<?php
				foreach($kazananlar as $kazanan)
				{
					echo '<li>'.$kazanan.'</li>';
				}
			}?>
			</ul>

	<?php }
	else
	{ ?>
		<div class="alert alert-danger" role="alert">
			Katılımcı yok!
		</div>
	<?php }
} ?>
