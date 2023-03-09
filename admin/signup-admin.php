<?php 
require '../conection.php';
?>

<?php
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name  = $_POST['name'];
       
        $email = $_POST['email'];
        $password = md5($_POST['password']);
     


        $error = '';

        if (empty($name)  || empty($email) || empty($password) ) {
            $error = 'Please enter all the values';
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email format';
        } else {
            $select = "SELECT * FROM admine WHERE emailAdm = :email";
            $stmt = $pdo->prepare($select);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $error = 'Email already exists in the database';
        } else {
			// Insert data into the database
			$insert = "INSERT INTO admine (nom_admin, emailAdm, passAdm) 
            VALUES (:name, :email, :password)";
            $stmt = $pdo->prepare($insert);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);           
            $stmt->execute();

			header ("location: signin-admin.php");
	
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

    <link href="../style.css" rel="stylesheet" media="all">
    <meta name="robots" content="noindex, follow">
</head>

<nav class="site-nav">
        <div class="site-navigation d-flex justify-content-between fixed-top py-3 px-5 align-items-center" style="background-color:#3A1078;">
            <a href="#" class="logo ms-4 rounded-circle bg-white"><img src="../images//oasis-low-resolution-logo-color-on-transparent-background.png" height="60px"></a>
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
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Name" name="name">
                            <input class="input--style-2" type="text" placeholder="Email" name="email">
                            <input class="input--style-2" type="password" placeholder="Password" name="password">
                            
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
                        <span class="have">Already have an account? <a href="./signin-admin.php" class="have">Sign In</a> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

  


</body>

<style>
   .input--style-2 {
    padding: 21px 18px;
    color: #fff;
    margin: 0px 2px;
    background: #3a1078;
   
}




.title {
    margin-bottom: 32px;
    font-size: 47px;
    letter-spacing: 0.12em;
    text-align: center;
    color: #FFFFFF;
}
.card-2 .card-heading {
    background: url("../images/guzel-maksutova-B30XL_m3fso-unsplash\ \(1\).jpg") top left/cover no-repeat;
    width: 45.1%;
    border-radius: 4px;
    box-shadow: inset 8px 0px 6px #3a1078;

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
.card.card-2 {
    display: flex;
    flex-direction: row-reverse;
    padding-top: 69px;
}
.card-body {
    width: 45%;
    padding-right: 121px;
}
</style>
</html>
