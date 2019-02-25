<?php session_start();?>
<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/ico.php"); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Informacje skoczek</title>

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
<h2>Informacje:</h2>
Witamy w naszym sklepie internetowym! Nasz sklep powstał dla pasjonatów sportów którzy szukają swojego wymarzonego sprzętu bez wychodzenia z domu :) 
Jednak również zapraszamy do naszego sklepu stacjonarnego :) Każde produkty są wysyłane zaraz po zaksęgowaniu wpłaty :) 
Mieszkasz do 20 km od naszego stacjonarnego sklepu ? Potrzebujesz spodni na już bo swoje zgubuiłeś a chciałbyś iść po ćwiczyć? 
Zamów przez nasz sklep i wyślij maila z inf: PILNE! :) a do 30 minut będziemy u ciebie z towarem ! Oczywiście jeżeli jest dostępny na magazynie :)

Serdecznie zapraszamy do skorzystania z naszej oferty :)
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