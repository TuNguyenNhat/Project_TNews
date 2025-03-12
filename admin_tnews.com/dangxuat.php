<?php
    include('includes/session.php');

    if(isset($_POST['dangxuat']))
    {
        session_unset();
        session_destroy();
        header("Location: dangnhap.php");
    }
?>