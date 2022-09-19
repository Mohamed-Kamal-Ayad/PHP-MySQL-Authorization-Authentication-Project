<?php
include '../shared/header.php';
function testMessage($conn, $message)
{
    if ($conn)
    {
        echo " <div class='alert alert-success col-4 mx-auto'>
        $message Done Successfuly
        </div>";
    }
    else
    {
        echo " <div class='alert alert-danger col-4 mx-auto'>
        $message Falied Proccess
        </div>";
    }
}
function auth($num1 = "", $num2 ="" , $num3 ="")
{
    if ($_SESSION['adminID'])
    {
        if ($_SESSION['adminRole'] == $num1 || $_SESSION['adminRole'] == $num2
            || $_SESSION['adminRole'] == $num3) {} else {
            header("location: /authproject/404.php");
        }
    }
    else
        {
            header("location:/authproject/auth/login.php");
        }

}


