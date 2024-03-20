<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //lay data form
    $e =  $_POST['email'];
    $p =  $_POST['password'];

    include '../connectdb.php';
   
    //thuc thi truy van
    $query = "SELECT *FROM Account WHERE email ='$e' AND pass ='$p' ";

    $result = $conn->query($query);

    if($result->num_rows == 1){
        //thanh cong
        header("Location: ../index/index.php");
        exit();
    }
    else{
        //that bai
        header("Location: login.php");
        exit();
    }

}
?>