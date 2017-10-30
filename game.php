<?php
session_start();

//var_dump($_SESSION["phpgame"]);die;
function displayCase($x, $y)
{
    return"<div style='border:2px solid black; width:56px; height:56px;background-color:black;'><span style='font-size:6px;background-color:red;color:white;'></span></div>";
}
function displayObject($x, $y)
{
  return"<div style='border:2px solid black; width:56px; height:56px;'><img src='./aveugle.gif' style='width:100%;'></div>";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?php echo $_SESSION['phpgame']['gameName'] ?></title>
  </head>
  <body style="display:flex;width:<?php echo ($_SESSION['phpgame']['axes']['x'] * 60) ?>px;flex-wrap:wrap;">
                                  <!-- La width prend la valeur de l'axe * la taille d'un case de l'axe-->
    <?php
      for ($y=1; $y <= $_SESSION['phpgame']['axes']['y'] ; $y++) {
        //For qui itere sur chacun des elements Y,
        for ($x=1; $x <= $_SESSION['phpgame']['axes']['x']; $x++) {
          //For qui itere sur chacun des elements X,
          if(!isset($_SESSION['posPlayer'])) {
            //Si le joueur n'a jamais été placé dans une partie;
            if($y == 1 && $x == 1) {
              //Si la position acutelle du geretaeur de plateau actuel est x=1,  y=2
              $_SESSION['posPlayer'] = array(
                "x" => $x,
                "y" => $y,
              );
              //J'affiche le joueur dans le plateau
              echo displayObject($x, $y);

            } else {
              //Si le joueur n'existe pas mais que ce n'est pas sa position
              //Correspond à la position actuelle du generateur
              echo displayCase($x, $y);
              //Appele du style du player
            }
            //Si le joueur est déjà stocké en session, et que sa position
            //Sinon si Y et X sont égales aux valeurs des axes
          } else if($y == $_SESSION['posPlayer']['y'] && $x == $_SESSION['posPlayer']['x']) {
            //J'afficje le heros sur la carte
            echo displayObject($x, $y);
          } else {
            if($x == $_SESSION['phpgame']['victory']['x'] && $y == $_SESSION['phpgame']['victory']['y'])
            {
              echo "<div style='border:1px solid black; width:56px; height:56px;'><img style='width:100%;' src='./lunettes.jpg'></div>";
            }else if($x == $_SESSION['phpgame']['loose']['x'] && $y == $_SESSION['phpgame']['loose']['y'])
            {
              echo "<div style='border:1px solid black; width:56px; height:56px;'><img style='width:100%;' src='./falaise.jpg'></div>";
            }
            else {
              echo displayCase($x, $y);
            }
          }
      }
      echo "<br>";
    }

    if(($_SESSION['phpgame']['victory']['x'] == $_SESSION['posPlayer']['x']) && ($_SESSION['phpgame']['victory']['y'] == $_SESSION['posPlayer']['y'])) {
            echo "<img src='victoire.png'>";

          }
    if(($_SESSION['phpgame']['loose']['x'] == $_SESSION['posPlayer']['x']) && ($_SESSION['phpgame']['loose']['y'] == $_SESSION['posPlayer']['y'])) {
                echo "<img src='echec.jpg'>";
            }
    ?>
    <form action="./src/reset.php">
      <input type="hidden" value="on">
      <input type="submit" value="reset">
    </form>
    <form action="./src/move.php" method="POST">
      <input type="hidden" name="direction" value="UP">
      <input type="submit" value="&#8593;">
    </form>
    <form action="./src/move.php" method="POST">
      <input type="hidden" name="direction" value="DOWN">
      <input type="submit" value="&#8595;">
    </form>
    <form action="./src/move.php" method="POST">
      <input type="hidden" name="direction" value="RIGHT">
      <input type="submit" value="&#8594;">
    </form>
    <form action="./src/move.php" method="POST">
      <input type="hidden" name="direction" value="LEFT">
      <input type="submit" value="&#8592;">
    </form>





  </body>
</html>
