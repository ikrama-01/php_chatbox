<?php
    $conn = mysqli_connect("localhost","root","","chatroom");

    if(!$conn)
    {
        die("Can't Connect to the Database".mysqli_connect_error());
    
    }  
?>