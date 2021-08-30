
<?php

//include "dbConn.php"; // Using database connection file here
$db_user = "root";
$db_pass ="";
$db_name = "useraccounts";
$db_port = 3308;
$mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);
$email = $_GET['id']; // get id through query string

$result = $mysqli->query("SELECT * FROM travellerusers WHERE email = '$email'");

$email = $_GET['id']; // get id through query string

while($data = mysqli_fetch_array($result))
{

}
?>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content" >
    <span class="close">&times;</span>
    <p>
    <b>Name: </b> <?php echo $data['firstName'],' ',$data['lastName'] ; ?><br>
    <b>Phone: </b> <?php echo $data['phone']; ?><br>
    <!-- <b>City: </b> <?php echo $city .", ".$country ?><br>
    <b>Language(s): </b> <?php echo $guideLang1 .", ".$guideLang2.", ".$guideLang3 ?><br>
    <b>Travel Styles:</b> <?php echo $guideTravelStyle1 .", ".$guideTravelStyle2.", ".$guideTravelStyle3 ?><br>
    <b>Date Of Birth: </b><?php echo  $guideDate ?><br>
    <b>Gender: </b> <?php echo  $guideGender ?><br>
    <b>Transportation Type: </b> <?php echo  $guideTransport ?><br>
    <b>About : </b> <?php echo  $guideAbout ?><br>
    <br>
    <b>Image :</b> 
    <img src="data:image/jpeg;base64,<?php echo base64_encode( $guideImage) ?>" width=200 height=200/> -->
    </p>
  </div>
  
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>












