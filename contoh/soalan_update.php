<?php
    include("sambungan.php");
if (isset($_POST['idsoalan'])){
    $idsoalan = $_POST["idsoalan"];
    $soalan = $_POST["soalan"];
    $pilihan_a = $_POST["pilihan_a"];
    $pilihan_b = $_POST["pilihan_b"];
    $pilihan_c = $_POST["pilihan_c"];
    $jawapan = $_POST["jawapan"];
    $idguru = $_POST["idguru"];

    $sql = "update soalan set soalan = '$soalan', pilihan_a = '$pilihan_a', pilihan_b = '$pilihan_b', pilihan_c = '$pilihan_c', jawapan = '$jawapan',  idguru = '$idguru' where idsoalan = '$idsoalan' ";
    $result = mysqli_query($sambungan, $sql);
    if ($result == true)
        echo "Berjaya kemaskini";
    else
        echo "Ralat : $sql<br>".mysqli_error($sambungan);
}
?>

<link rel="stylesheet" href="borang.css">
<link rel="stylesheet" href="button.css">
<h3 class="panjang">KEMASKINI SOALAN</h3>
<form class="panjang" action="soalan_update.php" method="post">
    <table>
        <tr>
            <td>ID Soalan</td>
            <td><input required type="text" name="idsoalan" placeholder="S001"></td>
        </tr>
        <tr>
            <td>Soalan</td>
            <td><input required type="text" name="soalan"></td>
        </tr>
        <tr>
            <td>Pilihan A</td>
            <td><input required type="text" name="pilihan_a"></td>
        </tr>
        <tr>
            <td>Pilihan B</td>
            <td><input required type="text" name="pilihan_b"></td>
        </tr>
        <tr>
            <td>Pilihan C</td>
            <td><input required type="text" name="pilihan_c"></td>
        </tr>
        <tr>
            <td>Jawapan</td>
            <td>
            <select name="jawapan">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        </tr>
        <tr>
            <td>Guru</td>
            <td>
            <select name="idguru">
                <?php
                $sql = "select * from guru";
                $data = mysqli_query($sambungan, $sql);
                while ($guru = mysqli_fetch_array($data)) {
                    echo "<option value='$guru[idguru]'>$guru[namaguru]</option>";
                }
                ?>
                </select>
        </tr>
    </table>
    <button class="update" type="submit">Update</button>
</form>