<?php
include 'db_connection.php'; // Make sure to include your database connection file

if (isset($_GET['id'])) {
    $client_id = $_GET['id'];

    // Sanitize the input to prevent SQL injection
    $client_id = mysqli_real_escape_string($con, $client_id);

    // Delete query
    $delete_query = "DELETE FROM clients WHERE id = '$client_id'";

    // Execute the query
    if (mysqli_query($con, $delete_query)) {
        echo "Client deleted successfully.";
        // Redirect to the clients list page or a success page
        header('Location: patients1.php');
    } else {
        echo "Error deleting client: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}
?>
