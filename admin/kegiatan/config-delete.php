<?php 
    include './../../config/conn.php';
    
    $id = $_GET['id'];
    $sql = "DELETE FROM kegiatan WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    if($query){
        header('Location: ./read-kegiatan.php');
    } else 
        echo "gagal delete";
?>