<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="noindex">
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/ico.php"); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Edytuj produkt skoczek</title>

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
<div class="row">
<div class="col-xs-1 col-sm-3 col-md-4 col-lg-4"></div>
<div class="col-xs-10 col-sm-6 col-md-4 col-lg-4 text-center center-block">
<h2>Edytuj Produkt</h2>
<?php
if(!isset($_GET['id'])){

  echo'<form id="form" method="GET" >
<div class="input-group" style="width: 100%">
<select class="input-group form-control" name="id" id="art" >';
include($_SERVER['DOCUMENT_ROOT']."/php/dbdata.php"); 

try{
  $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
$pdo->exec("set names utf8");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $stmt = $pdo->query('SELECT id, nazwa FROM produkty ORDER BY id DESC');
      
      foreach($stmt as $row)
      {
        echo '<option value="'.$row['id'].'" id="'.$row['id'].'">Produkt ID='.$row['id'].' || Nazwa: '.$row['nazwa'].'</option>';
      }
  } 
  catch(PDOException $e){
        echo '<div class="alert alert-danger" role="alert"><strong>Błąd!</strong> Połączenie z bazą nie mogło zostać utworzone.<br>Powiadom Administratora!</div><br>';
      }
echo'

</select>
<button type="submit"  class="btn btn-primary">Edytuj</button>
</from>
</div>
';
}
else{
  $id = $_GET['id'];
include($_SERVER['DOCUMENT_ROOT']."/php/dbdata.php");

try{
  $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
  $pdo->exec("set names utf8");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->query('SELECT id, nazwa, opis, cena FROM produkty WHERE id='.$id.'');
  $row = $stmt->fetch();
}
 catch(PDOException $e)
 {
  header("HTTP/1.1 301 Moved Permanently");
  header("Refresh: 12; url=/pages/edytuj_produkt.php");echo"<b>Błąd biblioteki PDO podczas wczytywania!</b><br>
  Błąd:".$e->getMessage()."<br><b> Za chwilę nastąpi przekierowanie...</b>";
  exit;
  } 
  echo'

<form method="POST" action="/php/edytuj_produkt.php" enctype="multipart/form-data" class="text-center center-block">
<div class="input-group">
<span class="input-group-addon">ID:</span><input type="text" name="id" value="'.$row['id'].'"  readonly class="form-control"/>
</div>
<div class="input-group">
<span class="input-group-addon">Nazwa: </span><input type="text" name="nazwa" maxlength="240" value="'.$row['nazwa'].'" class="form-control"/>
</div>

<div class="input-group">
<span class="input-group-addon" >Cena: </span><input type="number" min="0.01" max="99999999.99" step="0.01" value="'.$row['cena'].'" name="cena" class="form-control"/>
</div>

<div class="input-group">
<span class="input-group-addon" >Opis: </span><textarea rows="4" cols="50"" name="opis"  class="form-control">'.$row['opis'].'</textarea>
</div>

<button type="submit" name="submit" id="submit" class="btn btn-primary">Zapisz</button>
<button type="reset" name="reset" id="reset" class="btn btn-default">Reset</button>

</form><a href="/pages/edytuj_produkt.php"><button class="btn btn-default">Wróć</button></a>'; } ?>
</div>
<div class="col-xs-1 col-sm-3 col-md-4 col-lg-4"></div>
</div>
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