<?php
    header('Access-Control-Allow-Origin: *');
    $a = explode("/", $_SERVER['REQUEST_URI']);

    $conn = mysqli_connect("localhost", "root", "", "lcuAcademy");
    $sql = "SELECT * FROM student WHERE sid =" . $a[5];
    $result = mysqli_query($conn, $sql);

    $x = mysqli_fetch_assoc($result);
    echo json_encode($x);

?>

