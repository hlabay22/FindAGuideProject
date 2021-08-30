<?php 
session_start();

$emailTraveller= $_SESSION['user_log'];
$emailGuide = $_GET['id']; // get id through query string
/////addguide to list
  $db_user = "root";
  $db_pass ="";
  $db_name = "useraccounts";
  $db_port = 3308;
  $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);
  
  if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO myguides (traveller_email, localGuide_email)
  VALUES ('$emailTraveller','$emailGuide')";
  if ($mysqli->query($sql) === TRUE) {
  header("location:myGuides.php"); // redirects to all records page
  exit;	}
//   if ($mysqli->query($sql) === TRUE) {
//     echo "<script>
//         alert('Guide insert secssesfully!');
//         window.location.href='search_auto.php';
//         </script>;"
//         ;
//           exit;
//   } else {
//     echo "Error: " . $sql . "<br>" . $mysqli->error;
//   }
  
//   $mysqli->close();
  
//   $del = $mysqli->query("INSERT INTO `myguides`(`traveller_email`, `localGuide_email`) VALUES ('$emailTraveller','$emailGuide')"); //  insert query
  
//   if($del)
//   {
//     echo "<script>
//     alert('Guide insert secssesfully!');
//     window.location.href='search_auto.php';
//     </script>;"
//     ;
//       exit;	
//   }
//   else
//   {
//       echo "Error"; // display error message if not delete
//   }
  
    


?>
