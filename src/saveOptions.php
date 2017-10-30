<?php
  session_start();
  unset($_SESSION['phpgame']);
  $options = array(
    "gameName" => $_GET['gameName'],
    "axes" => array(
      "x" => $_GET['x'],
      "y" => $_GET['y'],
    ),
    "victory" => array(
      "x" => rand(2, $_GET['x']),
      "y" => rand(1, $_GET['y']),
      "appearance" => "lunettes.jpg",
    ),
    "loose" => array(
      "x" => rand(2,$_GET['x']),
      "y" => rand(1,$_GET['y']),
      "appearance" => "falaise.jpg",
    )
  );
  $_SESSION['phpgame'] = $options;
  header('Location: ../index.php');
