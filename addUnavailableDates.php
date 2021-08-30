<?php  
 if(isset($_POST["guide_email"]))  
 {  
     $email=$_POST["guide_email"];
     $output=''; 
      $output .= '  
      <h4 class="modal-title" style="margin-left:1em;">Choose Unavailable Date</h4>
      <form action="addDate.php" method="post">  
      <div class="col-10" >
        <input class="form-control" type="date" value="<date("dd-mm-yyyy") name="date" id="example-date-input" style="text-align: left; width: 70%;">
        
        <button type="submit" class="btn btn-success" href="addDate.php" style="color:white; margin-top:1em; margin-bottom:1em;" >Add</button>
        </form>

                ';  
        
      $output .= "</div>";  
      echo $output;  
 }
 ?>

 