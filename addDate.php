<?php
session_start();
$email=($_SESSION['user_log']);
$date=$_POST['date'];

echo $email,$date;
$db_user = "root";
$db_pass ="";
$db_name = "useraccounts";
$db_port = 3308;
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);

$sql = "INSERT INTO `unavailabledates`(`guide_email`, `guide_date`) VALUES ('$email','$date')";
          if ($mysqli->query($sql) === TRUE) {
            echo "<script>
            alert('$date add sucsessfully!');
            window.location.href='indexR.php';
            </script>";
        }
        else{
            echo "<script>
            alert('Error, date not add' please try again');
            window.location.href='indexR.php';
            </script>";
        }

?>