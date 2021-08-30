<?php  
 if(isset($_POST["guide_email"]))  
 {  
     $output=''; 
     $db_user = "root";
     $db_pass ="";
     $db_name = "useraccounts";
     $db_port = 3308;
     $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);
     $result2 = $mysqli->query("SELECT CAST(AVG(rating) AS DECIMAL(10,1)) AS avg FROM reviews WHERE localGuide_email='".$_POST["guide_email"]."'");
     $row2 = $result2->fetch_assoc();
     $result = $mysqli->query("SELECT * FROM localguideusers WHERE email = '".$_POST["guide_email"]."'");
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
           <td width="30%"><label>Rating</label></td>  
           <td width="70%"><a style="display: inline; margin-right: 2em;">'.$row2["avg"].'</a> <input type="button" name="view" value="Show Reviews" id="'.$row["email"].'" class="btn btn-info btn-xs view_data" /></td>  
      </tr>  
      <tr>  
           <td width="30%"><label>Phone</label></td>  
           <td width="70%">'.$row["phone"].'</td>  
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
      <td width="70%">'.$row["emailNots"].'</td>  
 </tr>  
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }
 ?>
 <!-----popUp details--->
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header"> 
                     <h4 class="modal-title">Local Guide Reviews</h4>  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     
                </div>  
                     <div class="modal- body" id="detail"> 
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>
 <!-----guide script--->  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var guide_email = $(this).attr("id");  
           $.ajax({  
                url:"selectReview.php",  
                method:"post",  
                data:{guide_email:guide_email},  
                success:function(data){  
                     $('#detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>
 