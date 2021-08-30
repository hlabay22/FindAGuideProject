<?php  
 if(isset($_POST["traveller_email"]))  
 {  
     $output=''; 
     $db_user = "root";
     $db_pass ="";
     $db_name = "useraccounts";
     $db_port = 3308;
     $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);
     $result = $mysqli->query("SELECT * FROM travellerusers WHERE email = '".$_POST["traveller_email"]."'");
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["firstName"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Phone</label></td>  
                     <td width="70%"><a href="tel:'.$row["phone"].'"><img src="phone.png" width="20" height="20" /></a>'  .$row["phone"].'</td>  
                </tr>  
                 <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Gender</label></td>  
                     <td width="70%">'.$row["gender"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>City</label></td>  
                     <td width="70%">'.$row["city"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Date of birth</label></td>  
                     <td width="70%">'.$row["dob"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Country</label></td>  
                     <td width="70%">'.$row["country"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Languges</label></td>  
                     <td width="70%">'.$row["lang1"].', '.$row["lang2"].', '.$row["lang3"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>travel Styles</label></td>  
                     <td width="70%">'.$row["travelStyle1"].', '.$row["travelStyle2"].', '.$row["travelStyle3"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Transportation Type</label></td>  
                     <td width="70%">'.$row["transportationType"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>About Me</label></td>  
                     <td width="70%">'.$row["aboutMe"].'</td>  
                </tr>  
                <tr>  
                <td width="30%"><label>Email Notification</label></td>  
                <td width="70%">'.$row["emailNots"].' </td>  
           </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }
 ?>