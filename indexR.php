<?php session_start();


if (isset($_SESSION['user_log'])) {
  
} else { 
  header("Location: Login.php");
}
if(true){
  $name=($_SESSION['user_name']);
  $gender=($_SESSION['user_gender']);
  $email=($_SESSION['user_log']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <title>Welcome To Xaron</title>
    <link rel = "icon" href ="openingPageImage/x.png" type="image/x-icon"> 
    <style>
.dropbtn {
  background-color: green;
  color: white;
  border-radius: 8px;
  padding: 8px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  position: absolute;
  background-color: white;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 98;
  max-height: 0;
  min-width: 160px;
  transition: max-height 0.15s ease-out;
  overflow: hidden;
}

.dropdown-content a {
  color: black;
  background-color:red;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: red;
}

.dropdown:hover .dropdown-content {
  
  max-height: 500px;
  min-width: 160px;
  transition: max-height 0.25s ease-in;
}

.dropdown:hover .dropbtn {
  background-color: #00FF7F;
  border-bottom: 1px solid #e0e0e0;
  transition: max-height 0.25s ease-in;
}

.dro{
  background-color: #66CDAA;
  width:100%;  
  border: none;
}
</style>

</head>
<body>





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
              <a class="nav-link" href="indexR.php">Home <span class="sr-only">(current)</span></a>
            </li>
        
            
           
            <li class="nav-item">
              <a class="nav-link" href="aboutR.php">About</a>
            </li>
            <!-----dropDown--->
      <div class="dropdown">
        <button class="dropbtn" for="btnControl">What do you want to do?</button>
        <div class="dropdown-content">
        <form action="indexR.php" method="post"> 
        <button type="submit"  name="findGuide" href="findGuide.php" class=" dro blink btn btn-success"  ><b> Find a Local Guide</b></button>
        </form>    
        <form action="indexR.php" method="post"> 
        <button type="submit"  name="myGuides"  class=" dro btn btn-success"  >My Guides</button>
        </form>
        <input type="button" name="AddUnavailableDates" value="Add Unavailable Dates" id="<?php echo $email; ?>" class=" dro btn btn-success btn-xs view_data"  />
         </div>
      </div>
<!-----dropDown end--->
            <li class="nav-item">
              <a class="nav-link" style="color:white; margin-left: 25em;"><b>Hello <?php echo $name; ?>! </b> </a>
            </li>
            
        <form action="indexR.php" method="post"> 
        <button type="submit" class="btn btn-danger" name="logOutSubmit" style="margin-left: 32em;" >Log Out</button>
        </form>
      
        </div>
        
      </nav>

      <!-- PHP --> 

<div>
<?php 
if(isset($_POST['findGuide'])){    
 
  echo "<script>
  window.location.href='findGuide.php';
  </script>";
  
}
if(isset($_POST['logOutSubmit'])){

  echo "<script>
  alert('You Have Logged Out - Redirect to HomePage');
  window.location.href='index.php';
  </script>";
  session_destroy();
  
}
if(isset($_POST['myGuides'])){    
  echo "<script>
  window.location.href='myGuides.php';
  </script>";
  
}

?>

    <!-- Image Carousel-->
<!-- 
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="indexCaruselImages/1.jpg" height="600" width="400" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Xaron Brings Travellers And Local Guides Together</h5>
                <p>Makes Travelling A Lot Much Experienceful & Interactive</p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="indexCaruselImages/2.jpg" height="600" width="400" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>World Wide Range Of Travel Prefrences & Styles</h5>
                <p>Everybody Can Find A Perfect Travel Match</p>
              </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="indexCaruselImages/3.jpg" height="600" width="400" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
                <h5>Save Money On Expensive Organized Group Trips</h5>
                <p>Customize Your Travel With Your Own Local Guide</p>
              </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div> -->
</body>
</html>

<!-----popUp details--->
<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header"> 
                </div>  
                     <div class="modal- body" id="detail"> 
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>
 
        <!-----script--->  
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var guide_email = $(this).attr("id");  
           $.ajax({  
                url:"addUnavailableDates.php",  
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