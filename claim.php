<?php
$room = $_POST['room'];


if(strlen($room)>20 OR strlen($room)<2)
{
    $message = "please choose a room name between 2 to 20 character";
    echo "<script>
    alert('$message'); 
    window.location.href='home.html';
    </script>";
}
else if(!ctype_alnum($room))
{
    $message = "please choose an Alphanumeric room name";
    echo "<script>
    alert('$message'); 
    window.location.href='home.html';
    </script>";
}
else
{
    include 'db_connect.php';
}

$sql = "SELECT * from rooms where roomname = '$room'";
$result = mysqli_query($conn,$sql);
if($result)
{
    if(mysqli_num_rows($result)>0)
    {
        $message = "please choose an different room name.This room already exists.";
        echo "<script>
        alert('$message'); 
        window.location.href='home.html';
        </script>";
    }
    else
    {
        $sql = "INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ('$room', current_timestamp());";
        if(mysqli_query($conn,$sql))
        {
            echo ("<script language='JavaScript'>
            window.location.href='rooms.php?roomname=$room';
            window.alert('Your room is ready and you can chat now. ENJOY:)');
            </script>");
        }
     }
 }
    
else
{
    echo "ERROR: " . mysqli_error($conn);
}

?>