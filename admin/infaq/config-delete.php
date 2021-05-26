<?php 
    include './../../config/conn.php';
    
    $id = $_GET['id'];
    $sql = "DELETE FROM infaq WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    if($query){
        header('Location: ./konfirmasi-infaq.php');
    } else 
        echo "gagal delete";
?>