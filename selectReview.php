<?php  
 if(isset($_POST["guide_email"]))  
 {  
     $count=1;
     $output=''; 
     $db_user = "root";
     $db_pass ="";
     $db_name = "useraccounts";
     $db_port = 3308;
     $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);
     $result = $mysqli->query("SELECT * FROM reviews WHERE localGuide_email = '".$_POST["guide_email"]."'");
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
         
      <tr>  
           <td width="30%"><label style="color:blue;"><strong><br>Travel Num. '.$count.' Details:</strong></label></td>  
           <td width="70%"></td>  
      </tr>
           <tr>  
           <td width="30%"><label style="color:gray;">Date</label></td>  
           <td width="70%">'.$row["date"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label style="color:gray;">City</label></td>  
           <td width="70%">'.$row["city"].'</td>  
      </tr>    
      <tr>  
           <td width="30%"><label style="color:gray;">Country</label></td>  
           <td width="70%">'.$row["country"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label style="color:gray;">Rating</label></td>  
           <td width="70%">'.$row["rating"].'</td>  
      </tr>  
      <tr>  
           <td width="30%"><label style="color:gray;">Description</label></td>  
           <td width="70%">'.$row["reviewText"].'</td>  
      </tr>  
     
                ';
                $count=$count+1;
                  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }
 ?>