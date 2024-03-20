<?php
//ket noi database
    $servername = "localhost";
    $username = "root";
    $password ="";
    $db = "quanlihanghoa";
    
    $conn = new mysqli($servername, $username, $password, $db);
    if ($conn->connect_error)
        {
            die ('chua duoc ket noi: ' . $conn -> connect_error);
        }
?>