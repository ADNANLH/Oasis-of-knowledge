<?php

session_start();
require "conection.php";
$id_adh = $_SESSION['id_adh'];

$stmt = $pdo->prepare("SELECT * FROM adherent WHERE id_adh = :id_adh");
$stmt->bindParam(':id_adh', $id_adh);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./images//oasis-low-resolution-logo-color-on-transparent-background.png" type="image/x-icon">
    <link rel="stylesheet" href="./style.css">
    <title>Oasis of Knowledge</title>
</head>

<header>
    
    <nav class="site-nav">
        <div class="site-navigation d-flex justify-content-between fixed-top py-3 px-5 align-items-center" style="background-color:#198754;">
        <div class="site-navigation  d-flex justify-content-end fixed-top py-3 px-5 align-items-center navi">
            <div class=" d-flex  fixed-top  py-3 px-5 align-items-center ">

                <a href="index.php" ><img class="logo" src="./images//oasis-low-resolution-logo-color-on-transparent-background.png" ></a>

                <li class="js-clone-nav me-4 align-items-center d-flex text-center site-menu list-unstyled"><a class='text-decoration-none' href="index.php">Home</a></li>
                <li class="js-clone-nav me-4 align-items-center d-flex text-center site-menu list-unstyled"><a class='text-decoration-none' href="reservation.php">Reservations</a></li>
            </div>

        <div class="js-clone-nav me-4 d-flex flex-column align-items-center text-center site-menu">
            <?php
                foreach ($result as $row){
                   echo " <div class='me-4 '>
                            <div class='list-unstyled d-flex justify-content-around'>
                            <img src='./images//profile.png' class='profile list-unstyled' height='30px'>
                                <span class='pinal'>". $row['pinalite'] . "</span>
                            </div> 
                                <a href='profile.php' class='text-decoration-none'><h5 class='text-white bold'>". $row['name']." </h5></a>
                        
                        </div>

                ";}
            ?>
        </div>
        </li>
        </ul>
        </div>
    </nav>
</header>
<body>
        



    <?php


$query = "SELECT r.*, f.* FROM reservation r INNER JOIN ouvre f ON r.id_ouvre = f.id_ouvre WHERE r.id_adh = :id_adh";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id_adh', $id_adh);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo " <div class='container-xxl py-5 mt-5'>";
        echo   "<div class='container'>";
        echo   "<div class='tab-content'>";
        echo   "<div id='tab-1' class='tab-pane fade show p-0 active'>";
        echo   "<div class='row  g-4'>";
        foreach ($results as $row){
            
            $card =  "<div class='card'>
            <div class='bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
                <img src='images/".$row['image']."' class='img-fluid'/>
                <a href='#!'>
                    <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                </a>
                </div>
                <form method='post' action=''>
                    <div class='card-body'>
                        <div class='d-flex justify-content-between'>
                            <h4 class='card-title'>".$row['titre']."</h4>
                            <h5 class='card-title'>".$row['date_edition']."</h5>
                        </div>
                        <h5 class='card-title'>".$row['auteur']."</h5>
                        <div class='d-flex justify-content-between'>
                            <span>".$row['pages']." Pages</span>
                        </div>
                    </div>
                    <input type='hidden' name='id_ouvre' value='" . $row['id_ouvre'] . "'>
                </form>
            </div>";
            echo $card;
           
        }
        echo "</div></div></div></div></div>";

                
           
    
    ?>

</body>
<style>
    body {

    font-family: "Roboto", "Arial", "Helvetica Neue", sans-serif;
    font-weight: 400;
    font-size: 14px;
    margin: 0px 0px 0px 0px;
    background-size: cover;
    background-image: url(./images//cover.jpg);
    background-size: 100% 292%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position: left;
    backdrop-filter: blur(3px);
}
.col-lg-12.text-center {
    margin: 128px 0px 0px 0px;
}
img.logo {
    height: 35px;
    margin-left: 157px;
}
.row {
    margin-top: 72px;
    display: flex;
    -webkit-flex-wrap: wrap;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
}
.mt-5 {
     margin-top: 0rem!important; 
}
.navi {
    background-color: #3A1078;
    color: white;

}
a.text-decoration-none {
    color: white;
    font-weight: bold;
    margin-left: 49px;
}

.col-md-4{
    width: 125px;
}


  /* card */
  .card {
      overflow: hidden;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      background: #fff;
      width: 219px;
      margin: 23px 33px;
      padding: 0px 0px;
  }
  .img-fluid {
    max-width: 107%;
    height: auto;
    width: 218px;

}

li {
    list-style: none;
}
span.pinal {
    background: red;
    padding: 0px 7px;
    position: absolute;
    border-radius: 25px;
    top: 38px;
    right: 95px;
}
</style>

</html>