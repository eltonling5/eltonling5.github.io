<?php
  include ('sambungan.php');
?>

<link rel="stylesheet" href="senarai.css">
<table>
    <caption>SENARAI KELAS</caption>
    <tr>
        <th>ID Kelas</th>
        <th>Kelas</th>
    </tr>
    <?php
        $sql = 'select * from kelas';
        $result = mysqli_query($sambungan, $sql);
        while($kelas = mysqli_fetch_array($result)) {
         echo '<tr> <td>'.$kelas["idkelas"].'</td>
                    <td>'.$kelas["namakelas"].'</td>
               </tr>';
        }
    ?>
</table>