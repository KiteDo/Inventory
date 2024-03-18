<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //lay data form
    $e =  $_POST['email'];
    $p =  $_POST['password'];


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
    //thuc thi truy van
    $query = "SELECT *FROM Account WHERE email ='$e' AND pass ='$p' ";

    $result = $conn->query($query);

    if($result->num_rows == 1){
        //thanh cong
        header("Location: ../index/index.html");
        exit();
    }
    else{
        //that bai
        header("Location: login.html");
        exit();
    }

}