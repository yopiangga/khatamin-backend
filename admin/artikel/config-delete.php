<?php 
    include './../../config/conn.php';
    
    $id = $_GET['id'];
    $sql = "DELETE FROM artikel WHERE id=$id";
    $query = mysqli_query($conn, $sql);

    if($query){
        header('Location: ./read-article.php');
    } else 
        echo "gagal delete";
?>