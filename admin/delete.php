<?php

require "../conection.php";
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


if(isset($_GET['id'])){
    $id_ouvre = $_GET['id'];

    $sql = "DELETE e FROM emprunt e
    JOIN reservation r ON e.id_res = r.id_res
    WHERE r.id_ouvre = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_ouvre);
    $stmt->execute();

    // delete from reservation table
    $sql1 = "DELETE FROM reservation WHERE id_ouvre = :id";
    $stmt = $pdo->prepare($sql1);
    $stmt->bindParam(':id', $id_ouvre);       
    $stmt->execute();

    // delete from ouvre table
    $sql2 = "DELETE FROM ouvre WHERE id_ouvre = :id";
    $stmt = $pdo->prepare($sql2);
    $stmt->bindParam(':id', $id_ouvre);       
    $stmt->execute();

    header("location: indexAdm.php");
    exit(); 
}
?>
