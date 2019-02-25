<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/ico.php"); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Produkty skoczek</title>

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
<h2>Produkty:</h2>
<?php include($_SERVER['DOCUMENT_ROOT']."/php/img_produkt.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/php/dbdata.php"); ?>
<?php
 if(isset($_GET['id'])){
 $id = $_GET['id'];
$zdj_src=img_news($id);
try{
  $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
  $pdo->exec("set names utf8");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $pdo->query('SELECT id, nazwa, opis, cena FROM produkty WHERE id='.$id.'');
  $row = $stmt->fetch();

 
        echo'     <img class="thumbnail img-responsive center-block img-thumbnail"  src="'.$zdj_src.'" style="margin: auto;  max-width:40%;" alt="Zdjęcie do produktu - id='.$row['id'].'">
                  <p style="text-align:center; color:black;" class="text-center center-block"><h3 style="text-align:center;">'.$row['nazwa'].'</h3>
                  <h4 style="text-align:center;">'.$row['cena'].'zł</h4><a href="/php/dodaj_do_koszyka.php?id='.$row['id'].'"><button style="margin-left:44%" class="btn btn-primary">Dodaj do koszyka!</button></a></p>
                  
                  <div class="jumbotron" style="padding:10px;">
                  <h3>Opis:</h3>
                  <p>'.$row['opis'].'</p>
                  </div>';
  
      $stmt->closeCursor();
      }
    catch(PDOException $e)
 {
  echo"<b>Błąd biblioteki PDO podczas wczytywania!</b><br>
  Błąd:".$e->getMessage()."<br><b> Za chwilę nastąpi przekierowanie...</b>";
  exit;
  } }
      else{
  header("HTTP/1.1 301 Moved Permanently");
  header("Refresh: 12; url=/pages/edytuj_produkt.php");echo"<b>Błąd - nie podano id przedmiotu!</b><br>
  Błąd:".$e->getMessage()."<br><b> Za chwilę nastąpi przekierowanie...</b>";
  exit;
      }
?>

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