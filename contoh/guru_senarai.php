<?php
    include ('sambungan.php');
?>

<link rel="stylesheet" href="senarai.css">
<table>
    <caption>SENARAI NAMA GURU</caption>
    <tr>
        <th>NoKP</th>
        <th>Nama</th>
        <th>Password</th>
    </tr>
    
    <?php
        $sql = 'select * from guru';
        $result = mysqli_query($sambungan, $sql);
        while($guru = mysqli_fetch_array($result)) {
        echo '<tr>  <td>'.$guru["idguru"].'</td>
                    <td>'.$guru["namaguru"].'</td>
                    <td>'.$guru["passwordguru"].'</td>
             </tr>';
        }
    ?>
</table>
