<?php
session_start();
$q = $_SESSION['id'];

$con = mysqli_connect('localhost','root','','BookMyShow');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"BookMyShow");

$sql="SELECT seats FROM Movies WHERE id = '".$q."'";
$result = mysqli_query($con,$sql);
$seats = Array();
$key = Array();
$reserved = Array();
while($row = mysqli_fetch_array($result)){
  $seats = unserialize($row['seats']);
}
foreach($seats as $x => $x_value) {
    $key[] = $x ;
    if($x_value==='FALSE'){
        $reserved[] = $x;;
    }
}
mysqli_close($con);
?>
<html>
    <head>
        <link rel="stylesheet" href="SeatsReservation.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <div class="main">
    <script type = "text/javascript" language ="javascript">
        var seats = <?php echo json_encode($seats);?>;
        var selected;
        console.dir(seats);
        console.log(seats);
    </script>
        <a href="Home.php"><img class="logo" src = "Logo.png" alt="main"></a>
        <div class="titlebar">
            <a class="nav" href="Home.php"><i class="fa fa-home"></i><textsize> Home</textsize></a>
            <a class="nav" href="#"><i class="fa fa-star"></i><textsize> About Us</textsize></a>
            <a class="nav" href="#"><i class="fa fa-phone"></i><textsize> Contact Us</textsize></a>
        </div>
    </div>
    <div class="image">
        <div class="heading">
            Seats Reservation
        </div>
        <div class="content">
            <div class="tags">
                <div class="box" style="background-color: white"></div>
                <div class="text">Empty Seat</div>
                <div class="box" style="background-color: green"></div>
                <div class="text">Selected Seat</div>
                <div class="box" style="background-color: red"></div>
                <div class="text">Reserved Seat</div>

            </div>
            <div class="hall"><div class="left">
                <div class="container">
                    <button id="1" onclick="Seats(1)" value="A1" class="seats"><?php echo $key[0]?></button>
                    <button id="2" onclick="Seats(2)" value="A2" class="seats"><?php echo $key[1]?></button>
                    <button id="3" onclick="Seats(3)" value="A3" class="seats"><?php echo $key[2]?></button>
                    <button id="4" onclick="Seats(4)" value="A4" class="seats"><?php echo $key[3]?></button>
                    <button id="5" onclick="Seats(5)" value="A5" class="seats"><?php echo $key[4]?></button>
                </div>
                <div class="container">
                    <button id="6" onclick="Seats(6)" value="B1" class="seats"><?php echo $key[10]?></button>
                    <button id="7" onclick="Seats(7)" value="B2" class="seats"><?php echo $key[11]?></button>
                    <button id="8" onclick="Seats(8)" value="B3" class="seats"><?php echo $key[12]?></button>
                    <button id="9" onclick="Seats(9)" value="B4" class="seats"><?php echo $key[13]?></button>
                    <button id="10" onclick="Seats(10)" value="B5" class="seats"><?php echo $key[14]?></button>
                </div>
                <div class="container">
                    <button id="11" onclick="Seats(11)" value="C1" class="seats"><?php echo $key[20]?></button>
                    <button id="12" onclick="Seats(12)" value="C2" class="seats"><?php echo $key[21]?></button>
                    <button id="13" onclick="Seats(13)" value="C3" class="seats"><?php echo $key[22]?></button>
                    <button id="14" onclick="Seats(14)" value="C4" class="seats"><?php echo $key[23]?></button>
                    <button id="15" onclick="Seats(15)" value="C5" class="seats"><?php echo $key[24]?></button>
                </div>
                <div class="container">
                    <button id="16" onclick="Seats(16)" value="D1" class="seats"><?php echo $key[30]?></button>
                    <button id="17" onclick="Seats(17)" value="D2" class="seats"><?php echo $key[31]?></button>
                    <button id="18" onclick="Seats(18)" value="D3" class="seats"><?php echo $key[32]?></button>
                    <button id="19" onclick="Seats(19)" value="D4" class="seats"><?php echo $key[33]?></button>
                    <button id="20" onclick="Seats(20)" value="D5" class="seats"><?php echo $key[34]?></button>
                </div>
                <div class="container">
                    <button id="21" onclick="Seats(21)" value="E1" class="seats"><?php echo $key[40]?></button>
                    <button id="22" onclick="Seats(22)" value="E2" class="seats"><?php echo $key[41]?></button>
                    <button id="23" onclick="Seats(23)" value="E3" class="seats"><?php echo $key[42]?></button>
                    <button id="24" onclick="Seats(24)" value="E4" class="seats"><?php echo $key[43]?></button>
                    <button id="25" onclick="Seats(25)" value="E5" class="seats"><?php echo $key[44]?></button>
                </div>
                <div class="container">
                    <button id="26" onclick="Seats(26)" value="F1" class="seats"><?php echo $key[50]?></button>
                    <button id="27" onclick="Seats(27)" value="F2" class="seats"><?php echo $key[51]?></button>
                    <button id="28" onclick="Seats(28)" value="F3" class="seats"><?php echo $key[52]?></button>
                    <button id="29" onclick="Seats(29)" value="F4" class="seats"><?php echo $key[53]?></button>
                    <button id="30" onclick="Seats(30)" value="F5" class="seats"><?php echo $key[54]?></button>
                </div>
            </div>
            <div class="right">
                <div class="container">
                    <button id="b31" onclick="Seats(31)" value="A6" class="seats"><?php echo $key[5]?></button>
                    <button id="b32" onclick="Seats(32)" value="A7" class="seats"><?php echo $key[6]?></button>
                    <button id="b33" onclick="Seats(33)" value="A8" class="seats"><?php echo $key[7]?></button>
                    <button id="b34" onclick="Seats(34)" value="A9" class="seats"><?php echo $key[8]?></button>
                    <button id="b35" onclick="Seats(35)" value="A10" class="seats"><?php echo $key[9]?></button>
                </div>
                <div class="container">
                    <button id="36" onclick="Seats(36)" value="B6" class="seats"><?php echo $key[15]?></button>
                    <button id="37" onclick="Seats(37)" value="B7" class="seats"><?php echo $key[16]?></button>
                    <button id="38" onclick="Seats(38)" value="B8" class="seats"><?php echo $key[17]?></button>
                    <button id="39" onclick="Seats(39)" value="B9" class="seats"><?php echo $key[18]?></button>
                    <button id="40" onclick="Seats(40)" value="B10" class="seats"><?php echo $key[19]?></button>
                </div>
                <div class="container">
                    <button id="41" onclick="Seats(41)" value="C6" class="seats"><?php echo $key[25]?></button>
                    <button id="42" onclick="Seats(42)" value="C7" class="seats"><?php echo $key[26]?></button>
                    <button id="43" onclick="Seats(43)" value="C8" class="seats"><?php echo $key[27]?></button>
                    <button id="44" onclick="Seats(44)" value="C9" class="seats"><?php echo $key[28]?></button>
                    <button id="45" onclick="Seats(45)" value="C10" class="seats"><?php echo $key[29]?></button>
                </div>
                <div class="container">
                    <button id="46" onclick="Seats(46)" value="D6" class="seats"><?php echo $key[35]?></button>
                    <button id="47" onclick="Seats(47)" value="D7" class="seats"><?php echo $key[36]?></button>
                    <button id="48" onclick="Seats(48)" value="D8" class="seats"><?php echo $key[37]?></button>
                    <button id="49" onclick="Seats(49)" value="D9" class="seats"><?php echo $key[38]?></button>
                    <button id="50" onclick="Seats(50)" value="D10" class="seats"><?php echo $key[39]?></button>
                </div>
                <div class="container">
                    <button id="51" onclick="Seats(51)" value="E6" class="seats"><?php echo $key[45]?></button>
                    <button id="52" onclick="Seats(52)" value="E7" class="seats"><?php echo $key[46]?></button>
                    <button id="53" onclick="Seats(53)" value="E8" class="seats"><?php echo $key[47]?></button>
                    <button id="54" onclick="Seats(54)" value="E9" class="seats"><?php echo $key[48]?></button>
                    <button id="55" onclick="Seats(55)" value="E10" class="seats"><?php echo $key[49]?></button>
                </div>
                <div class="container">
                    <button id="56" onclick="Seats(56)" value="F6" class="seats"><?php echo $key[55]?></button>
                    <button id="57" onclick="Seats(57)" value="F7" class="seats"><?php echo $key[56]?></button>
                    <button id="58" onclick="Seats(58)" value="F8" class="seats"><?php echo $key[57]?></button>
                    <button id="59" onclick="Seats(59)" value="F9" class="seats"><?php echo $key[58]?></button>
                    <button id="60" onclick="Seats(60)" value="F10" class="seats"><?php echo $key[59]?></button>
                </div>
            </div>
            </div>
            </div>
        <div class="buttoncontainer">
            <a id ="link" ><button id="nxt" class="next" disabled="TRUE">Next</button></a>   
        </div>
    </div>
        
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
       
    </script>
    <script>
        $(document).ready(function(){
            $(".next").click(function(){
                $("#link").attr('href', 'Form.php?id=<?php echo $q;?>&selected='+selected);
            });
        });
        function Seats(id){
            var seat = document.getElementById(id);
            seat.classList.toggle("selected");
            var getvalue = seat.value;
            if(seats[getvalue] === "TRUE"){
                seats[getvalue] = "Selected";
            }
            else if(seats[getvalue] === "Selected"){
                seats[getvalue] = "TRUE";
            }
            selected = JSON.stringify(seats);
            if(document.querySelectorAll('.selected').length>0){
                document.getElementById("nxt").disabled = false;
            }
            else{
                document.getElementById("nxt").disabled = true;
            }
        }
        var reserved = [];
        var disseat = document.getElementsByClassName('seats');
        reserved = <?php echo json_encode($reserved); ?>;
        for(var i=0; i<60; i++){
            for(var j=0; j<reserved.length; j++){
                if(disseat[i].value===reserved[j]){
                    disseat[i].classList.add("disabled");
                }
            }
        }
    </script>
</html>