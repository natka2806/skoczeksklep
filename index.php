<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/ico.php"); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="Strona sklepu sportowego Skoczek.">

<title>Strona główna sklepu sportowego Skoczek</title>

    <!-- Bootstrap -->
<link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

<?php include($_SERVER['DOCUMENT_ROOT']."/parts/menu.php"); ?>

<div class="row" style="margin: 60px 0px 0px 0px; ">

<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2"><?php include($_SERVER['DOCUMENT_ROOT']."/parts/left-panel.php"); ?></div>
  <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
  <div class="panel panel-default"><!--style="background-color: rgba(208,208,208,0.6);-->
<div class="panel-body">
<!--poczatek karuzeli 1250x500-->
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/carousel.php"); ?>
<!--koniec karuzeli-->
<br>
<hr>    

<img class="img-responsive" style="text-align: center; margin: auto;" src="/img/page/nowe_produkty.png"  style="margin: auto 0;" alt="Nowe produkty:">

<?php include($_SERVER['DOCUMENT_ROOT']."/php/img_produkt.php"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/php/dbdata.php"); ?>
<?php
try{
  $pdo = new PDO('mysql:host='.$mysql_host.';dbname='.$database.';port='.$port, $username, $password );
  $pdo->exec("set names utf8");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $stmt = $pdo->query('SELECT id, nazwa, cena FROM produkty ORDER BY id DESC LIMIT 9');
      
      foreach($stmt as $row)
      { 
          $zdj_src=img_news($row['id']);
         
      
        echo'
          
          <div class="col-lg-3 col-md-3 col-push-4 ">
          <a href="/pages/produkt.php?id='.$row['id'].'">
                  <img class="thumbnail img-responsive center-block img-thumbnail"  src="'.$zdj_src.'" style="margin: auto; height:180px; weigth:180px;" alt="Zdjęcie do produktu - id='.$row['id'].'">
                  <p style="text-align:center; color:black;">'.$row['nazwa'].'<br>
                  '.$row['cena'].'zł</p>
          </a>
          </div>'
                ;
      }
      $stmt->closeCursor();
      }
      catch(PDOException $e){
        echo '<div class="alert alert-danger" role="alert"><strong>Błąd!</strong> Błąd biblioteki PDO!.<br>Powiadom Administratora!</div><br>';
      }
?>



</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer.php"); ?>
</div>
</div>


<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2" style="position: static;"><?php include($_SERVER['DOCUMENT_ROOT']."/parts/right-panel.php"); ?>
</div>
</div>
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/footer-bottom.php"); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/js/bootstrap.min.js"></script>
  </body>
</html>