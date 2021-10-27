<?php
    include ('sambungan.php');
?>

<link rel="stylesheet" href="senarai.css">
<table>
    <caption>SENARAI NAMA PELAJAR</caption>
    <tr>
        <th>NoKP</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Password</th>
    </tr>

    <?php
        $sql = 'select * from pelajar join kelas on pelajar.idkelas = kelas.idkelas';
        $result = mysqli_query($sambungan, $sql);
        while($pelajar = mysqli_fetch_array($result)) {
         echo '<tr> <td>'.$pelajar["idpelajar"].'</td>
                    <td>'.$pelajar["namapelajar"].'</td>
                    <td>'.$pelajar["namakelas"].'</td>
                    <td>'.$pelajar["passwordpelajar"].'</td>
               </tr>';
        }
    ?>
</table>