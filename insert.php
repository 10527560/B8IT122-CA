<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Record Form</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  background-color: #f1f1f1;
  padding: 30px;
  text-align: center;
  font-size: 35px;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
  height: 300px;
}

.column.side {
  width: 25%;
}

.column.middle {
  width: 50%;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}

@media (max-width: 600px) {
  .column.side, .column.middle {
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="header">
  <h2>B8IT122 CA TEAM 2</h2>
</div>

<div class="row">
  <div class="column side" style="background-color:#aaa;"></div>
  <div class="column middle" style="background-color:#bbb;">
    <?php

$link = mysqli_connect("127.0.0.1", "root", "password", "demo");


if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);
$last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);
$email = mysqli_real_escape_string($link, $_REQUEST['email']);

// Attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// Close connection
mysqli_close($link);
?>

  </div>
  <div class="column side" style="background-color:#aaa;"></div>
</div>

<div class="footer">
  <p>Prsented by, <br> Daniel Tittello <br>
  Richard burke <br>Neil Hogarty</p>
</div>

</body>
</html>
