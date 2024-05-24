<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from materials where id=$id";
        $con->query($sql);
    }
    header('location:materials.php');
    exit;
?>