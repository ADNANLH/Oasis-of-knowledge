<?php

session_start();
require "../conection.php";
$id_admin = $_SESSION['id_admin'];

$stmt = $pdo->prepare("SELECT * FROM admine WHERE id_admin = :id_admin");
$stmt->bindParam(':id_admin', $id_admin);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>



<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Add a work</title>
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link href="../style.css" rel="stylesheet" media="all">
    <meta name="robots" content="noindex, follow">
</head>

<nav class="site-nav">
        <div class="site-navigation d-flex justify-content-between fixed-top py-3 px-5 align-items-center" style="background-color:#3A1078;">
            <a href="#" class="logo ms-4 rounded-circle bg-white"><img src="../images/oasis-low-resolution-logo-color-on-transparent-background.png" height="60px"></a>
        </div>
    </nav>
<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading">
                    <div>

                        
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="title">Add a work</h2>
                    <form method="POST">
                        <div class="row">

                            <div class="input-group col-md-6">
                                <input class="input--style-2" type="text" placeholder="Title" name="title">
                                <input class="input--style-2" type="text" placeholder="Author" name="author">
                            </div>
                     
                            
                        </div>
                        <div class="input-group col-md-6">
                            <input class="input--style-2" type="date" placeholder="Publishing date" name="publishing">
                            <input class="input--style-2" type="date" placeholder="Date of purchase" name="purchase">
                           
                        </div>
                        <div class="input-group col-md-6">
                            <input class="input--style-2" type="number" placeholder="Pages" name="pages">
                            <input type="file" class="upload-input" name="image" />
                            

                            
                            
                        </div>
                        <div class="input-group col-md-6">
                           

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
                                <select name="state" class="form-control form-select border-0">
                                    <option value="" disabled selected>State</option>
                                    <option value="New">New</option>
                                    <option value="Good">Good</option>
                                    <option value="Acceptable">Acceptable</option>
                                    <option value="Already used">Already used</option>
                                    <option value="Torn">Torn</option>
                                </select>
                            </div>
                            
                        </div>
                    

                        
                        <?php
						
                            if(isset($error)){
                                echo "<p class='para' style='color: red;'>" . $error . "</p>";
                            }
						 
						 
						?>

                      
                        
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Add</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>


    
<?php
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title  = $_POST['title'];
       
        $author = $_POST['author'];
        $publishing = $_POST['publishing'];
        $purchase = $_POST['purchase'];
        $pages = $_POST['pages'];
        $type = $_POST['type'];
        $state = $_POST['state'];

        $imagename = $_FILES['image']['tmp_name'];
        $filename = $_FILES["image"]["name"];
        $fileExtension = explode('.', $filename);
        $fileExtension = end($fileExtension);
        $filename1 = uniqid('', true) . ".$fileExtension";
        $folder = "../images/" . $filename1;
        move_uploaded_file($imagename, $folder);
     


        $error = '';

        if (empty($title)  || empty($author) || empty($publishing) || empty($purchase) || empty($pages) || empty($type) || empty($state) ) {
            $error = 'Please enter all the values';
        } else {
            
			// Insert data into the database
			$insert = "INSERT INTO ouvre (titre, auteur, image, etat, type, date_edition, date_achat, pages ) 
            VALUES (:title, :author, :image, :state, :type, :publishing, :purchase, :pages )";
            $stmt = $pdo->prepare($insert);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':image', $image);           
            $stmt->bindParam(':state', $state);           
            $stmt->bindParam(':type', $type);           
            $stmt->bindParam(':publishing', $publishing);           
            $stmt->bindParam(':purchase', $purchase);           
            $stmt->bindParam(':pages', $pages);           
            $stmt->execute();

			header ("location: indexAdm.php");
	
			// Check if the insertion was successful
			
		}
	
	
}

?>
  

  


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
    background: url("../images/kimberly-farmer-lUaaKCUANVI-unsplash.jpg") top left/cover no-repeat;
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
