<?php
  include "../php/conectar.php";
  $sql = 'SELECT * FROM socios';
  $resultado = mysqli_query($conectar, $sql);
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
    <script type="text/javascript">
      function confirmar(){
        return confirm('¿Esta Seguro que desea eliminar este Socio?');

      }
    </script>
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
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
      <table>
        <tr>
          <td>
            <label>Numero:</label>
            <input type="number" name="numero">
          </td>
          <td>
            <label>Nombre:</label>
            <input type="text" name="nombre">
          </td>
          <td>
            <input type="submit" name="enviar" value="BUSCAR">
          </td>
        </tr>
      </table>
    </form>
    <div class="tabla text-center">
        <table class="table">
            <thead class="table-dark">
                <th>NUMERO DE SOCIO</th>
                <th>NOMBRE Y APELLIDO</th>
                <th>DNI</th>
                <th>TELEFONO</th>
                <th>ACCIONES</th>
            </thead>
         
            <tbody>
          <?php
            while($filas=mysqli_fetch_assoc($resultado)){
          ?>
              <tr>
                <td><?php echo $filas['numero'] ?></td>
                <td><?php echo $filas['nombre'] ?></td>
                <td><?php echo $filas['dni'] ?></td>
                <td><?php echo $filas['telefono'] ?></td>
                <td><?php echo '<a class="ingreso" href="asistencia.php?numero='.$filas["numero"].'">ASISTENCIA</a>';?> 
              </tr>
          <?php
            }
          ?>
              
            </tbody>

        <!--incluir lista desde archivo php-->
      
        </table>
    </div>
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