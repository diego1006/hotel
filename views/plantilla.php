<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="views/images/favicon.ico">
  <title>Software hotelero</title>
	<!-- Vendors Style-->
	<link rel="stylesheet" href="views/assets/css/vendors_css.css">
  <link rel="stylesheet" href="views/assets/vendor_components/datatable/datatables.min.css">

	<!-- Style-->
	<link rel="stylesheet" href="views/assets/css/style.css">
	<link rel="stylesheet" href="views/assets/css/skin_color.css">
  <link rel="stylesheet" href="views/assets/css/fakeLoader.css">
  <!-- <link rel="stylesheet" href="views/assets/vendor_components/bootstrap/dist/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="views/assets/vendor_components/jquery-ui/jquery-ui.css"> -->

	<!-- Vendor JS -->
  <script src="views/assets/js/jquery-3.3.1.min.js"></script>
  <script src="views/assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script src="views/assets/js/vendors.min.js"></script>
	<script src="views/assets/js/pages/chat-popup.js"></script>
 	<script src="views/assets/icons/feather-icons/feather.min.js"></script>
  <script src="views/assets/vendor_components/datatable/datatables.min.js"></script>
  <script src="views/assets/vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>
  <script src="views/assets/vendor_components/jquery-steps-master/build/jquery.steps.js"></script>
  <script src="views/assets/vendor_components/sweetalert/sweetalert.min.js"></script>
  <script src="views/assets/vendor_components/select2/dist/js/select2.full.js"></script>
  <script src="views/assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js"></script>

  <!-- src="../assets/vendor_components/sweetalert/sweetalert.min.js" -->
	<!-- Adnix Admin App -->
	<script src="views/assets/js/template.js"></script>
  <script src="views/assets/js/fakeLoader.js"></script>
  <script src="views/assets/js/pages/toastr.js"></script>
  <script src="views/assets/js/pages/notification.js"></script>


</head>

<!-- <body> -->
<?php
if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
  if (isset($_GET["ruta"])) {
        if (
          $_GET["ruta"] == "inicio" ||
          $_GET["ruta"] == "salir"  ||
          $_GET["ruta"] == "reservas" ||
          $_GET["ruta"] == "checkin" ||
          $_GET["ruta"] == "checkout" ||
          $_GET["ruta"] == "habitaciones" ||
          $_GET["ruta"] == "pagos" ||
          $_GET["ruta"] == "caja" ||
          $_GET["ruta"] == "ingresos" ||
          $_GET["ruta"] == "egresos" ||
          $_GET["ruta"] == "pisos" ||
          $_GET["ruta"] == "clientes" ||
          $_GET["ruta"] == "usuarios" ||
          $_GET["ruta"] == "configuracion"
      ) {
?>
				<body class="hold-transition light-skin sidebar-mini theme-primary fixed sidebar-collapse">
          <div class="wrapper">
            <div id="fakeLoader"></div>
              <script type="text/javascript">
                $("#fakeLoader").fakeLoader({
                  timeToHide: 1000,
                  zIndex: 2,
                  spinner: "spinner7",
                  bgColor: "#F0F0F0",
                });
              </script>
  					<?php
  					// =========================================================================
  					// Cabecera
  					// =========================================================================
  					include "plantillas/cabecera.php";
  					// =========================================================================
  					// Menú
  					// =========================================================================
  					include "plantillas/menu.php";
  					// =============================================================
  					// Contenido
  					// =============================================================
  					include "views/" . $_GET["ruta"] . ".php";
  					?>
          </div>
				</body>
        <?php
      } else {
        ?>
          <body class="hold-transition light-skin sidebar-mini theme-primary fixed sidebar-collapse">
            <div class="wrapper">
              <?php
              include "plantillas/cabecera.php";

              include "plantillas/menu.php";

              include "views/404.php";
              ?>
            </div>
          </body>
	<?php
        }
    } else {
        echo ' <div id="fakeLoader"></div>
                    <script type="text/javascript">
                        $("#fakeLoader").fakeLoader({
                            timeToHide:1000,
                            zIndex:1999,
                            spinner:"spinner7",
                            bgColor:"#F0F0F0",
                        });
                    </script>';
      include "views/login.php";
    }
} else if (isset($_GET["ruta"])) {
    echo ' <div id="fakeLoader"></div>
                    <script type="text/javascript">
                        $("#fakeLoader").fakeLoader({
                            timeToHide:1000,
                             zIndex:1999,
                            spinner:"spinner7",
                            bgColor:"#F0F0F0",
                        });
                    </script>';
    include "views/login.php";
} else {
    echo '<div id="fakeLoader"></div>
                    <script type="text/javascript">
                        $("#fakeLoader").fakeLoader({
                            timeToHide:1000,
                            zIndex:1999,
                            spinner:"spinner7",
                            bgColor:"#F0F0F0",
                        });
                    </script>';
    include "views/login.php";
}
?>
</html>

