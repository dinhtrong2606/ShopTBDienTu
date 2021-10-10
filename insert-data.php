<?php
    require_once 'util/DBConnectionUtil.php';

    $name = $_POST['name'];
    $msg = $_POST['msg'];
    
    $sql = "INSERT INTO comment (name, content) VALUES ('$name', '$msg')";
    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        echo 1;
    }else {
        echo 0;
    }
?>