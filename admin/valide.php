<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


require "../conection.php";
session_start();
if(isset($_GET['id'])){
    
    $id_res = $_GET['id'];
    $id_admin =  $_SESSION['id_admin'];
        $date_emp= date("Y/m/d h:i:sa");
        $date_eff= date("Y/m/d h:i:sa", strtotime("+15 days", strtotime($date_emp)));

    
        $sql = " INSERT INTO emprunt (date_emp, date_eff, date_final, id_res, id_admin) 
        VALUES (:date_emp , :date_eff, :date_final, :id_res, :id_admin )";
        $stmt = $pdo->prepare($sql);
       
        $stmt->bindParam(':date_emp', $date_emp);
        $stmt->bindParam(':date_eff', $date_eff);
        $stmt->bindValue(':date_final', '');
        $stmt->bindParam(':id_res', $id_res);
        $stmt->bindParam(':id_admin', $id_admin);
        $stmt->execute();
       
        
        
        header("location: reservAdm.php");
        
        
    }
   
?>