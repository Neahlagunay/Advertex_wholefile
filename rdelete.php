<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from requestor where id=$id";
        $con->query($sql);
    }
    header('location:requestor.php');
    exit;
?>