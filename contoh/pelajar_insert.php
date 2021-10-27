<?php
    include("sambungan.php");

if(isset($_POST['idpelajar'])) {    
    $idpelajar = $_POST["idpelajar"];
    $namapelajar = $_POST["namapelajar"];
    $idkelas = $_POST["idkelas"];
    $password = $_POST["password"];

    $sql = "insert into pelajar values('$idpelajar', '$namapelajar', '$idkelas', '$password')";
    
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "Berjaya tambah";
    else
        echo "Ralat : $sql<br>".mysqli_error($sambungan);
}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3 class="panjang">TAMBAH PELAJAR</h3>
<form class="panjang" action="pelajar_insert.php" method="post">
    <table>
        <tr>
           <td>ID Pelajar</td>
           <td><input required type = "text" name = "idpelajar" placeholder = "nokp" ></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td><input required type="text" name="namapelajar"></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td>
            <select name="idkelas">
            <?php
            $sql = "select * from kelas";
            $data = mysqli_query($sambungan, $sql);
            while ($kelas = mysqli_fetch_array($data)) {
                echo "<option value='$kelas[idkelas]'>$kelas[namakelas]</option>";		
            }
            ?>
            </select>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td><input required type="text" name="password" placeholder="max: 8 char"></td>
        </tr>
        
    </table>
    <button class="tambah" type="submit">Tambah</button>
</form>



