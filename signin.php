<?php 
require './conection.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Au Register Forms by Colorlib</title>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link href="style.css" rel="stylesheet" media="all">
    <meta name="robots" content="noindex, follow">
</head>


<body>
<div class="site-navigation d-flex justify-content-between fixed-top py-3 px-5 align-items-center" style="background-color:#3A1078;">
            <a href="index.php" class="logo ms-4 rounded-circle bg-white"><img src="./images//oasis-low-resolution-logo-color-on-transparent-background.png" height="60px"></a>
        </div>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading">
                    <div>

                        <!-- <img src="./images/guzel-maksutova-B30XL_m3fso-unsplash (1).jpg" alt="" srcset=""> -->
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="title">SIGN IN</h2>

                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Email.." name="email">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="password" placeholder="Password" name="password">
                        </div>
                        <?php
                        if (!empty($_SESSION['error'])) {
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                            ?>

                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" name="submit">Sign In</button>
                        </div>


                        <?php


                            if (isset($_POST['submit'])) {

                                $email = $_POST['email'];
                                $password = $_POST['password'];
                                // $pass =  md5($password);

                                //check if the input in email format
                                if (empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $_SESSION['error'] = "<div class='error'>*Your Email is required, try again.</div>";
                                } 
                                else if (empty($password)) {
                                    $_SESSION['error'] = "<div class='error'>*Password is required.</div>";
                                }else{
                                    $stmt = $pdo->prepare('SELECT * FROM `adherent` WHERE email=:email AND passWrd=:password');
                                    $stmt->bindParam(':email', $email);
                                    $stmt->bindParam(':password', $password);
                                    $stmt->execute();
                                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    if (count($result) === 1) {
                                        $row = $result[0];
                                        if ($row['email'] === $email && $row['passWrd'] === $password) {
                                            $_SESSION['name'] = $row['Name'];
                                            $_SESSION['id_adh'] = $row['id_adh'];
                                            header("Location: index.php");
                                        } else {
                                           $_SESSION['error'] = "<div class='error'>*the Email or the Password incorrect, try again.</div>";
                                        }
                                    } else {
                                        $_SESSION['error'] = "<div class='error'>*the Email and the Password incorrect, try again.</div>";
                                    }
                                    
                                }
                            }

                           


                        ?>

                    </form>
                    <div class="have_one">
                        <span class="have">You dont have an account? <a href="./SignUp.php" class="have">Sign Up</a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

  


</body>



<style>
    .title {
    margin-bottom: 32px;
    font-size: 47px;
    letter-spacing: 0.12em;
    text-align: center;
    color: #FFFFFF;
}
.card-2 .card-heading {
    background: url("./images/guzel-maksutova-B30XL_m3fso-unsplash\ \(1\).jpg") top left/cover no-repeat;
    width: 45.1%;

    width: 410px;
    height: 488px;
    left: 762px;
    top: -170px;
}
.wrapper--w960 {
    max-width: 1280px;
    width: 1154px;
}
.error {
    font-size: 12px;
    margin-top: 19px;
    margin-bottom: 39px;
    letter-spacing: 1px;
    color: #FF5F3C;
}
.have_one {
        margin-top: 10px;
        margin-right: 40%;
    }
    span.have {
        color: #FFFFFF;
    }
    a.have {
        color: #FFFFFF;
        font-weight: 650;
        text-decoration: none;
    } 
    .btn--green {
    background: #2F58CD;
    width: 186px;
    height: 53px;
    margin: 22px 4px;
}
img {
    height: 55px;
    position: relative;
    left: 107px;
    top: 62px;
}

</style>
</html>
