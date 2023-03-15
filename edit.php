<?php

include('db.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM players WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $position = $row['position'];
        $age = $row['age'];
    }
}

if (isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $position = $_POST['position'];
    $age = $_POST['age'];

    $query = "UPDATE players set name = '$name', position = '$position', age = '$age' WHERE id = $id";
    mysqli_query($conn, $query); /* Reemplazamos la BD por los nuevos valores */

    $_SESSION['message'] = "Player Updated succesfully";
    $_SESSION['message_type'] = "warning";
    header("Location: index.php");
}

?>

<?php include('includes/header.php') ?>

<div class="container p-4"> <!-- Creamos el HTML para editar la BD -->
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Update name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="position" value="<?php echo $position; ?>" class="form-control" placeholder="Update position">
                    </div>
                    <div class="form-group">
                        <input type="text" name="age" value="<?php echo $age; ?>" class="form-control" placeholder="Update age">
                    </div>
                    <button class="btn btn-success" name="update">
                        Update
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>