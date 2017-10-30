<?php
  session_start();
if (isset($_SESSION["phpgame"]))
{
  header("Location: game.php");
}else
{
  header("Location: launchOptions.php");
}
  
