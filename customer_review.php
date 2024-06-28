<?php 
    include "reservation/database.php";
    if(isset($_POST["submit_review"])){
        $name = $_POST["name"];
        $rate = $_POST["rate"];
        $description = $_POST["dec"];
        $sql = "INSERT INTO reviews (Name, Rating, Feedback) VALUES 
        ('$name','$rate', '$description')";
        $result = $db->query($sql);
        header('Location: index.html');
        $db->close();
    }
?>