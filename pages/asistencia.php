<?php
  include "../php/conectar.php";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0"
    />
    <link rel="icon" href="../assets/logo/logo.png" type="logo" />
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <title>Tenis Club Correa - Torneo Amistad</title>
  </head>
  <body style="background-color: rgb(207, 207, 207)">
    <div id="inicio" class="container-fluid">
      <header>
        <!--Start Navbar-->
        <nav>
          <div class="navbar">
            <a href="#inicio"
              ><img class="logo" src="../assets/logo/logo.png" alt="logo_TCC"
            /></a>

            <h1>ASISTENCIA</H1>

            <a class="ingreso" href="../index.html">Salir</a>
          </div>
        </nav>

        <!--End Navbar-->

        <!--Start Sidenav-->
        <div
          id="sidenav"
          class="sidenav navbar navbar-light text-center"
          data-mdb-right="true"
        >
          <div class="imgSidenav">
            <img src="../assets/logo/logo.png" alt="logo_TCC" loading="lazy" />
            <button
              id="btnHamburguer"
              class="navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#collapseWidthExample"
              aria-expanded="false"
              aria-controls="collapseWidthExample"
            >
              <i class="fas fa-bars"></i>
            </button>
          </div>
          <div
            class="side-nav collapse collapse-horizontal"
            id="collapseWidthExample"
          >
            <button
              id="btnHamburguer"
              class="btnVisible navbar-toggler"
              type="button"
              data-mdb-toggle="collapse"
              data-mdb-target="#collapseWidthExample"
              aria-expanded="false"
              aria-controls="collapseWidthExample"
            >
              <i class="fas fa-bars"></i>
            </button>

            <a class="ingreso" href="../index.html">Salir</a>
          </div>
        </div>
        <!--End Sidenav-->
      </header>
      <br /><br /><br />

        <?php
           $tenis=500;
           $patin=300;
            if(isset($_POST['enviar'])){
                $numero=$_POST['numero'];
                $nombre=$_POST['nombre'];
                $domicilio=$_POST['domicilio'];
                $localidad=$_POST['localidad'];
                $sexo=$_POST['sexo'];
                $sangre=$_POST['sangre'];
                $dni=$_POST['dni'];
                $nacimiento=$_POST['nacimiento'];
                $ingreso=$_POST['ingreso'];
                $estado=$_POST['estado'];
                $telefono=$_POST['telefono'];
                $cobrador=$_POST['cobrador'];
                $cuenta=$_POST['cuenta'];


                if(isset($_POST["tenis"])){
                    $cuenta=$cuenta+$tenis;
                }

                if(isset($_POST["patin"])){
                    $cuenta=$cuenta+$patin;
                }

            

                $sql="UPDATE socios SET nombre='".$nombre."', domicilio='".$domicilio."', localidad='".$localidad."', sexo='".$sexo."', sangre='".$sangre."', dni='".$dni."', nacimiento='".$nacimiento."', ingreso='".$ingreso."', estado='".$estado."', telefono='".$telefono."', cobrador='".$cobrador."', cuenta='".$cuenta."' where numero='".$numero."'";
                $resultado = mysqli_query($conectar, $sql);

                if($resultado){
                    echo '<script language="javascript"> alert ("Cambios Realizados Correctamente"); window.location.href="profe.php" </script>';
                }else{
                    echo '<script language="javascript"> alert ("Cambios NO Realizados"); window.location.href="profe.php" </script>';
                }

            }else{
                $numero=$_GET['numero'];
                $sql = 'SELECT * FROM socios where numero="'.$numero.'"';
                $resultado = mysqli_query($conectar, $sql);
                $fila=mysqli_fetch_assoc($resultado);
                $nombre=$fila['nombre'];
                $domicilio=$fila['domicilio'];
                $localidad=$fila['localidad'];
                $sexo=$fila['sexo'];
                $sangre=$fila['sangre'];
                $dni=$fila['dni'];
                $nacimiento=$fila['nacimiento'];
                $ingreso=$fila['ingreso'];
                $estado=$fila['estado'];
                $telefono=$fila['telefono'];
                $cobrador=$fila['cobrador'];
                $cuenta=$fila['cuenta'];

            }

        ?>

        <form action="<?=$_SERVER['PHP_SELF']?>" method='post'>   
            <div class="form-check">
                <input class="form-check-input" name="tenis" type="checkbox" value="" id="flexCheckDefault" />
                <label class="form-check-label" for="flexCheckDefault">Tenis</label>
                </div>

                <!-- Checked checkbox -->
                <div class="form-check">
                <input class="form-check-input" name="patin" type="checkbox" value="" id="flexCheckChecked"/>
                <label class="form-check-label" for="flexCheckChecked">Patin</label>
            </div>        
            <input type="hidden" name="nombre" value="<?php echo $nombre;?>"><br>            
            <input type="hidden" name="domicilio" value="<?php echo $domicilio;?>"><br>            
            <input type="hidden" name="localidad" value="<?php echo $localidad;?>"><br>           
            <input type="hidden" name="sexo" value="<?php echo $sexo;?>"><br>            
            <input type="hidden" name="sangre" value="<?php echo $sangre;?>"><br>           
            <input type="hidden" name="dni" value="<?php echo $dni;?>"><br>           
            <input type="hidden" name="nacimiento" value="<?php echo $nacimiento;?>"><br>           
            <input type="hidden" name="ingreso" value="<?php echo $ingreso;?>"><br>            
            <input type="hidden" name="estado" value="<?php echo $estado;?>"><br>           
            <input type="hidden" name="telefono" value="<?php echo $telefono;?>"><br>          
            <input type="hidden" name="cobrador" value="<?php echo $cobrador;?>"><br>
            <input type="hidden" name="numero" value="<?php echo $numero;?>">
            <input type="hidden" name="cuenta" value="<?php echo $cuenta;?>">
            <input class="ingreso" type="submit" name="enviar" value="ACTUALIZAR"><br>


   

  


        <!--Start Footer-->
      <footer
      class="footer text-center text-white"
      
    >
      <!-- Copyright -->
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.2)"
      >
        © 2022 Copyright:
        <a
          class="text-white"
          target="_blank"
          href="http://www.mgsolutions.com.ar"
          >MG Solutions</a
        >
      </div>
      <!-- Copyright -->
    </footer>
    <!--End Footer-->
  </div>

  <script src="../js/jquery.min.js"></script>
  <script type="text/javascript" src="../js/script.js"></script>
  <!-- MDB -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Custom scripts -->
  <script type="text/javascript"></script>
</body>
</html>