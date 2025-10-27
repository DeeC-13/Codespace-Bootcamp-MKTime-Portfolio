
<?php
# Open database connection.
require ( 'connect_db.php' ) ;

    if (isset($_GET['customer_id'])) {
        $id = $_GET['customer_id'];
    }

    $sql = "DELETE FROM customers WHERE customer_id = $id";

    if ($link->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: customers.php");
    } else {
        echo "Error deleting record:".$link->error;
    }
    

    include 'includes/footer.php';
?>