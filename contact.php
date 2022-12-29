<?php
include 'db_connect.php';
$email = $_POST['email'];
$feedback = $_POST['feedback'];
$duplicate=mysqli_query($conn,"select * from feedbacks where email ='$email'");
if($email=="" OR $feedback=="")
{
    echo "<script> 
    alert('Please fill the form.');
    location.href = 'contact.html';</script>";
}
else if(mysqli_num_rows($duplicate)>0)
{
    echo "<script> 
    alert('Feedback Form already submitted with this E-mail id please choose different E-mail id to re-submit the form.');
    location.href = 'contact.html';</script>";
}
else
{
    $sql = "INSERT INTO `feedbacks` (`email`, `feedback`) VALUES ('$email', '$feedback');";
    $result = mysqli_query($conn, $sql);

if($result)
{
    echo "<script> 
    alert('Feedback Form submitted successfully');
    location.href = 'home.html';</script>";
    exit();
}
}
?>