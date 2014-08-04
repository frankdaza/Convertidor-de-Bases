<?php 

session_start();

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Software Conversor de bases.">
    <meta name="author" content="Frank Edward Daza González.">

    <title>Software Conversor de bases.</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <script>
      function validator_hexadecimal() {
        var x = document.getElementById("hexadecimal");
        x.value = x.value.toUpperCase();
      }     
    </script>
   
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Conversor de Bases</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="equipo.html">Equipo</a></li>            
            <li class="active"><a href="software.php">Software</a></li>
            <li><a href="https://github.com/frankdaza2/Convertidor-de-Bases" target="_blank">Github</a></li>
            <li><a href="#contact">Contacto</a></li>            
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">IDIOMA<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="active"><a href="#">Español</a></li>
                <li><a href="#">Inglés</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <section class="container">      

      <form class="form-horizontal" method="POST" action="controllers/conversorBases.php" role="form">
        <legend class="bg-primary text-center">Ingrese un número en cualquier base</legend>
        <div class="form-group">
          <label class="col-sm-4 control-label" for="decimal">DECIMAL</label>
          <div class="col-sm-5">
            <input name="decimal" type="text" class="form-control" id="decimal" maxlength="20" value=
            <?php 
              if (isset($_SESSION["decimal"])) {                
                echo $_SESSION["decimal"];
                unset($_SESSION["decimal"]);
              }            
            ?>
            >            
            <p class="text-danger text-center" id="errorDecimal">
              <?php 
                if (isset($_SESSION["errorDecimal"])) {
                  echo "No es un número decimal";
                  unset($_SESSION["errorDecimal"]);
                }
              ?>
            </p>
          </div>
        </div>
        <div class="form-group">
          <label for="binary" class="col-sm-4 control-label">BINARIO</label>
          <div class="col-sm-5">
            <input name="binary" type="text" class="form-control" id="binary" maxlength="20" value=
            <?php 
              if (isset($_SESSION["binary"])) {                
                echo $_SESSION["binary"];
                unset($_SESSION["binary"]);          
              }
            ?>
            >
            <p class="text-danger" id="errorBinary">
              <?php 
                if (isset($_SESSION["errorBinary"])) {
                  echo "No es un número binario";
                  unset($_SESSION["errorBinary"]);
                }
              ?>
            </p>
          </div>
        </div>
        <div class="form-group">
          <label for="octal" class="col-sm-4 control-label">OCTAL</label>
          <div class="col-sm-5">
            <input name="octal" type="text" class="form-control" id="octal" maxlength="20" value=
            <?php 
              if (isset($_SESSION["octal"])) {
                echo $_SESSION["octal"];
                unset($_SESSION["octal"]);
              }
            ?>
            >
            <p class="text-danger" id="errorOctal">
              <?php 
                if (isset($_SESSION["errorOctal"])) {
                  echo "No es un número octal";
                  unset($_SESSION["errorOctal"]);
                }
              ?>
            </p>
          </div>
        </div>
        <div class="form-group">
          <label for="hexadecimal" class="col-sm-4 control-label">HEXADECIMAL</label>
          <div class="col-sm-5">
            <input name="hexadecimal" type="text" class="form-control" id="hexadecimal" maxlength="20"  onkeyup="validator_hexadecimal()" value=
            <?php 
              if (isset($_SESSION["hexadecimal"])) {
                echo $_SESSION["hexadecimal"];
                unset($_SESSION["hexadecimal"]);
              }
            ?>
            >
            <p class="text-danger" id="errorHexadecimal">
              <?php 
                if (isset($_SESSION["errorHexadecimal"])) {
                  echo "No es un número hexadecimal";
                  unset($_SESSION["errorHexadecimal"]);
                }
              ?>
            </p>
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-offset-5 col-sm-10">
          <a href="clear.php" class="btn btn-danger">Borrar</a>
          <button type="submit" class="btn btn-primary">Evaluar</button>
        </div>
      </div>
      </form>

    </section> <!-- /container -->

    <footer>
      <p class="text-center">
        Software Conversor de Bases Numéricas. <br>
        Desarrollado para la materia de Métodos Numéricos de la Universidad de San Buenaventura Cali. <br>
        2014.
      </p>
      <img src="img/logousb.png" class="img-responsive" alt="LOGO USBCALI">            
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/collapse.js"></script>
    <script src="js/transition.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/validator.js"></script>
  </body>
</html>
