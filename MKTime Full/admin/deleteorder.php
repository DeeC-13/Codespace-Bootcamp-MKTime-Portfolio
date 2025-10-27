
<?php
# Open database connection.
require ( 'connect_db.php' ) ;

    if (isset($_GET['order_id'])) {
        $id = $_GET['order_id'];
    }

    $sql = "DELETE FROM orders WHERE order_id = $id";

    if ($link->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: orders.php");
    } else {
        echo "Error deleting record:".$link->error;
    }
    

    include 'includes/footer.php';
?>