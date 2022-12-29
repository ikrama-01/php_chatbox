<?php
$room = $_POST['room'];
include 'db_connect.php';

$sql = "SELECT msgs, stime, ip from msgs where room = '$room'";
$res = "";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
    while($row = mysqli_fetch_assoc($result))
    {

            $res = $res. '<div class="container text-light text-bg-dark">';
            $res = $res. $row['ip'];
            $res = $res. " says <p>" .$row['msgs'];
            $res = $res. '</p> <span class="time-right text-light">' .$row['stime'] ."</span></div>";

    }
}
echo $res;
?>