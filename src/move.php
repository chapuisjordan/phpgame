<?php
session_start();



if($_POST['direction'] == 'UP')
{
  if(($_SESSION['posPlayer']['y'] - 1) > 0)
  {
    $_SESSION['posPlayer']['y']--;
    header('Location: ../game.php');die;
  }else
  {
    echo "<img src='../echec.jpg'>";die;
  }

}else if ($_POST['direction'] == 'DOWN')
{
  if(($_SESSION['posPlayer']['y'] + 1) <= ($_SESSION['phpgame']['axes']['y']))
  {
    $_SESSION['posPlayer']['y']++;
    header('Location: ../game.php');die;
  }else
  {
    echo "<img src='../echec.jpg'>";
  }
}else if($_POST['direction'] == 'LEFT')
{
  if(($_SESSION['posPlayer']['x'] - 1) > 0)
  {
    $_SESSION['posPlayer']['x']--;
    header('Location: ../game.php');die;
  }else
  {
    echo "<img src='../echec.jpg'>";die;
  }

}else if($_POST['direction'] == 'RIGHT')
{
  if(($_SESSION['posPlayer']['x'] + 1) <= $_SESSION['phpgame']['axes']['x'])
  {
    $_SESSION['posPlayer']['x']++;
    header('Location: ../game.php');die;
  }else
  {
    echo "<img src='../echec.jpg'>";die;
  }
}
