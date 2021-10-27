<?php
    include("sambungan.php");

    $idpelajar = $_POST["idpelajar"];

    $sql = "delete from pelajar where idpelajar = '$idpelajar' ";
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