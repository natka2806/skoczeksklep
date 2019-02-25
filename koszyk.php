<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/ico.php"); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Koszyk skoczek</title>

    <!-- Bootstrap -->
<link href="/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/lightbox.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <script src='https://www.google.com/recaptcha/api.js'></script>
  </head>
  <body>

<?php include($_SERVER['DOCUMENT_ROOT']."/parts/menu.php"); ?>

<div class="row" style="margin: 60px 0px 0px 0px; ">
<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2"><?php include($_SERVER['DOCUMENT_ROOT']."/parts/left-panel.php"); ?></div>
  <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
  <div class="panel panel-default">
<div class="panel-body" >

<h2>Twój koszyk:</h2>
<table class="table">
  <thead>
    <tr>
      <th>ID produktu:</th>
      <th>Nazwa:</th>
      <th>Cena:</th>
      <th>Usuń:</th>
    </tr>
  </thead>
  <tbody>



<?php include($_SERVER['DOCUMENT_ROOT']."/php/dbdata.php"); ?>
<?php
if(isset($_SESSION['zalogowany'])&&$_SESSION['zalogowany']==true){
$id_uzytkownik=$_SESSION['id'];
$suma=0;
try{
  $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
  $pdo->exec("set names utf8");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->query("SELECT id, nazwa, cena FROM produkty where id IN (select id_produkt from koszyk where id_zamowienia is NULL AND id_uzytkownik='$id_uzytkownik')");
      
      foreach($stmt as $row)
      { 
         $suma=$suma+ $row['cena'];
         
      
        echo'
        <tr>
         <td>'.$row['id'].'</td>
          <td><a style="color:black;" href="/pages/produkt.php?id='.$row['id'].' ">
                  <p style="color:black;">'.$row['nazwa'].'</a></td><td>'.$row['cena'].'zł</p>
          </td><td><a href="/php/usun_z_koszyka.php?id='.$row['id'].'"<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></td></tr>';
      }

      $stmt->closeCursor();
      }
      catch(PDOException $e){
        echo '<div class="alert alert-danger" role="alert"><strong>Błąd!</strong> Błąd biblioteki PDO!.<br>Powiadom Administratora!</div><br>';
      }
      echo'<tr><td></td><td>';
      if($suma>0)echo'<a href="/php/zloz_zamowienie.php"><button class="btn btn-primary">Złóż zamówienie!</button></a>';
      echo'</td><td><b>SUMA: '.$suma.'zł</b></td><td></td></tr>';}
      else
        echo '<h1><a href="/pages/zaloguj.php">Kliknij</a> i zaloguj się!</h1>';
?>

  </tbody>
</table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
</div>


</div>
<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2" style="position: static;"><?php include($_SERVER['DOCUMENT_ROOT']."/parts/right-panel.php"); ?></div>

</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer-bottom.php"); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
<!-- lightbox-->
  <script src="/js/lightbox.js"></script>

 <!-- <script src="/js/prototype.js"></script>
  <script src="/js/scriptaculous/src/scriptaculous.js?load=effects,builder"></script>-->
  </body>
</html>