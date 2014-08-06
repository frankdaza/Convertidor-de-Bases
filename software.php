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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>
      function validator_hexadecimal() {
        var x = document.getElementById("hexadecimal");
        x.value = x.value.toUpperCase();
      }

      function decimal2(str) {        
        
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {            
            document.getElementById("binary").value=xmlhttp.responseText;            
          }
        }        
        xmlhttp.open("GET","controllers/decimal_binary.php?decimal="+str,true);        
        xmlhttp.send();

        var xmlhttp2=new XMLHttpRequest();
        xmlhttp2.onreadystatechange=function() {
          if (xmlhttp2.readyState==4 && xmlhttp2.status==200) {            
            document.getElementById("octal").value=xmlhttp2.responseText;
          }
        }        
        xmlhttp2.open("GET","controllers/decimal_octal.php?decimal="+str,true);        
        xmlhttp2.send();

        var xmlhttp3=new XMLHttpRequest();
        xmlhttp3.onreadystatechange=function() {
          if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {            
            document.getElementById("hexadecimal").value=xmlhttp3.responseText;
          }
        }        
        xmlhttp3.open("GET","controllers/decimal_hexadecimal.php?decimal="+str,true);      
        xmlhttp3.send();
      }

      function binary2(str) {        
        
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {            
            document.getElementById("decimal").value=xmlhttp.responseText;            
          }
        }        
        xmlhttp.open("GET","controllers/binary_decimal.php?binary="+str,true);        
        xmlhttp.send();

        var xmlhttp2=new XMLHttpRequest();
        xmlhttp2.onreadystatechange=function() {
          if (xmlhttp2.readyState==4 && xmlhttp2.status==200) {            
            document.getElementById("octal").value=xmlhttp2.responseText;
          }
        }        
        xmlhttp2.open("GET","controllers/binary_octal.php?binary="+str,true);        
        xmlhttp2.send();

        var xmlhttp3=new XMLHttpRequest();
        xmlhttp3.onreadystatechange=function() {
          if (xmlhttp3.readyState==4 && xmlhttp3.status==200) {            
            document.getElementById("hexadecimal").value=xmlhttp3.responseText;
          }
        }        
        xmlhttp3.open("GET","controllers/binary_hexadecimal.php?binary="+str,true);        
        xmlhttp3.send();
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
            <input name="decimal" type="text" class="form-control" id="decimal" onkeyup="decimal2(this.value)" maxlength="20">            
            <p class="text-danger text-center" id="errorDecimal"></p>
          </div>
        </div>
        <div class="form-group">
          <label for="binary" class="col-sm-4 control-label">BINARIO</label>
          <div class="col-sm-5">
            <input name="binary" type="text" class="form-control" id="binary" onkeyup="binary2(this.value)" maxlength="20" >
            <p class="text-danger" id="errorBinary"></p>
          </div>
        </div>
        <div class="form-group">
          <label for="octal" class="col-sm-4 control-label">OCTAL</label>
          <div class="col-sm-5">
            <input name="octal" type="text" class="form-control" id="octal" maxlength="20">
            <p class="text-danger" id="errorOctal"></p>
          </div>
        </div>
        <div class="form-group">
          <label for="hexadecimal" class="col-sm-4 control-label">HEXADECIMAL</label>
          <div class="col-sm-5">
            <input name="hexadecimal" type="text" class="form-control" id="hexadecimal" maxlength="20"  onkeyup="validator_hexadecimal()" >
            <p class="text-danger" id="errorHexadecimal"></p>
          </div>
        </div>
        <div class="form-group">
        <div class="col-sm-offset-5 col-sm-10">
          <a href="clear.php" class="btn btn-danger">Borrar</a>          
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
    <script src="js/collapse.js"></script>
    <script src="js/transition.js"></script>
    <script src="js/dropdown.js"></script>
    <script src="js/validator.js"></script>
  </body>
</html>
