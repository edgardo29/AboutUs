<?php
session_start();
if (!isset($_POST["submit"])){
$q = intval($_GET['id']);
$_SESSION['id'] = $q;
$con = mysqli_connect('localhost','root','','BookMyShow');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}
$movie="";
mysqli_select_db($con,"BookMyShow");

$sql="SELECT * FROM Movies WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)){
  $movie = $row['movie_name'];
  $image = $row['poster'];
  $cast = $row['cast'];
  $synopsis = $row['synopsis'];
  $timings = unserialize($row['timings']);
}
$_SESSION["movie"] = $movie;
}
if(isset($_POST["submit"])){
  $_SESSION["timing"] = $_POST["radio-group"];
  header('Location: SeatsReservation.php');
}

mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Timings.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Timings</title>
</head>

    <div class="main">
      <a href="H.php"><img class="logo" src = "Logo.png" alt="main"></a>
      <div class="titlebar">
        <a class="nav" href="H.php"><i class="fa fa-home"></i><textsize> Home</textsize></a>
          <a class="nav" href="AboutUs.html"><i class="fa fa-star"></i><textsize> About Us</textsize></a>
          <a class="nav" href="ContactUs.php"><i class="fa fa-phone"></i><textsize> Contact Us</textsize></a>
        </div>
    </div>
<body>
<div class = "bg">
    <div class = "background">
    <div class = "movie">
        <h1 id="movie"><?php 
          echo $movie;
        ?></h1>
        <div class = "container">
            <img src = <?php echo $image ?> alt="main" class="image">
        </div>
        <div class="price">
          Price: RS 500/- per seat
        </div>
    </div>
    <br/>
    <div class = "details">
        <div class = "cast">
        <h2 class ="heading">CAST</h2>
        <p id = "cast"><?php 
        echo $cast;
        ?></p>
        </div>
        <br/>
        <div class= "story">
            <h2 class = "heading">SYNOPSIS</h2>
            <p id ="synopsis"><?php 
            echo $synopsis;
            ?></p>
        </div>
    </div>
</div>
<div class = "timings">
    <h2 id= "timing">TIMINGS</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p>
          <input type="radio" id="test1" value="<?php echo $timings[0];?>" name="radio-group" checked>
          <label for="test1"><?php 
          echo $timings[0];
        ?></label>
        </p>
        <p>
          <input type="radio" id="test2" value="<?php echo $timings[1];?>" name="radio-group">
          <label for="test2"><?php 
          echo $timings[1];
        ?></label>
        </p>
        <p>
          <input type="radio" id="test3" value="<?php echo $timings[2];?>" name="radio-group">
          <label for="test3"><?php 
          echo $timings[2];
        ?></label>
        </p>
        <input type = "submit" name ="submit" value = "Next" class= "sub"></input>
      </form>
</div>
</div>
</body>
</html>