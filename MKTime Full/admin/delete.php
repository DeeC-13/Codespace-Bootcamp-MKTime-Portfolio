
<?php
# Open database connection.
require ( 'connect_db.php' ) ;
  session_start();

    if (isset($_GET['item_id'])) {
        $id = $_GET['item_id'];
    }

    $sql = "DELETE FROM products WHERE item_id = '$id'";

    if ($link->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: admin.php");
    } else {
        echo "Error deleting record:".$link->error;
    }
    

    include 'include/footer.php';
?>