<?php
$roomname = $_GET['roomname'];

include 'db_connect.php';

$sql = "SELECT * from rooms where roomname = '$roomname'";
$result = mysqli_query($conn, $sql);
if ($result) {
    if (mysqli_num_rows($result) == 0) {
        $message = "This room does not exists.Try creating a new one";
        echo "<script>
        alert('$message'); 
        window.location.href='home.html';
        </script>";
    }
} else {
    echo "ERROR: " . mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chat Box</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body {
            margin: 0 auto;
            max-width: 800px;
            padding: 0 20px;
        }

        .container {
            border: 2px solid #dedede;
            background-color: #f1f1f1;
            border-radius: 5px;
            padding: 10px;
            margin: 10px 0;
        }

        .darker {
            border-color: #ccc;
            background-color: #ddd;
        }

        .container::after {
            content: "";
            clear: both;
            display: table;
        }

        .container img {
            float: left;
            max-width: 60px;
            width: 100%;
            margin-right: 20px;
            border-radius: 50%;
        }

        .container img.right {
            float: right;
            margin-left: 20px;
            margin-right: 0;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

        .time-left {
            float: left;
            color: #999;
        }

        .anyclass {
            height: 350px;
            overflow-y: scroll;

        }
    </style>
</head>

<body class="text-bg-dark">
    <header>
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center text-light text-decoration-none">
                <span class="fs-4">MyAnonymousChat.com</span>
            </a>
        </div>
    </header>

    <h2 class="text-center">Chat Messages</h2>
    <h3 class="text-center">Room Name: <?php echo $roomname ?> </h3>

    <div class="container text-left" id="container">
        <div class="anyclass" id="anyclass">
        </div>
    </div>
    <div class="text-center">
        <input type="text" class="form-control" name="usermsg" id="usermsg" placeholder="Add message here"><br>
        <button type=submit class="btn btn-secondary " name="submitmsg" id="submitmsg">Send</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jQuery/3.3.1/jQuery.min.js"></script>
    <script>

        var input = document.getElementById("usermsg");
        input.addEventListener("keypress", function (event) {
            if (event.key === "Enter") {
                event.preventDefault();
                document.getElementById("submitmsg").click();
            }
        });

        $("#submitmsg").click(function () {
            var clientmsg = $("#usermsg").val();
            $.post("postmsg.php", { text: clientmsg, room: '<?php echo "$roomname"; ?>', ip: '<?php echo $_SERVER['REMOTE_ADDR'] ?>' },
                function (data, status) {
                    document.getElementsByClassName('anyclass')[0].innerHTML = data;
                });
            $('#usermsg').val("");
            return false;
        });

        setInterval(runFunction, 1000);
        function runFunction() {
            $('#anyclass').scrollTop($('#anyclass')[0].scrollHeight);
            $.post("htcont.php", { room: '<?php echo "$roomname"; ?>' },
                function (data, status) {
                    document.getElementsByClassName('anyclass')[0].innerHTML = data;
                }
            )
           
        }



    </script>
</body>

</html>