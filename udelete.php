<?php
    include "connection.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "DELETE from usertable where id=$id";
        $con->query($sql);
    }
    header('location:users.php');
    exit;
?>