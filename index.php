<?php

require("./views/index.view.php");
require("database.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);

    // Create a sql query to add registered username/password to database
    $sql = "INSERT INTO `users` (`user`, `password`)
            VALUE ('$username', '$passwordHashed')";

    // Check username is available before initiating the query
    try {
      mysqli_query($conn, $sql);
      echo "Registration Successful!";
    }
    catch (mysqli_sql_exception) {
      echo "Username already taken!";
    }
  }