<?php
    include('sambungan.php');
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<link rel="stylesheet" href="senarai.css">

<table>
    <caption>SKEMA DAN KEPUTUSAN</caption>
    <tr>
        <th>Bil</th>
        <th>Soalan</th>
        <th>Skema</th>
    </tr>
    <?php
        $jumlah = 0; 
        $betul = 0;
        $idpelajar = $_SESSION['username'];
    
        $sql2 = "select idkuiz from kuiz where idpelajar = '".$idpelajar."' order by idkuiz desc limit 1";
        $id = mysqli_query($sambungan, $sql2);
        $idkuiz = mysqli_fetch_array($id)['idkuiz']; 
    
        /*$sql2 = "select idrekod from rekod order by tarikh desc limit 1";
        $id = mysqli_query($sambungan, $sql2);
        $idrekod = mysqli_fetch_array($id)['idrekod'];
        echo $idrekod;*/
    
        $sql = "select * from pilih join soalan on pilih.idsoalan = soalan.idsoalan where idkuiz = '".$idkuiz."'";
	   //echo $sql;
        $data = mysqli_query($sambungan, $sql);
        $bil = 1;          
        while ($pilih = mysqli_fetch_array($data)) {
        ?>
    <tr>
        <td class="bil"><?php echo $bil; ?></td>
        <td class="soalan">

            <?php 
            echo $pilih['soalan']."<br>"; 
            echo "A.".$pilih['pilihan_a']."<br>";
            echo "B.".$pilih['pilihan_b']."<br>";
            echo "C.".$pilih['pilihan_c']."<br>";
            ?>
        </td>
        <td class="skema">
            <?php
            echo "Jawapannya : ".$pilih['jawapan']."<br>";
            echo "Anda pilih ".$pilih['jawapanpelajar']."<br>";
            if ( $pilih['jawapanpelajar'] == $pilih['jawapan']) {
                echo "<img src='betul.png'>";
                $betul = $betul + 1;
                $sql = "update pilih set markah = '1' where idpelajar = '".$idpelajar."' AND idsoalan = '".$pilih['idsoalan']."' order by idpilih desc limit 1";
                $markah = mysqli_query($sambungan, $sql);
            }
            else
                echo "<img src='salah.png'>";
            ?>
        </td>
    </tr>
    <?php 
            $bil = $bil + 1;
            $jumlah = $jumlah + 1;
        } 
        ?>
</table>
<?php
      $peratus = $betul / $jumlah * 100;
        $salah = $jumlah - $betul;

    $sql = "update kuiz set peratus = $peratus, jumlahmarkah = $betul where idpelajar = '".$idpelajar."' order by idkuiz desc limit 1";
    //$sql = "insert into kuiz (idjawab, idpelajar, peratus) values('$idrekod', '$idpelajar', '$peratus')";
    $data = mysqli_query($sambungan, $sql);

    ?>

<table>
   <caption>KEPUTUSAN PRESTASI INDIVIDU</caption>
    <tr>
        <th class="keputusan">Perkara</th>
        <th class="keputusan">Bilangan/Peratus</th>
    </tr>
    <tr>
        <td class="keputusan">Bilangan yang betul</td>
        <td class="keputusan"><?php echo $betul ?></td>
    </tr>
    <tr>
        <td class="keputusan">Bilangan yang salah</td>
        <td class="keputusan"><?php echo $salah ?></td>
    </tr>
    <tr>
        <td class="keputusan">Jumlah soalan</td>
        <td class="keputusan"><?php echo $jumlah ?></td>
    </tr>
    <tr>
        <td class="keputusan">Jumlah markah</td>
        <td class="keputusan"><?php echo $betul."/".$jumlah ?></td>
    </tr>
    <tr>
        <td class="keputusan">Keputusan</td>
        <td class="keputusan"><?php echo number_format($peratus,0) ?> % </td>
    </tr>
</table>
<button class="ulang" type="button" onclick="window.location='jawab_mula.php'">Ulang</button>


