
<?php
include './../../config/conn.php';

$id = $_GET['id'];
$nominal = $_GET['nominal'];
$sql = "UPDATE infaq set status=1 WHERE id=$id";
$query = mysqli_query($conn, $sql);

if ($query) {
    $time = time();
    $sqlDana = "INSERT INTO danamasuk (nominal, created) VALUES ('$nominal', '$time')";
    $queryDana = mysqli_query($conn, $sqlDana);
    if (!$queryDana)
        echo "gagal";
    else
        header("location: ./konfirmasi-infaq.php");
}

?>
