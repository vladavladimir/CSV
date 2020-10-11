<?php
include ('post.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSV import</title>
</head>
<body>
<h1>Select csv file an import it to database</h1>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="sub" value="Import"><br><br>

</form>

<a href="view.php">View</a>