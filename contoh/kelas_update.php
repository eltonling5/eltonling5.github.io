<?php                                           
    include("sambungan.php");

    $idkelas = $_POST["idkelas"];
    $namakelas = $_POST["namakelas"];

    $sql = "update kelas set namakelas = '$namakelas' where idkelas = '$idkelas' ";

    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "Berjaya kemaskini";
    else
        echo "Ralat : $sql<br>".mysqli_error($sambungan);
?>