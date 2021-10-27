<?php
    include("sambungan.php");

    $idsoalan = $_POST["idsoalan"];

    $sql = "delete from soalan where idsoalan = '$idsoalan' ";
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