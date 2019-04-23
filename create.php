<?php 
    require_once 'db.php';
    if (isset($_POST['name']) && isset($_POST['email'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $sql = "INSERT INTO people(email, name) VALUES(:email, :name)";
        $state = $connection->prepare($sql);
        $massage = '';

        if ($state->execute([':name' => $name, ':email' => $email])) {
            $massage = 'Complete';
            header("refresh: 3 url=index.php");
        }
        
    }

?>

<?php require_once 'header.php'; ?>

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create a preson</h2>
            </div>
            <?php if (!empty($massage)): ?>
                <div class="alert alert-success">
                    <?php echo $massage;?>
                </div>
            <?php endif;?>
            <div class="card-body">
                <form method="post">
                    <div class="from-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="from-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                    <button type="sumbit" class="btn btn-info">Create Person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once 'footer.php'; ?>
