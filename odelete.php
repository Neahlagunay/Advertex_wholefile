<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from outgoing where id=$id";
        $con->query($sql);
    }
    header('location:outgoing.php');
    exit;
?>