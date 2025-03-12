<?php 
    $db_Servername = "localhost";
    $db_Username = "root";
    $db_Password = "";
    $db_Name = "tnews";

    $conn = mysqli_connect($db_Servername, $db_Username, $db_Password, $db_Name);
    if(!$conn)
    {
        die("Ket noi khong thanh cong" . mysqli_connect_errno());
    }
?>