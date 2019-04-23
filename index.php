<?php

require_once 'db.php'; 
$sql = "SELECT * FROM people";
$state = $connection->prepare($sql);
$state->execute();
$people = $state->fetchAll(PDO::FETCH_OBJ);
//var_dump($people);
?>
<?php require_once 'header.php';?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>All people</h2>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach($people as $person) :?>
                    <tr>
                        <td><?php echo $person->id; ?></td>
                        <td><?php echo $person->name; ?></td>
                        <td><?php echo $person->email; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $person->id?>" class="btn btn-info">Edit</a>
                            <a onClick="confirm('Are u sure??');" href="/delete.php?id=<?php echo $person->id?>" id="delete" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach?>
                </table>
            </div>
        </div>
    </div>

<?php require_once 'footer.php'; ?>
