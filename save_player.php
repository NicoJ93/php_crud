<?php

include("db.php");

if(isset($_POST['save_player'])){ /* Corrobora si existe el metodo POST */
    $name = $_POST['name'];
    $lastname = $_POST['position'];
    $age = $_POST['age']; /* Crea las variables*/

    $query = "INSERT INTO players (name, position, age) VALUES ('$name', '$lastname', '$age')";
    $result = mysqli_query($conn, $query);/* Se envían los datos a la BD */
    
    if (!$result){
        die('Query failed');
    }
    
    $_SESSION['message'] = 'Player saved succesfully';
    $_SESSION['message_type'] = 'success';

    header("location: index.php");
}

?>