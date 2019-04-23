<?php require_once 'db.php';

$id = $_GET['id'];

$sql = 'DELETE FROM people WHERE id=:id';

$state = $connection->prepare($sql);

if ($state->execute([":id" => $id])) {
    
}
header("Location: /");
?>