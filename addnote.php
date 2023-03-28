<?php
// Connect to the database
$conn = mysqli_connect('localhost', 'username', 'password', 'adminlogin');

// Check if the note was submitted
if (isset($_POST['note_title']) && isset($_POST['note_content'])) {
  // Sanitize the input data to prevent SQL injection
  $note_title = mysqli_real_escape_string($conn, $_POST['note_title']);
  $note_content = mysqli_real_escape_string($conn, $_POST['note_content']);

  // Insert the note into the database
  mysqli_query($conn, "INSERT INTO notes (note_title, note_content) VALUES ('$note_title', '$note_content')");

  // Redirect back to the admin page
  header('Location: adminpage.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Note</title>
</head>
<body>
  <h1>Add Note</h1>

  <form method="post">
    <label for="note_title">Title:</label>
    <input type="text" id="note_title" name="note_title" required><br><br>

    <label for="note_content">Content:</label><br>
    <textarea id="note_content" name="note_content" rows="10" cols="50" required></textarea><br><br>

    <input type="submit" value="Add Note">
  </form>
</body>
</html>

