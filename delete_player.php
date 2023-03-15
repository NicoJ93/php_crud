<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM players WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = 'Player removed Successully';
        $_SESSION['message_type'] = 'danger';
        header('Location: index.php');
    }