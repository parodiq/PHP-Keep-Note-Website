<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  
  <style>
table {
  font-family: Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 12px;
}

th {
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

a {
  color: #4CAF50;
  text-decoration: none;
}

a:hover {
  color: #3e8e41;
  text-decoration: underline;
}

/* Styling the table header */
.table-header {
  font-size: 24px;
  font-weight: bold;
  text-transform: uppercase;
  letter-spacing: 2px;
  background-color: #333;
  color: white;
  border: none;
}

/* Styling the delete button */
.delete-button {
  background-color: #f44336;
  color: white;
  border: none;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 4px;
}

.delete-button:hover {
  background-color: #d32f2f;
}


  
  /* Styles for the paragraph */
  p {
    font-size: 1.5em;
    font-weight: bold;
    text-align: center;
    margin-bottom: 1.5em;
    color: #333;
  }


 h2, p {
    font-family: Arial, sans-serif;
    color: #333;
    text-align: center;
    margin-top: 20px;
  }
  
  
  h6 {
    font-family: Arial, sans-serif;
    color: #333;
    text-align: center;
    margin-top: 20px;
  }

  label {
    display: block;
    font-family: Arial, sans-serif;
    margin-top: 10px;
  }

  input[type="text"], textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
    font-family: Arial, sans-serif;
  }

  button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
  }

  button[type="submit"]:hover {
    background-color: #3e8e41;
  }
footer {
  color: black;
  font-size: 14px;
  padding: 20px;
  text-align: center;
  position: center;
  bottom: 0;
  width: 100%;
}



</style>



</head>




<body>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      
      

      
<div class="container" style="background-color: dark;">



<h2>Welcome Admin !</h2>


<p>Here are your notes:</p>

<h6>Here you can make your notes to keep on hand.</h6>


<form action="adminpage.php" method="post">
  <label for="note_title">Note Title:</label>
  <input type="text" name="note_title" id="note_title">
  <label for="note_content">Note Content:</label>
  <textarea name="note_content" id="note_content"></textarea> 
<br>
<br>
  <h6>And easily you can press the delete button to erase the note forever.</h6>
  <button type="submit" class="btn btn-success">Add Note</button>
</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>



<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</body>
</html>



<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '5523241267aA', 'adminlogin');

// Retrieve the admin's username from the database
$username = '';
$result = mysqli_query($conn, "SELECT username FROM adminlogin");
if (mysqli_num_rows($result) > 0) {
   $row = mysqli_fetch_assoc($result);
   $username = $row['username'];
}

// Check if the note was submitted
if (isset($_POST['note_title']) && isset($_POST['note_content'])) {
   // Sanitize the input data to prevent SQL injection
   $note_title = mysqli_real_escape_string($conn, $_POST['note_title']);
   $note_content = mysqli_real_escape_string($conn, $_POST['note_content']);

   // Check if the input fields are not empty
   if (!empty($note_title) && !empty($note_content)) {
     // Insert the note into the database with the timestamp
     mysqli_query($conn, "INSERT INTO notes (note_title, note_content, created_at) VALUES('$note_title', '$note_content', NOW())");
   }
}

// Retrieve all notes from the database
$result = mysqli_query($conn, "SELECT * FROM notes");

// Check if any notes were returned
if (mysqli_num_rows($result) > 0) {
   echo '<table>';
   echo '<tr class="table-header"><th>Note Title</th><th>Note Content</th><th>Created At</th><th>Delete</th></tr>';
   while ($row = mysqli_fetch_assoc($result)) {
     // Display each note in a table row with the timestamp
     echo '<tr>';
     echo '<td>' . $row['note_title'] . '</td>';
     echo '<td>' . $row['note_content'] . '</td>';
     echo '<td>' . $row['created_at'] . '</td>';
     echo '<td><a class="delete-button" href="delete_note.php?note_id=' . $row['note_id'] . '">Delete</a></td>';
     echo '</tr>';
   }
   echo '</table>';
}

// Close the database connection
mysqli_close($conn);
?>


<html>

<body>
<br>
<br>
<br>
<h6>
yourKeepNote is a web-based application that allows users to create and manage their own notes. With yourKeepNote, users can easily jot down ideas, reminders, and to-do lists and organize them in a way that makes sense to them.

Adding notes to yourKeepNote is a breeze. Simply open the app, click on the "New Note" button, and start typing. You can add as much or as little information as you want, and yourKeepNote will automatically save your note as you type.

But what happens when you no longer need a note? yourKeepNote has you covered. With just a few clicks, you can delete any note that you no longer need. This not only helps keep your notes organized but also ensures that you're not cluttering up your workspace with unnecessary information.

So whether you're a student, a professional, or just someone who needs to keep track of things, yourKeepNote is the perfect solution for all your note-taking needs. Try it out today and experience the convenience of a simple yet powerful note-taking app!
</h6>
<br>
<br>
<div class="container" style="margin-top:5%">
    <form action="logout.php" method="post">
    <h6>By clicking on the log out button, you can exit the admin panel, and your notes will always be recorded in the database.</h6>
    <button action="button" class="btn btn-success" style="margin-top:2%">Logout</button>
    <br>
    <br>
    <br>
    
    
    
     
    
    
  </form>
  <footer>
  yourKeepNote by aws abbas copyright © 2023 all rights reserved.
  </footer>
  </body>
</html>
