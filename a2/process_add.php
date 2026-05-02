<?php

include 'includes/db_connect.inc';

// Check if form was submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $age_years = $_POST['age_years'];
    $age_months = $_POST['age_months'];
    $gender = $_POST['gender'];
    $size = $_POST['size'];
    $adoption_fee = $_POST['adoption_fee'];
    $description = $_POST['description'];
    $health_info = $_POST['health_info'];
    $status = $_POST['status'];

    // Get uploaded image information
    $newimageName = $_FILES['image']['name'];
    $tempName = $_FILES['image']['tmp_name'];

    $newImageName = time() . "_" . basename($newimageName);

    // Move uploaded image into pets image folder
    move_uploaded_file($tempName, __DIR__ . "/assets/images/pets/" . $newImageName);
    
    // SQL query to insert new pet into database
    $sql = "INSERT INTO pets 
    (name, species, breed, age_years, age_months, gender, size, adoption_fee, description, health_info, status, image)
    VALUES 
    ('$name', '$species', '$breed', '$age_years', '$age_months', '$gender', '$size', '$adoption_fee', '$description', '$health_info', '$status', '$newimageName')";

    // If insert works, redirect user back to pets page
    if ($conn->query($sql) === TRUE) {
        header("Location: pets.php?success=1");
        exit();
    } 
    
    else {
        echo "Error: " . $conn->error;
    }
}
?>