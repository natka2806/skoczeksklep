<?php session_start();?>

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/ico.php"); ?>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Kontakt Skoczek</title>

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

<?php echo $_SERVER['DOCUMENT_ROOT']; ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/parts/menu.php"); ?>

<div class="row" style="margin: 60px 0px 0px 0px; ">
<div class="col-xs-0 col-sm-1 col-md-2 col-lg-2"><?php include($_SERVER['DOCUMENT_ROOT']."/parts/left-panel.php"); ?></div>
  <div class="col-xs-12 col-sm-10 col-md-8 col-lg-8">
  <div class="panel panel-default">
<div class="panel-body" >
<!--Tresc strony-->
<div class="jumbotron" style="padding: 10px;" id="zapisy">
<div class="container">

<img src="/img/page/logo.png" alt="Logo Skoczek" class="img-responsive center-block" style="height: 40px;">
<div class="row">
<div class="col-md-6 col-push-6">


<br>
<h3>Kontakt:</h3>

<h3><strong>Sklep sportowy Skoczek</strong></h3>
<h4>Telefon: 123 456 789 <a href="tel:123 456 789"><button type="button" class="btn btn-info">Zadzwoń</button></a></h4>
<h4>E-mail: kontakt@skoczek.pl <a href="kontakt@skoczek.pl"><button type="button" class="btn btn-info">Napisz</button></a></h4>

</div>
<div class="col-md-6 col-pull-6">
<br>
<h3>Adres:</h3>


<h3><strong>Sklep sportowy Skoczek</strong></h3>
<h4>ul. Skoczka 12</h4>
<h4>83-400 Skoczkowo</h4>


</div>
</div>
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9372.735903856736!2d17.922037450189944!3d54.035003282064956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x470270ea877221d3%3A0xf5ab0c8694d3c030!2s83-400+Skoczkowo!5e0!3m2!1spl!2spl!4v1550335666744"  style="border:0;" allowfullscreen></iframe></div>
<hr>


</div>
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
  </body>
</html>