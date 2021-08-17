<html>
<head>
  <link rel="stylesheet" href="ContactUs.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "bookmyshow";

$fname = "";
$lname = "";
$email = "";
$contact = "";
$subject = "";
$message = "";

$fnameErr = "";
$lnameErr = "";
$emailErr = "";
$contactErr = "";
$subjectErr = "";
$messageErr = "";

  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if($conn === false){
    die('Could not connect' . mysqli_connect_error());
  }

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST["fname"])){
      $fnameErr=" *First name is required!";
    }
    else{
      $fname = testInput($_POST["fname"]);
      if(!preg_match("/^[a-zA-Z\s]*/",$fname)){
        $fnameErr = "*Please enter a valid name";
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
        $emailErr = "     *Please enter a valid email";}
        }
    if(empty($_POST["contact"])){
      $contactErr = "     *Phone number is required!";}
    else{
      $contact = testInput($_POST["contact"]);
      if(validate_phone_number($contact)==false){
        $contactErr = "     *Please enter a valid contact number";}
        }
    if(empty($_POST["subject"])){
      $subjectErr = "     *Subject is required!";}
    else{
      $subject = testInput($_POST["subject"]);}
          
    if(empty($_POST["message"])){
      $messageErr = "     *message is required!";}
    else{
      $message = testInput($_POST["message"]);
    }
                

  if($fnameErr === "" and $lnameErr === "" and $emailErr === "" and $contactErr === "" and $subjectErr === "" and $messageErr === ""){
    $sql = "INSERT INTO feedback (fname, lname, email, phone, msgSubject, msg)
    VALUES ('$fname', '$lname', '$email', '$contact', '$subject', '$message')";

    if(mysqli_query($conn, $sql)){
    echo "<script> alert('Success')</script>";
    } else {
      echo "<script> alert('ERROR!')</script>";
    }
  }
}
  mysqli_close($conn);

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
          $len = strlen($phone_to_check);
          if ($len < 11 || $len > 14) {
            return false;}
          else {
            return true;
          }
        }
  ?>
  <div class="bar">
    <a href="H.php"><img class="logo" src = "Logo.png" alt="main"></a>
    <div class="titlebar">
      <a class="nav" href="H.php"><i class="fa fa-home"></i><textsize> Home</textsize></a>
        <a class="nav" href="AboutUs.html"><i class="fa fa-star"></i><textsize> About Us</textsize></a>
        <a class="nav" href="ContactUs.php"><i class="fa fa-phone"></i><textsize> Contact Us</textsize></a>
    </div>
  </div>
  <div class ="headingBox">
    <h1 id="heading">Contact Us</h1>

    <p style="color: white"><i>Please use the form below to get in touch with us.
      In the case of complaints and/or corporate enquiries, please provide as much information as possible, so we can address your query accordingly.</i></p>
  </div>
  <div class='main'>
    <div class ="form">
    <form action="ContactUs.php" method="post">
      <label for="fname" class="labels" ><b>First name:<b></label><br>
      <input class ="inputs" type="text" id="fname" name="fname" autofocus value ="<?php echo $fname ?>" placeholder="Enter your first name here.."><p class="error"><?php echo $fnameErr; ?></p><br>
      <label for="lname" class="labels"><b>Last name:</b></label><br>
      <input class ="inputs" type="text" id="lname" name="lname" value ="<?php echo $lname ?>" placeholder="Enter your last name here.."><p class="error"><?php echo $lnameErr; ?></p><br>
      <label for='email' class="labels"><b>Email:</b></label><br>
      <input class ="inputs" type="email" id='email' name="email" value ="<?php echo $email ?>" placeholder="Enter your email id here.."><p class="error"><?php echo $emailErr; ?></p><br>
      <label for='contact' class="labels"><b>Contact No:</b></label><br>
      <input class ="inputs" type="text" id='contact' name="contact" value ="<?php echo $contact ?>" placeholder="Enter your contact here.."><p class="error"><?php echo $contactErr; ?></p><br>
      <label for='subject' class="labels"><b>Subject:</b></label><br>
      <input class ="inputs" type="text" id='subject' name="subject" value ="<?php echo $subject ?>" placeholder="Enter your subject here.."><p class="error"><?php echo $subjectErr; ?></p><br>
      <label for='message' class="labels"><b>Message:</b></label><br>
      <textarea class ="inputs" id="message" rows = "3" cols = "29" name = "message" value ="<?php echo $message ?>" placeholder="Enter your message here.."></textarea><p class="error"><?php echo $messageErr; ?></p>
      <br>
      <input type="submit" value="Submit"/>
    </form>
  </div>

    <div class="contact">
      <p>
      <text><i class="fa fa-phone" aria-hidden="true"></i>   +92 311 1222742</text><br><br/>
      <text><i class="fa fa-envelope" aria-hidden="true"></i>  ask@bookmyshow.pk</text><br><br/>
      <text><i class="fa fa-globe" aria-hidden="true"></i>  www.bookmyshow.pk</text>
      </p>
    </div>
</div>
</body>
</html>