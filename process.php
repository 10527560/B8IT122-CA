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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is comming from a form

            //mysql credentials
            $mysql_host = "localhost";
            $mysql_username = "root";
            $mysql_password = "password";
            $mysql_database = "demo";

            $u_name = filter_var($_POST["user_name"], FILTER_SANITIZE_STRING); //set PHP variables like this so we can use them anywhere in code below
            $u_email = filter_var($_POST["user_email"], FILTER_SANITIZE_EMAIL);
            $u_text = filter_var($_POST["user_text"], FILTER_SANITIZE_STRING);

            if (empty($u_name)){
                    die("Please enter your name");
            }
            if (empty($u_email) || !filter_var($u_email, FILTER_VALIDATE_EMAIL)){
                    die("Please enter valid email address");
            }

            if (empty($u_text)){
                    die("Please enter text");
            }

            //Open a new connection to the MySQL server
            //see https://www.sanwebe.com/2013/03/basic-php-mysqli-usage for more info
            $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

            //Output any connection error
            if ($mysqli->connect_error) {
                    die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
            }

            $statement = $mysqli->prepare("INSERT INTO users_data (user_name, user_email, user_message) VALUES(?, ?, ?)"); //prepare sql insert query
            //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
            $statement->bind_param('sss', $u_name, $u_email, $u_text); //bind values and execute insert query

            if($statement->execute()){
                    print "Hello " . $u_name . " Welcome to Team 2's Page. Your Message was " . $u_text ."" ;
            }else{
                    print $mysqli->error; //show mysql error if any
            }
    }
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
