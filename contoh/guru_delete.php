<?php
    include( "sambungan.php" );

    $idguru = $_POST["idguru"];
    $sql = "delete from guru where idguru = '$idguru' ";
	$result = mysqli_query($sambungan, $sql);	
	if ($result == true) {
		$bilrekod = mysqli_affected_rows($sambungan);
		if ($bilrekod > 0)
			echo "Rekod berjaya dipadam";
		else
			echo "Tidak berjaya padam. Rekod tidak ada dalam jadual";
	}
	else
		echo "Ralat : $sql<br>".mysqli_error($sambungan);
?>
