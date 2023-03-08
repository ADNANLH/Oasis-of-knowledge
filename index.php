<?php

session_start();
require "conection.php";
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
        <div class="site-navigation  d-flex justify-content-end fixed-top py-3 px-5 align-items-center navi">
            <div class=" d-flex  fixed-top py-3 px-5 align-items-center ">

                <a href="index.php" ><img class="logo" src="./images//oasis-low-resolution-logo-color-on-transparent-background.png" ></a>
                
                <li class="js-clone-nav me-4 align-items-center d-flex text-center site-menu list-unstyled"><a class='text-decoration-none' href="index.php">Home</a></li>
                <li class="js-clone-nav me-4 align-items-center d-flex text-center site-menu list-unstyled"><a class='text-decoration-none' href="resetvations.php">Reservations</a></li>
            </div>
       

        <ul class="js-clone-nav me-4 align-items-center d-flex text-center site-menu">
            <li class="justify-content-center me-4">
                <ul class="list-unstyled">
                    <li><img src="./images//profile.png" class="profile" height="30px"></li>
                    <?php
                    if (isset($_SESSION['name'])) {

                        echo "<li><a href='profile.php' class='text-decoration-none'><h6 class='text-white'>" . $_SESSION['name'] . "</h6></a></li> <li><span>". $_SESSION['pinalite'] ."</span></li></ul>";
                    }

                    ?>

            </li>
        </ul>
        </li>
        </ul>
        </div>
    </nav>
</header>
<body>

    <div class="hero">
       

        <div class="container">
            <div class="row justify-content-center"> 
                <div class="col-lg-12 text-center">
        
                    <form action="" method="post" class="" >
                        <div class="row justify-content-center input-group ">
                            <div class="col-md-4 input-group">
                               
                                    <input type="search" class="form-control search" placeholder="Search" aria-label="Search" name="search" aria-describedby="search-addon" />
                                    <!-- <button type="button" class="btn btn-primary" name="search-btn">Search</button> -->
                                    <input type="submit"  name="search-btn" class="btn btn-primary" value="Search">
                              
                            </div>

                            <div class="col-md-4">
                                <select name="type" class="form-control form-select border-0">
                                    <option value="" disabled selected>Type</option>
                                    <option value="Books">Books</option>
                                    <option value="Magazines">Magazines</option>
                                    <option value="Novels">Novels</option>
                                    <option value="Video cassettes">Video cassettes</option>
                                    <option value="CDs">CDs</option>
                                    <option value="DVDs">DVDs</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <input name="year" type="text" class="form-control border-0 search-slt" placeholder="Year">
                            </div>
                            

                           
                           
                        </div>
                    </form>
                </div>
            </div>

        </div>
       
    </div>



    <?php

if (empty($results)) {
        $type = $_POST['type'];
        $year = $_POST['year'];
        $search = $_POST['search'];
        $query = "SELECT * FROM `ouvre`";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo " <div class='container-xxl py-5 mt-5'>";
        echo   "<div class='container'>";
        echo   "<div class='tab-content'>";
        echo   "<div id='tab-1' class='tab-pane fade show p-0 active'>";
        echo   "<div class='row  g-4'>";
        foreach ($results as $row){
            echo $card = " <div class='card'>
                <div class='bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
                <img src='images/".$row['image']."' class='img-fluid'/>
                <a href='#!'>
                    <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                </a>
                </div>
                <div class='card-body'>
                    <h5 class='card-title'>".$row['titre']."</h5>
                    <h4 class='card-title'>".$row['auteur']."</h4>
                    <h4 class='card-title'>".$row['date_edition']."</h4>
                    <span>".$row['pages']." Pages</span>
                    <a href='#!' class='btn btn-primary'>Button</a>
                </div>
                </div>
            ";
        }
        echo "</div></div></div></div></div>";
    }elseif(isset($_POST['search-btn'])) {
        $card = "";
        // Get the search terms from the form
        $type = $_POST['type'];
        $year = $_POST['year'];
        $search = $_POST['search'];

        // Build the SQL query
        $sql = "SELECT * FROM `ouvre`";
        $params = array();

        if (!empty($search)) {
            $sql .= " AND titre = :search";
            $params[':search'] = $search;
        }

        if (!empty($type)) {
            $sql .= " AND type = :type";
            $params[':type'] = $type;
        }

        if (!empty($year)) {
            $sql .= " AND date_edition = :year";
            $params[':year'] = $year;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Display the search results
        if (!empty($results)) {
            echo "<div class='container-xxl py-5 mt-5'>";
            echo "<div class='container'>";
            echo "<div class='tab-content'>";
            echo "<div id='tab-1' class='tab-pane d-flex fade show p-0 active'>";
            echo "<div class='row g-4'>";

            foreach ($results as $row) {
                echo $card =  "<div class='card'>
                        <div class='bg-image hover-overlay ripple' data-mdb-ripple-color='light'>
                        <img src='images/".$row['image']."' class='img-fluid'/>
                        <a href='#!'>
                            <div class='mask' style='background-color: rgba(251, 251, 251, 0.15);'></div>
                        </a>
                        </div>
                        <div class='card-body'>
                        <h5 class='card-title'>".$row['titre']."</h5>
                        <h4 class='card-title'>".$row['auteur']."</h4>
                        <h4 class='card-title'>".$row['date_edition']."</h4>
                        <span>".$row['pages']." Pages</span>
                        <a href='#!' class='btn btn-primary'>Button</a>
                        </div>
                    </div>
                    ";
            }
            echo "</div></div></div></div></div>";
        }else {
            echo $card = "No results found.";
        }
    
    
    }

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
.navi {
    background-color: #3A1078;
    color: white;
  
}
a.text-decoration-none {
    color: white;
    font-weight: bold;
    margin-left: 49px;
}
.col-md-4.input-group {
    width: 608px;
}
select.form-control.form-select.border-0 {
    width: 99px;
    height: 35px;
    border-radius: 13px;
}
input.form-control.border-0.search-slt {
    width: 99px;
    height: 35px;
    border-radius: 13px;

}
.col-md-4{
    width: 125px;
}

input.btn.btn-primary {
    border-radius: 17px;
    background: #2F58CD;
    border-radius: 0px 17px 17px 0px;
    font-weight: 600;
    font-size: 15px;
    /* line-height: 10px; */
    text-align: center;
    letter-spacing: 0.16em;

}
input.form-control.search {
    border-radius: 17px 0px 0px 17px;
    padding-left: 29px;
}
.input-group {
    position: relative;
    margin-bottom: 0px;
    border-bottom: none; 
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
</style>

</html>