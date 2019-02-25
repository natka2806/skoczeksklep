<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/ico.php"); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Szczegóły zamówienia skoczek</title>

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

<h2>Zamówienie:</h2>
<table class="table">
  <thead>
    <tr>
      <th>ID produktu:</th>
      <th>Nazwa:</th>
      <th>Cena:</th>
    </tr>
  </thead>
  <tbody>



<?php include($_SERVER['DOCUMENT_ROOT']."/php/dbdata.php"); ?>
<?php
$id_zamowienia=$_GET['id_z'];
$id_uzytkownik=$_GET['id_u'];
$suma=0;
try{
  $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
  $pdo->exec("set names utf8");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->query("SELECT id, nazwa, cena FROM produkty where id IN (select id_produkt from koszyk where id_zamowienia ='$id_zamowienia' AND id_uzytkownik='$id_uzytkownik')");
      
      foreach($stmt as $row)
      { 
         $suma=$suma+ $row['cena'];
         
      
        echo'
        <tr>
         <td>'.$row['id'].'</td>
          <td><a style="color:black;" href="/pages/produkt.php?id='.$row['id'].' ">
                  <p style="color:black;">'.$row['nazwa'].'</a></td><td>'.$row['cena'].'zł</p>
          </td><td></td></tr>';
      }
      echo'<tr><td></td><td></td><td><b>SUMA: '.$suma.'zł</b></td><td></td></tr>';
      echo' </tbody>
</table>';

      echo'Dane zamawiającego: <table class="table">
  <thead>
    <tr>
      <th>Email:</th>
      <th>Imie:</th>
      <th>Nazwisko:</th>
      <th>Telefon:</th>
      <th>Ulica:</th>
      <th>Numer domu:</th>
      <th>Kod pocztowy:</th>
      <th>Miasto:</th>
    </tr>
  </thead>
  <tbody>';
       $stmt = $pdo->query("SELECT `id`, `email`, `haslo`, `admin`, `imie`, `nazwisko`, `ulica`, `miasto`, `kod_pocztowy`, `numer_domu`, `telefon` FROM `uzytkownicy` WHERE id='$id_uzytkownik'");
       foreach($stmt as $row){
       echo'<tr>
      <td>'.$row['email'].'</td>
      <td>'.$row['imie'].'</td>
      <td>'.$row['nazwisko'].'</td>
      <td>'.$row['telefon'].'</td>
      <td>'.$row['ulica'].'</td>
      <td>'.$row['numer_domu'].'</td>
      <td>'.$row['kod_pocztowy'].'</td>
      <td>'.$row['miasto'].'</td></tr>';}
       echo' </tbody>
</table>';
      $stmt->closeCursor();
      }
      catch(PDOException $e){
        echo '<div class="alert alert-danger" role="alert"><strong>Błąd!</strong> Błąd biblioteki PDO!.<br>Powiadom Administratora! '.$e.'</div><br>';
      }
      


?>

 <h4>Zmien status zamówiania na:</h4>
 <table class="table">
   <thead>
     <tr>
       <th><a href="/php/zmien_status_zamowienia.php?id=<?php echo $id_zamowienia ; ?>&status=Oczekuje">Oczekuje</a></th>
       <th><a href="/php/zmien_status_zamowienia.php?id=<?php echo $id_zamowienia ; ?>&status=Realizacja">Realizacja</a></th>
       <th><a href="/php/zmien_status_zamowienia.php?id=<?php echo $id_zamowienia ; ?>&status=Zrealizowano">Zrealizowano</a></th>
     </tr>
   </thead>
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