<html>
    <head>
        <link rel="stylesheet" href="Formc.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
      
    <?php
      session_start();
      $con = mysqli_connect('localhost','root','','BookMyShow');
      if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
      }
      mysqli_select_db($con,"BookMyShow");


      $movie =$_SESSION['movie'];
      $timing = $_SESSION['timing'];
      $seats = Array();
      if(!isset($_POST['submit'])){
      $q = $_SESSION['id'];
      $s = json_decode($_GET['selected']);
      $key = Array();
      foreach($s as $x => $x_value) {
        if($x_value==='Selected'){
          $key[] = $x;
          $x_value = "FALSE";
        }
        $seats[$x] = $x_value;
      }
      $_SESSION['seats'] = $key;
      $_SESSION['newseats'] = serialize($seats);
    }
      
      $fname = $lname =  $email  = $phone = "";
      $fnameErr = $lnameErr = $emailErr = $phoneErr = ""; 
      if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["fname"])){
            $fnameErr = "     *First name is required!";
            }
        else{
          $fname = testInput($_POST["fname"]);
          if(!preg_match("/^[a-zA-Z\s]*/",$fname)){
            $fnameErr  ="     Please enter a valid name";
            }
          }
        if(empty($_POST["lname"])){
            $lnameErr = "    *Last name is required!";}
        else{
          $lname = testInput($_POST["lname"]);
          if(!preg_match("/^[a-zA-Z0-9\s]*/",$lname)){
              $lnameErr  ="     *Please enter a valid name";}
            }
        if(empty($_POST["email"])){
          $emailErr = "     *Email is required!";
            }
        else{
          $email = testInput($_POST["email"]);
          if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "     *Please enter a valid email";
                }
            }
        if(empty($_POST["phone"])){
          $phoneErr = "     *Phone number is required!";}
        else{
          $phone = testInput($_POST["phone"]);
          if(validate_phone_number($phone)==false){
            $phoneErr = "     *Please enter a valid phone number";
              }
          }
        if($fnameErr ==="" and $lnameErr=== "" and $phoneErr === "" and $emailErr ==="" ){
              
              // $seatsSerialize = serialize($seats);
              $tempSeats = $_SESSION['seats'];
              $trpice = count($tempSeats)*500;
              $sql = "INSERT INTO Booking (fname, lname, phone, movie, timings, seats, tprice)
                      VALUES ('$fname', '$lname', '$phone', '$movie', '$timing', '$tempSeats', '$trpice')";   
              if (mysqli_query($con, $sql)) {
               header('Location: Bill.php');
              } else {
                // echo "<script> alert('ERROR!')</script>";
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
              }
              
      }
        }
        mysqli_close($con);
        function testInput($data){
          $data = trim($data);
          $data = stripcslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }

        function validate_phone_number($phone){
          // Allow +, - and . in phone number
          $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
          // Remove "-" from number
          $phone_to_check = str_replace("-", "", $filtered_phone_number);
          // Check the lenght of number
          // This can be customized if you want phone number from a specific country
          if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;}
          else {
            return true;
          }
        }

      
    ?>

      <div class="main">
        <div class="bar">
          <a href="H.php"><img class="logo" src = "Logo.png" alt="main"></a>
          <div class="titlebar">
            <a class="nav" href="H.php"><i class="fa fa-home"></i><textsize> Home</textsize></a>
              <a class="nav" href="AboutUs.html"><i class="fa fa-star"></i><textsize> About Us</textsize></a>
              <a class="nav" href="ContactUs.php"><i class="fa fa-phone"></i><textsize> Contact Us</textsize></a>
          </div>
        </div>
        <div class="background">
        <div class="heading">
          <h1>Customer Details</h1>
        </div>
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
          <div class="form">
            <div class="labels">
              <div><label for="fname">First Name</label></div>
              <div><input class="input" type="text" id="fname" name="fname" value ="<?php echo $fname ?>" autofocus placeholder="Enter your first name here.." ></input><p class="error"><?php echo $fnameErr; ?></p></div><br/>
              <div><label for="lname">Last Name</label></div>
              <div><input class="input" type="text" id="lname" name="lname" value ="<?php echo $lname ?>"  placeholder="Enter your last name here.." ></input><p class="error"><?php echo $lnameErr; ?></p></div><br/>
              <div><label for="email">Email</label></div>
              <div><input class="input" type="text" id="email" name="email" value ="<?php echo $email ?>"  placeholder="Enter your email here.." ></input><p class="error"><?php echo $emailErr; ?></p></div><br/>
              <div><label for="phone">Phone No</label></div>
              <div><input class="input" type="text" id="phone" name="phone" value ="<?php echo $phone ?>"  placeholder="Enter your phone number here.." ><p class="error"><?php echo $phoneErr; ?></p></input></div><br/>
            </div>
          </div>
          <div><p id= "warning">Please make sure your details are correct, they can't be changed afterwards!</p></div> 
          <input type = "submit" value = "Submit" class= "sub" name ="submit"></input>

        </form>
      </div></div>
    </body>
    <script type="text/javascript"> 
        function preventBack() { 
            window.history.forward();  
        } 
          
        setTimeout("preventBack()", 0); 
          
        window.onunload = function () { null }; 
    </script> 
</html>