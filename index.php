<?php 
include("db.php") 
?>

<?php 
include("includes/header.php") 
?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])) {?>
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php session_unset(); }?>

            <div class="card card-body">
                <form action="save_player.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Player's name" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="position" class="form-control" placeholder="Position" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="age" class="form-control" placeholder="Age" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="save_player" value="Save Player">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-borderer">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM players";
                    $result_players = mysqli_query($conn, $query);
                    
                    while($row = mysqli_fetch_array($result_players)) { ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['position'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_player.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
include("includes/footer.php") 
?>