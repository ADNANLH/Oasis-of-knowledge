<?php 
require './conection.php';
?>

<?php
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name  = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $phone  = $_POST['phone'];
        $address  = $_POST['address'];
        $cin = $_POST['cin'];
        $birthday  = $_POST['birthday'];
        $type  = $_POST['type'];
        $pinalite = 0;


        $error = '';

        if (empty($name) || empty($username) || empty($email) || empty($password) || empty($phone) || empty($phone) || empty($address) || empty($cin) || empty($birthday) || empty($type)) {
            $error = 'Please enter all the values';
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email format';
        } else {
            $select = "SELECT * FROM adherent WHERE email = :email";
            $stmt = $pdo->prepare($select);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = 'Email already exists in the database';
        } else {
			// Insert data into the database
			$insert = "INSERT INTO adherent (name, userN, addresse, email, passWrd, phone, CIN, date_naiss, type, date_creat, pinalite) 
            VALUES (:name, :user, :address, :email, :password, :phone, :cin, :birthday, :type, NOW(), :pinalite)";
            $stmt = $pdo->prepare($insert);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':user', $username);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':cin', $cin);
            $stmt->bindParam(':birthday', $birthday);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':pinalite', $pinalite);
            $stmt->execute();

			header ("location: signin.php");
	
			// Check if the insertion was successful
			
		}
	}
	
}

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

<nav class="site-nav">
        <div class="site-navigation d-flex justify-content-between fixed-top py-3 px-5 align-items-center" style="background-color:#3A1078;">
            <a href="index.php" class="logo ms-4 rounded-circle bg-white"><img src="./images//oasis-low-resolution-logo-color-on-transparent-background.png" height="60px"></a>
        </div>
    </nav>
<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading">
                    <div>

                        <!-- <img src="./images/guzel-maksutova-B30XL_m3fso-unsplash (1).jpg" alt="" srcset=""> -->
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="title">SIGN UP</h2>
                    <form method="POST">
                        <div class="inputs">
                            <input class="input--style-2" type="text" placeholder="Name" name="name">
                            <input class="input--style-2" type="text" placeholder="Username" name="username">

                        </div>
                        
                        <div class="inputs">
                            <input class="input--style-2" type="text" placeholder="Address" name="address">
                            <input class="input--style-2" type="number" placeholder="Phone" name="phone">

                        </div>
                        
                        <div class="inputs">
                            <input class="input--style-2" type="text" placeholder="Email" name="email">
                            <input class="input--style-2" type="password" placeholder="Password" name="password">

                        </div>

                        <div class="inputs">
                            <input class="input--style-2" type="text" placeholder="CIN" name="cin">
                            <input class="input--style-2" type="date" placeholder="Birthday" name="birthday">
                            <div class="rs-select2 js-select-simple ">
                                        <select name="type">
                                            <option disabled="disabled" selected="selected">type</option>
                                            <option>Etudiant</option>
                                            <option>Fonctionnaire</option>
                                            <option>Employé</option>
                                            <option>Femme</option>
                                            <option>Foyer</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>

                        </div>
                        <?php
						
                            if(isset($error)){
                                echo "<p class='para' style='color: red;'>" . $error . "</p>";
                            }
						 
						 
						?>

                      
                        
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">SIGN UP</button>
                        </div>
                    </form>
                    <div class="have_one">
                        <span class="have">Already have an account? <a href="./Signin.php" class="have">Sign In</a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

  


</body>

<style>
    .input--style-2 {
    padding: 8px 14px;
    color: #fff;
    margin: 0px 43px;
    font-size: 15px;
    background: #3a1078;
    border-bottom: solid white 2px;
    font-weight: 500;
}
.inputs{
    position: relative;
    margin-bottom: 32px;
    display: flex;
    flex-direction: row;
    /* border-bottom: 1px solid #e5e5e5; */
}

select {
    background: #FFFFFF;
    border-radius: 9px;
    color: #3a1078;
    font-weight: bold;
    width: 98px;
    font-size: 13px;
    width: 94px;
    padding: 0px 10px;
    height: 30px;
}
.rs-select2.js-select-simple {
    align-self: end;
}

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
