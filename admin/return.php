<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require "../conection.php";
session_start();
if(isset($_GET['id'])){
    
    $id_emp = $_GET['id'];
    $id_admin =  $_SESSION['id_admin'];
    $date_final= date("Y/m/d h:i:sa");

    
    $sql = "UPDATE emprunt SET date_final = :date_final, id_admin = :id_admin WHERE id_emp = :id_emp";
       
    $stmt = $pdo->prepare($sql);
       
    $stmt->bindValue(':date_final', $date_final);
    $stmt->bindParam(':id_admin', $id_admin);
    $stmt->bindParam(':id_emp', $id_emp);
    $stmt->execute();

       
        
        
        header("location: reservAdm.php");



        
        
}
   
?>