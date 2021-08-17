<?php
    session_start();
    $con = mysqli_connect('localhost','root','','BookMyShow');
      if(!$con) {
        die('Could not connect: ' . mysqli_error($con));
      }
        $fname= $lname = $phone = $movie = $timing = $tprice = "";
        $seats = Array();
      mysqli_select_db($con,"BookMyShow");
      $sql = "select * from Booking ORDER BY id DESC LIMIT 1";
      if (mysqli_query($con, $sql)) {
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)){
            $fname = $row['fname'];
            $lname = $row['lname'];
            $phone = $row['phone'];
            $movie = $row['movie'];
            $timing = $row['timings'];
            $seats = $row['seats'];
            $tprice = $row['tprice'];
        }
        // $selected  = unserialize($seats);
        // $selectedStr = implode(" ",$seats);
        $selected = implode(" ", $_SESSION["seats"]);
        $newSeats = $_SESSION["newseats"];
        $q = $_SESSION['id'];
        $sql2 = "UPDATE Movies SET seats='$newSeats' WHERE id='$q'";
        if ($con->query($sql2) === FALSE) {
            echo "Error updating record: " . $con->error;
        } 
      }
      else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
      }  


mysqli_close($con);


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bill.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div id="main">
        <a href="H.php"><img class="logo" src = "Logo.png" alt="main"></a>
        <div class="titlebar">
            <a class="nav" href="H.php"><i class="fa fa-home"></i><textsize> Home</textsize></a>
            <a class="nav" href="AboutUs.html"><i class="fa fa-star"></i><textsize> About Us</textsize></a>
            <a class="nav" href="ContactUs.php"><i class="fa fa-phone"></i><textsize> Contact Us</textsize></a>
        </div>
    </div>
    <div class="back">
        <div class ="main">
            <div class= "heading">
                <h1>THANK YOU FOR VISITING!</h1>
            </div>
            <div class ="bill">
                <div id= "billHeading">
                    <h1>Bill Details</h1><br>
                </div>
                <div class="text">
                    <LABEL>Customer Name: <?php echo $fname ." " . $lname?></LABEL><br><br>
                    <LABEL>Phone No: <?php echo $phone?></LABEL><br><br><br>
                    <LABEL>Movie Name: <?php echo $movie?></LABEL><br><br>
                    <LABEL>Timings: <?php echo $timing?></LABEL><br><br><br>
                    <LABEL>Seats: <?php echo $selected?></LABEL><br><br>
                    <LABEL>Total Price: <?php echo $tprice?></LABEL><br><br>
                </div> 
            </div>
        </div>
        <div id="SeeYou">
            <h1>SEE YOU SOON!</h1>
        </div>
    </div>
    <div class ="footer">
    <div><p class = "contact"><text><i class="fa fa-phone" aria-hidden="true"></i>   +92 311 1222742</text><br><br/></p></div>
    <div><p class ="contact"><text><i class="fa fa-envelope" aria-hidden="true"></i>  ask@bookmyshow.pk</text><br><br/></p></div>
    <div><p class ="contact"><text><i class="fa fa-globe" aria-hidden="true"></i>  www.bookmyshow.pk</text></p></div>
  </div>        
</body>
</html>