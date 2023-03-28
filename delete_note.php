<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'root', '5523241267aA', 'adminlogin');

// Check if the note ID was provided
if (isset($_GET['note_id'])) {
  // Sanitize the input data to prevent SQL injection
  $note_id = mysqli_real_escape_string($conn, $_GET['note_id']);

  // Delete the note from the database
  mysqli_query($conn, "DELETE FROM notes WHERE note_id = '$note_id'");
}

// Redirect back to the admin page
header("Location: adminpage.php");
exit();
?>

