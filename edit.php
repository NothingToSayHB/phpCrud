<?php 
    require_once 'db.php';

    $id = $_GET['id'];
    $sql = "SELECT * FROM people WHERE id = :id";
    $state = $connection->prepare($sql);
    $state->execute([':id' => $id]);
    $person = $state->fetch(PDO::FETCH_OBJ);
    $massage = '';

    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "UPDATE people SET name=:name, email=:email WHERE id=:id";
        $state = $connection->prepare($sql);

        if ($state->execute([':name' => $name, ':email' => $email, ':id' => $id])) {
            $massage = 'Complete';
            header("refresh: 3 url=index.php");
        }
        
    }

?>

<?php require_once 'header.php'; ?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Update data</h2>
            </div>
            <?php if (!empty($massage)): ?>
                <div class="alert alert-success"><?php echo $massage;?></div>
            <?php endif;?>
            <div class="card-body">
                <form method="post">
                    <div class="from-group">
                    <label for="name">Name</label>
                    <input type="text" value="<?php echo $person->name; ?>" name="name" id="name" class="form-control">
                    </div>
                    <div class="from-group">
                    <label for="email">Email</label>
                    <input type="email" value="<?php echo $person->email; ?>" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                    <button type="sumbit" class="btn btn-info">Update Person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once 'footer.php'; ?>
