<?php
    include("sambungan.php");

    $idguru = $_POST["idguru"];
    $namaguru = $_POST["namaguru"];
    $password = $_POST["password"];

    $sql = "update guru set namaguru = '$namaguru', passwordguru='$password' where idguru = '$idguru'";

    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "Berjaya kemaskini";
    else
        echo "Ralat : $sql<br>".mysqli_error($sambungan);
?>