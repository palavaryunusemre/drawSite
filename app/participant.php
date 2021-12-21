<?php

$kazananlar = array();


$sql='SELECT * FROM kazananlar ASC';
$kazananSorgu= mysqli_query($conn,$sql);
if($kazananSorgu){
	while($kazananYaz = mysqli_fetch_assoc($kazananSorgu))
	{

		$kazananlar[] = $kazananYaz->katilimci;

	}
	include 'participantDelete.php';
}


 ?>
