<?php
session_start();
$name=($_SESSION['user_name']);
$date= date("d/m/Y");
$travellerEmail= $_SESSION['user_log'];
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Find a Local Guide</title>
    <link rel = "icon" href ="openingPageImage/x.png" type="image/x-icon"> 
    
</head>
<body>

   <!-- NavBar-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Xaron</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="indexR.php">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Find a Local Guide <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutR.php">About</a>
            </li>
            <a class="nav-link" style="color:white; margin-left: 25em;"><b>Hello <?php echo $name; ?>! </b> </a>
            <form action="index.php" method="post"> 
        <button type="submit" class="btn btn-danger" name="logOutSubmit" style="margin-left: 36em;" >Log Out</button>
        </form>
          </ul>


        </div>
      </nav>

         

    <!---------------->
    <?php


if(isset($_POST['logOutSubmit'])){
  // $message = "You Are Now Logged Out";
  // echo "<script type='text/javascript'>alert('$message');</script>";
  // sleep(5);
  // header('Location: index.php'); exit();
  echo "<script>
  alert('You Have Logged Out - Redirect to HomePage');
  window.location.href='index.php';
  </script>";
  session_destroy();
  
}
     ?>
    <!-- Search Platform -->
    <h2 allign="center" style="margin-left:2em;">My Favorites local Guides</h2><br />
    <div class="col-md-6 login-form-1">
        
                        <table  border="2" id="myGuideTable" class="table table-hover">
                            <tr class="table-active" style="font-weight: bold;"   >
                                <td style="width:40%">full Name</td>
                                <td>Gender</td>
                                <td>City</td>
                                <td>Country</td>
                                <td style="width:20%">Langueges</td>
                                <td>Travel Styles</td>
                                <td>Rate</td>
                                <td>View</td> 
                                <td>Delete</td>
 
                            </tr>

                            <?php

                            //include "dbConn.php"; // Using database connection file here
                            $db_user = "root";
                            $db_pass ="";
                            $db_name = "useraccounts";
                            $db_port = 3308;
                            $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);

                            $result = $mysqli->query("SELECT lg.firstName, lg.lastName,lg.firstName,lg.gender,lg.city,lg.country, 
                            lg.lang1,lg.lang2,lg.lang3,lg.travelStyle1,lg.travelStyle2,lg.travelStyle3,lg.email 
                            FROM myguides mg join localguideusers lg on mg.localGuide_email=lg.email where mg.traveller_email ='$travellerEmail'");

                            while($data = mysqli_fetch_array($result))
                            {
                            ?>
                            <tr>
                                <td ><?php echo $data['firstName'],' ',$data['lastName'] ; ?></td>
                                <td><?php echo $data['gender']; ?></td>
                                <td><?php echo $data['city']; ?></td>  
                                <td><?php echo $data['country']; ?></td>     
                                <td><?php echo $data['lang1'],' ',$data['lang2'],' ',$data['lang3']; ?></td>
                                <td><?php echo $data['travelStyle1'],' ',$data['travelStyle2'],' ',$data['travelStyle3']; ?></td>
                                <td><button type="submit" class="btn btn-success"  ><a href="reviewAndRate.php?id=<?php echo $data["email"];?>" style="color: white !important;">Rate</a> </button></td> 
                                <td><input type="button" name="view" value="view" id="<?php echo $data["email"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                                <td><a onclick="return confirm('Are you sure you want to delete <?php echo$data['firstName']?>?')" href="deleteMyGuides.php?id=<?php echo $data['email'];?>" style="color:red;">Delete</a></td>

                            </tr>	
                            <?php

                            }
                            ?>
                            </table>    
                    </div>
    
</body>
</html>
<!-----popUp details--->
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header"> 
                     <h4 class="modal-title">List of Reviews</h4>  
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
 
        <!-----traveller script--->  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var guide_email = $(this).attr("id");  
           $.ajax({  
                url:"selectGUIDE.php",  
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
 