<?php
    include ('sambungan.php');
?>

<link rel="stylesheet" href="senarai.css">
<table>
    <caption>SENARAI SOALAN</caption>
    <tr>
        <th>ID Soalan</th>
        <th>Soalan</th>
        <th>Pilihan A</th>
        <th>Pilihan B</th>
        <th>Pilihan C</th>
        <th>Jawapan</th>
        <th>Guru</th>
    </tr>

    <?php
        $sql = 'select * from soalan join guru on soalan.idguru = guru.idguru';
        $result = mysqli_query($sambungan, $sql);
        while($soalan = mysqli_fetch_array($result)) {
         echo '<tr> <td>'.$soalan["idsoalan"].'</td>
                    <td>'.$soalan["soalan"].'</td>
                    <td>'.$soalan["pilihan_a"].'</td>
                    <td>'.$soalan["pilihan_b"].'</td>
                    <td>'.$soalan["pilihan_c"].'</td>
                    <td>'.$soalan["jawapan"].'</td>
                    <td>'.$soalan["namaguru"].'</td></tr>';
        }
    ?>
</table>