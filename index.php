<?php

require("./views/index.view.php");


if (isset($_POST['submit'])) {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
  $password = $_POST['password'];
  echo "Your email address is: {$email}, Password is {$password}";
}