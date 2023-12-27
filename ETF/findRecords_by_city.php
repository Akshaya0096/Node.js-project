<?php
    header('Access-Control-Allow-Origin: *');
    $a = explode("/", $_SERVER['REQUEST_URI']);

    $conn = mysqli_connect("localhost", "root", "", "lcuAcademy");
    $sql = "SELECT * FROM student WHERE nearCity ='". $a[5]."'";
    $result = mysqli_query($conn, $sql);

    $x = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $x[] = $row;
    }
    echo json_encode($x);

?>