<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  
    <title>Admin Page</title>
    <link rel = "icon" href ="openingPageImage/x.png" type="image/x-icon"> 
</head>
<body>

<div>

</div>

   <!-- NavBar-->
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Xaron</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarColor01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <a class="nav-link" style="color:white; margin-left: 25em;"><b>Hello Admin! </b> </a>
            <form action="index.php" method="post"> 
        <button type="submit" class="btn btn-danger" name="logOutSubmit" style="margin-left: 52em;" >Log Out</button>
        </form>
          </ul>


<?php

     /*logout button*/ 

if(isset($_POST['logOutSubmit'])){
  echo "<script>
  alert('You Have Logged Out - Redirect to HomePage');
  window.location.href='index.php';
  </script>";
  session_destroy();
  
}
     ?>

        </div>
      </nav>
</div>
<!-- tabs-->

        <h1 style="margin:1px;">Admin Page</h1>
        <!--  Tab Selector -->
        
        <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home">Traveller Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " data-toggle="tab" href="#profile">Local Guide Details</a>
            </li>

          </ul>
          <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade show active" id="home">

              <!-- Traveller  -->
              <br>
                    <div class="col-md-6 login-form-1">
                        <h3 style="display: inline;">Traveller Details</h3>
                        <button type="button" class="btn btn-success"style="margin:4px; margin-left: 43.2em;" onclick="document.location='registerTraveller.php'"> Add Traveler </button>

                        <table  border="2" id="travelTable" class="table table-hover">
                            <tr class="table-active" style="font-weight: bold;"   >
                                <td style="width:40%">full Name</td>
                                <td>Gender</td>
                                <td>City</td>
                                <td>Country</td>
                                <td style="width:20%">Langueges</td>
                                <td>Travel Styles</td>
                                <td>Delete</td>
                                <td>View</td>  
                            </tr>

                            <?php

                            //include "dbConn.php"; // Using database connection file here
                            $db_user = "root";
                            $db_pass ="";
                            $db_name = "useraccounts";
                            $db_port = 3308;
                            $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);

                            $result = $mysqli->query("SELECT * FROM travellerusers");
                            $arr = $result->fetch_assoc();

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
                                <td><a onclick="return confirm('Are you sure you want to delete <?php echo$data['firstName']?>?')" href="deleteTravellers.php?id=<?php echo $data['email'];?>" style="color:red;" >Delete</a></td>
                                <td><input type="button" name="view" value="view" id="<?php echo $data["email"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
   
                            </tr>	
                            <?php
                            }
                            ?>
                            </table>    
                    </div>

            </div>

            
            <div class="tab-pane fade" id="profile">


              <!--  Local Guide  -->
              <br>
              <div class="col-md-6 login-form-2">
                <h3 style="display: inline;">Local Guide Details</h3>
                <button type="button" class="btn btn-success"style="margin:4px; margin-left: 41.5em;" onclick="document.location='registerLocalGuide.php'"> Add local Guide </button>


                            <table border="2" id="localTable" class="table">
                            <tr style="font-weight: bold;" class="table-primary">
                                <td style="width:40%">full Name</td>
                                <td>Gender</td>
                                <td>City</td>
                                <td>Country</td>
                                <td style="width:20%">Langueges</td>
                                <td style="width:40%">Travel Styles</td>
                                <td>Delete</td>
                                <td>View</td>  

                            </tr>

                            <?php

                            //include "dbConn.php"; // Using database connection file here
                            $db_user = "root";
                            $db_pass ="";
                            $db_name = "useraccounts";
                            $db_port = 3308;
                            $mysqli = new mysqli('localhost', $db_user, $db_pass, $db_name,$db_port);

                            $result = $mysqli->query("SELECT * FROM localguideusers");
                            $arr = $result->fetch_assoc();

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
                                <td><a onclick="return confirm('Are you sure you want to delete <?php echo$data['firstName']?>?')" href="deleteGuides.php?id=<?php echo $data['email'];?>" style="color:red;">Delete</a></td>
                                <td><input type="button" name="view" value="view" id="<?php echo $data["email"]; ?>" class="btn btn-info btn-xs view_data2" /></td>  

                            </tr>	
                            <?php
                            }
                            ?>
                            </table>    
            </div>
            </div>
          </div>


    




</body>
</html>
<!-----popUp details--->
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header"> 
                     <h4 class="modal-title">Traveller Details</h4>  
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
           var traveller_email = $(this).attr("id");  
           $.ajax({  
                url:"selectTRA.php",  
                method:"post",  
                data:{traveller_email:traveller_email},  
                success:function(data){  
                     $('#detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script> 
 
 <!-----guide script--->  
 <script>  
 $(document).ready(function(){  
      $('.view_data2').click(function(){  
           var guide_email = $(this).attr("id");  
           $.ajax({  
                url:"selectGUIDE.PHP",  
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