<?php
session_start();
session_destroy();
//$q = intval($_GET['id']);

$con = mysqli_connect('localhost','root','','BookMyShow');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"BookMyShow");

$sql="SELECT poster, movie_name FROM Movies";
$result = mysqli_query($con,$sql);
$movie = Array();
$image = Array();
while($row = mysqli_fetch_array($result)){
    $movie[] = $row['movie_name'];
    $image[] = $row['poster'];
}

mysqli_close($con);
?>
<html>
    <head>
        <link rel="stylesheet" href="Homecss.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <div class="main">
        <a href="Home.php"><img class="logo" src = "Logo.png" alt="main"></a>
        <div class="titlebar">
            <a class="nav" href="Home.php"><i class="fa fa-home"></i><textsize> Home</textsize></a>
            <a class="nav" href="AboutUs.html"><i class="fa fa-star"></i><textsize> About Us</textsize></a>
            <a class="nav" href="ContactUs.php"><i class="fa fa-phone"></i><textsize> Contact Us</textsize></a>
        </div>
    </div>
    <div class="image">
        <div class="now">
            Now Showing
        </div>  
    </div>
    <div class="label">
        <div class="line"></div>
        <div><label class="title">Grab Your Tickets!</label></div>
        <div class="line"></div>
    </div>
    <div class="tabs">
        <div id="buttons" class="tab">
            <button onclick="screen('screen1')" id="b1" class="txt active">Now Showing</button>
            <button onclick="screen('screen2')" id="b2" class="txt">Coming Soon</button>
            <div class="searchbar">
                <input type="text" id="search" class="search" onkeyup="Search()" placeholder="Search Movies"></input>
                <button class="searchbutton"><i class="fa fa-search"></i></button>
            </div>
        </div>
        <div id="list"><div id="screen1" class="movies">
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[0] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=1"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[0] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[1] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=2"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[1] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[2] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=3"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[2] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[3] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=4"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[3] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[4] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=5"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[4] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[5] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=6"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[5] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[6] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=7"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[6] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[7] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=8"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[7] ?></Center></div>
            </div>
        </div>
        <div id="screen2" class="movies" style="display:none">
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[8] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=9"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[8] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[9] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=10"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[9] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[10] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=11"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[10] ?></Center></div>
            </div>
            <div class="list">
                <div class="container">
                    <img src = <?php echo $image[11] ?> alt="main" class="images">
                    <div class="btnappear">
                        <a href="Timings.php?id=12"><button class="book">View</button></a>
                    </div>
                </div>
                <div class="movietext"><Center><?php echo $movie[11] ?></Center></div>
            </div>
        </div></div>
    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#b1").click(function(){
                $("#b1").addClass("active");
            });
            $("#b2").click(function(){
                $("#b2").addClass("active");
            });
        });
        function screen(screenName){
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("movies");
            for (i = 0; i < tabcontent.length; i++){
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("txt");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace("active", "");
            }
            document.getElementById(screenName).style.display = "flex";
        }
        function Search() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            ul = document.getElementById("list");
            li = ul.getElementsByClassName("list")
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByClassName("movietext")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } 
                else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>
</html>