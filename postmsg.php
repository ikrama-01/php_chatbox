<?php
include 'db_connect.php';

$msg = $_POST['text'];
$room = $_POST['room'];
$ip = $_POST['ip'];

$sql = "INSERT into msgs(msgs,room,ip,stime) values('$msg','$room','$ip',current_timestamp());";
mysqli_query($conn, $sql);
mysqli_close($conn);
?>