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
                    <form method="POST" enctype="multipart/form-data">
                        
                        <div class="inputs">
                            <input class="input--style-2" type="text" placeholder="Title" name="title">
                            <input class="input--style-2" type="text" placeholder="Author" name="author">
                        </div>

                        <div class="inputs">
                            <input class="input--style-2" type="date" placeholder="Publishing date" name="publishing">
                            <input class="input--style-2" type="date" placeholder="Date of purchase" name="purchase">
                           
                        </div>

                        <div class="inputs">
                            <input class="input--style-2" type="number" placeholder="Pages" name="pages">
                            <input class="form-control form-select border-0" type="file" name="image1" >                 
                        </div>

                        <div class="inputs">

                            <div class="rs-select2 js-select-simple ">
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

                            <div class="rs-select2 js-select-simple ">
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
                    


                      
                        
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit" name="submit">Add</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
        <?php
            ob_start();
            require "../conection.php";
            if (isset($_POST['submit'])){
                $type = '';
                $state = '';                
                $title = $_POST['title'];
                $author = $_POST['author'];
                $publishing = $_POST['publishing'];
                $purchase = $_POST['purchase'];
                $pages = $_POST['pages'];
                $type = $_POST['type'];
                $state = $_POST['state'];
                $allowedExtensions = array('jpg', 'png', 'jpeg');
                $fileExtension1 = '';
                    
                if(isset($_FILES['image1']) && $_FILES['image1']['error'] === 0) {
                    $imagename1 = $_FILES['image1']['tmp_name'];
                    $filename1 = $_FILES["image1"]["name"];
                    $fileExtension1 = pathinfo($_FILES['image1']['name'], PATHINFO_EXTENSION);
                    $filename11 = uniqid('', true) . ".$fileExtension1";
                    $folder1 = "../images/" . $filename11;
                    move_uploaded_file($imagename1, $folder1);
                       
                }else{
                    $error = 'The file is not present or has an error';
                }
                    
                if (!isset($title)  || !isset($author) || !isset($publishing) || !isset($purchase) || !isset($pages) || !isset($type) || !isset($state) ) {
                    $error = 'Please enter all the values';
                }elseif(!in_array($fileExtension1, $allowedExtensions)) {
                    $error = "Only JPG and PNG and JPEG Extensions are allowed!";
                     
                }else{   
                        // Insert data into the database
                       $insert = "INSERT INTO ouvre (titre, auteur, image, etat, type, date_edition, date_achat, pages ) 
                        VALUES (:title, :author, :image, :state, :type, :publishing, :purchase, :pages )";
                        $stmt = $pdo->prepare($insert);
                        $stmt->bindParam(':title', $title);
                        $stmt->bindParam(':author', $author); 
                        $stmt->bindParam(':image', $filename11);           
                        $stmt->bindParam(':state', $state);           
                        $stmt->bindParam(':type', $type);           
                        $stmt->bindParam(':publishing', $publishing);           
                        $stmt->bindParam(':purchase', $purchase);           
                        $stmt->bindParam(':pages', $pages);           
                        $stmt->execute();
                        header("Location: indexAdm.php");
                        exit(); 
                    }
                    
            }
            if (isset($error)) {
                echo $error;
            }
            ob_end_flush(); 
    
        ?>
</div>
  
  
  


</body>

<style>
   .input--style-2 {
    padding: 22px 18px;
    color: #fff;
    width: 231px;
    margin: 0px 2px 4px 63px;
    background: #3a1078;
    }
    .inputs{
        position: relative;
        margin-bottom: 32px;
        display: flex;
        flex-direction: row;
    
    }

    select {
        background: #FFFFFF;
        border-radius: 9px;
        color: #3a1078;
        font-weight: bold;
        font-size: 13px;
        width: 94px;
        margin: 16px 16px 0px 141px;
        padding: 0px 10px;
        height: 30px;
    }
    .rs-select2.js-select-simple {
        align-self: end;
    }

    input[type="file"] {
        color: white;
        padding: 25px 0px 0px 0px;
        color: #fff;
        width: 249px;
        margin: 8px 0px 4px 62px;
        background: #3a1078;
        
    }
    input::file-selector-button {
        background: #FFFFFF;
        border-radius: 9px;
        color: #3a1078;
        font-weight: bold;
        font-size: 13px;
        width: 120px;
        border: none;
        
       
        height: 30px;
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
        width: 62%;
        padding-right: 116px;
    }
</style>
</html>
