<?php
    
    include "conexion.php";

    if(isset($_POST['submit']))
    {  
                $alert = '';

                $nombre_pasajero = $_POST['nombre_pasajero'];
                $apellido_paterno_pasajero = $_POST['apellido_paterno_pasajero'];
                $apellido_materno_pasajero = $_POST['apellido_materno_pasajero'];
                $ci_pasajero = $_POST['ci_pasajero'];
                $fech_nacimiento = $_POST['fech_nacimiento'];
                $telefono_pasajero = $_POST['telefono_pasajero'];
                $email_pasajero = $_POST['email_pasajero'];
                $password_pasajero = md5($_POST['password_pasajero']);
                $Imagen = addslashes(file_get_contents($_FILES['imagen']["tmp_name"]));

                $query_insert = mysqli_query($conection,"INSERT INTO pasajero(nombre_pasajero,apellido_paterno_pasajero,apellido_materno_pasajero,
                ci_pasajero,fech_nacimiento,telefono_pasajero,email_pasajero,password_pasajero,Estado,imagen)
                VALUES('$nombre_pasajero','$apellido_paterno_pasajero','$apellido_materno_pasajero','$ci_pasajero','$fech_nacimiento','$telefono_pasajero','$email_pasajero','$password_pasajero','1','$Imagen')");
               
                if($query_insert)
                {
                   
				        	header("location: pagina_pasajeros");
                }
                else
                {

			        		echo "Error al registrarse";
                }        
    }   
    
?>
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Contactos</title>
  <!-- Template CSS -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <!-- Template CSS -->
</head>

<body>
  <!--header-->
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <h1><a class="navbar-brand" href="index.html">
        <span>20</span>de agosto
          </a></h1>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa icon-expand fa-bars"></span>
          <span class="fa icon-close fa-times"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link" href="index.html">Inicio </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Sobre Nosotros?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html">Servicios</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="login_pasajeros.php">Reservas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login_empleados.php">empleados</a>
            </li>
          </ul>
          <ul class="navbar-nav search-right mt-lg-0 mt-2">
            <li class="nav-item mr-3" title="Search"><a href="#search" class="btn search-search">
                <span class="fa fa-search" aria-hidden="true"></span></a></li>
            <li class="nav-item"><a href="contact.html" class="btn btn-primary d-none d-lg-block btn-style mr-2">Contactanos </a></li>
          </ul>

          <!-- //toggle switch for light and dark theme -->
          <!-- search popup -->
          <div id="search" class="pop-overlay">
            <div class="popup">
              <form action="#" method="GET" class="d-sm-flex">
                <input type="search" placeholder="Search.." name="search" required="required" autofocus>
                <button type="submit">Search</button>
                <a class="close" href="#url">&times;</a>
              </form>
            </div>
          </div>
          <!-- /search popup -->
        </div>
        <!-- toggle switch for light and dark theme -->
        <div class="mobile-position">
          <nav class="navigation">
            <div class="theme-switch-wrapper">
              <label class="theme-switch" for="checkbox">
                <input type="checkbox" id="checkbox">
                <div class="mode-container">
                  <i class="gg-sun"></i>
                  <i class="gg-moon"></i>
                </div>
              </label>
            </div>
          </nav>
        </div>
      </nav>
    </div>
  </header>
  <!--/header-->
   <!-- about breadcrumb -->
   <section class="w3l-about-breadcrumb position-relative text-center">
    <div class="breadcrumb-bg breadcrumb-bg-about py-sm-5 py-4">
      <div class="container py-lg-5 py-3">
        <h2 class="title">Reservas</h2>
        <ul class="breadcrumbs-custom-path mt-2">
          <li><a href="#url">Inicio</a></li>
          <li class="active"><span class="fa fa-angle-double-right mx-2" aria-hidden="true"></span> Reservas </li>
        </ul>
      </div>
    </div>
  </section>
  <!-- //about breadcrumb -->
  <section class="w3l-contact-11">
		<div class="form-41-mian py-5">
			<div class="container py-lg-4">
			  <div class="row align-form-map">
          <div class="col-lg-6 form-inner-cont">
					  <div class="title-content text-left">
						  <h3 class="hny-title mb-lg-5 mb-4">REGISTRATE AHORA!</h3>
					 </div>
           <form action="#" method="POST"enctype="multipart/form-data" class="signin-form">
                <span class="fa fa-user" aria-hidden="true"></span>
                <div class="form-input">
                  <input name="nombre_pasajero" id="nombre_pasajero" type="text" value="" placeholder="Nombre" >
                </div>
              <div class="row con-two">
         
                <div class="col-lg-6 form-input">
                <span class="fa fa-user" aria-hidden="true"></span>
                  <input name="apellido_paterno_pasajero" id="apellido_paterno_pasajero" type="text" value="" placeholder="Apellido Paterno" >
                </div>

   
                <div class="col-lg-6 form-input">
                <span class="fa fa-user" aria-hidden="true"></span>
                  <input name="apellido_materno_pasajero" id="apellido_materno_pasajero" type="text" value="" placeholder="Apellido Materno" >
                </div>
              </div>
            	
              <div class="row con-two">

                <div class="col-lg-6 form-input">
                <span class="fa fa-license" aria-hidden="true"></span>
                  <input name="ci_pasajero" id="ci_pasajero" type="text" value="" placeholder="Carnet de identidad" >
                </div>

                <div class="col-lg-6 form-input">
                <span class="fa fa-credential" aria-hidden="true"></span>
                  <input name="fech_nacimiento" id="fech_nacimiento" type="date" value="" >
                </div>
              </div>

              <div class="row con-two">
              
                <div class="col-lg-6 form-input">
                <span class="fa fa-phone" aria-hidden="true"></span>
                  <input name="telefono_pasajero" id="telefono_pasajero" type="text" value="" placeholder="Telefono" >
                </div>

                <div class="col-lg-6 form-input">
                <span class="fa fa-envelope" aria-hidden="true"></span>
                  <input name="email_pasajero" id="email_pasajero" type="email" value="" placeholder="Email" >
                </div>
              </div>
                <span class="fa fa-lock" aria-hidden="true"></span>
                <div class="wthree-field">
                  <input name="password_pasajero" id="password_pasajero" type="Password" placeholder="Password">
                </div>
         
              <span class="fa fa-folder" aria-hidden="true"></span>
              <div class="wthree-field">
                <input name="imagen" id="imagen" type="file" >
              </div> 
              <div class="wthree-field">
              <button type="submit" name= "submit" id ="submit" class="btn btn-style">Registrar</button>							  
              </div> 
            	
          </form>				
				</div> 
				<div class="col-lg-6 contact-left pr-lg-4">
					<div class="partners">
					  <div class="cont-details">
						<div class="title-content text-left">
            <h3 class="hny-title">La mejor experiencia</h3>
              <h6 class="sub-title">LOS MEJORES PRECIOS-LOS MEJORES BUSES</h6>
						</div>
						<p class="mt-3 mb-4 pr-lg-5">Hola, Estamos disponibles las 24 horas del día, los 7 días de la semana por fax, correo electrónico o por teléfono. Escríbenos para que podamos hablar
más sobre eso.</p>
						<h6 class="mb-4"> Para obtener más información o consultas sobre nuestro proyecto de productos y precios, no dude en ponerse en contacto con nosotros. </h6>
					  <div class="hours">
						<h6 class="mt-4">Email:</h6>
						<p> <a href="mailto:info@example.com">
							Trans20deagosto@gmail.com</a></p>
						<h6 class="mt-4">Dirección:</h6>
						<p> Av. Acero #24</p>
						<h6 class="mt-4">Contacto:</h6>
						<p class="margin-top"><a href="tel:+(21) 255 999 8899">+(21)
							255 999 8899</a></p>
					  </div>
            
            <div class="account">
              <p class="text-center">Quieres Volver al <a href="index.html">Inicio</a></p>
            </div>
              <p class="mt-4" >Ya tienes una cuenta?<a class="mt-4" href="login_pasajeros.php">Inicia sesión ahora!</a></p>
					</div>
				  </div>
			  </div>
			</div>
		  </div>
	  </section>
	<!-- //contact-form -->
  <!-- footer-66 -->
  <footer class="w3l-footer-66">
    <section class="footer-inner-main">
      <div class="footer-hny-grids py-5">
        <div class="container py-lg-4">
          <div class="text-txt">
            <div class="row newsletter-grids-footer">
              <div class="col-lg-6 newsletter-text pr-lg-5">
                <h3 class="hny-title two">Quieres ser parte de nosotros?</h3>
                <h4>Ingresa Tu Correo Electronico Para Ser Parte De Una Experiencia Unica 
                </h4>
              </div>
              <div class="col-lg-6 newsletter-right">
                <form action="#" method="post" class="footer-newsletter">

                  <input type="email" name="email" class="form-input" placeholder="Ingresa tu email..">

                  <button type="submit" class="btn">Sucribete</button>
                </form>
              </div>
            </div>
            <div class="right-side">
              <div class="row sub-columns">
                <div class="col-lg-4 col-md-6 sub-one-left pr-lg-4">
                  <h2><a class="navbar-brand" href="index.html">
                      <span>20</span>de Agosto
                    </a></h2>
                  <!-- if logo is image enable this   
										<a class="navbar-brand" href="#index.html">
											<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
										</a> -->
                  <p class="pr-lg-4">Somos una empresa transitaria con amplia experiencia en el sector
                    del transporte interprovincial e intercantona </p>
                  <div class="columns-2">
                    <ul class="social">
                      <li><a href="#facebook"><span class="fa fa-facebook" aria-hidden="true"></span></a>
                      </li>
                      <li><a href="#linkedin"><span class="fa fa-linkedin" aria-hidden="true"></span></a>
                      </li>
                      <li><a href="#twitter"><span class="fa fa-twitter" aria-hidden="true"></span></a>
                      </li>
                      <li><a href="#google"><span class="fa fa-google-plus" aria-hidden="true"></span></a>
                      </li>
                      <li><a href="#github"><span class="fa fa-github" aria-hidden="true"></span></a>
                      </li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 sub-one-left">
                  <h6>Our Services</h6>
    <div class="mid-footer-gd sub-two-right">

                    <ul>
                      <li><a href="about.html"><span class="fa fa-angle-double-right mr-2"></span> Nosotros</a>
                      </li>
                      <li><a href="services.html"><span class="fa fa-angle-double-right mr-2"></span> Servicios</a>
                      </li>
                      <li><a href="#"><span class="fa fa-angle-double-right mr-2"></span> Empleados</a>
                      </li>
                      <li><a href="#"><span class="fa fa-angle-double-right mr-2"></span>Pasajeros</a>
                      </li>
                    </ul>
                    
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 sub-one-left">
                  <h6>Contactos</h6>
                  <div class="sub-contact-info">
                    <p>Dirección: Monteagudo Bolivia.</p>
                    <p class="my-3">Phone: <strong><a href="tel:+24160033999">75824569</a></strong></p>
                    <p>E-mail:<strong> <a href="mailto:info@example.com">20deagosto2021@gmail.com</a></strong></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="below-section">
        <div class="container">
          <div class="copyright-footer">
            <div class="columns text-lg-left">
              <p>© 2021 20 de agosto | Designed by <a href="https://w3layouts.com">Yadira Tirado</a></p>
            </div>
            <ul class="columns text-lg-right">
              <li><a href="#">Politica de privacidad</a>
              </li>
              <li>|</li>
              <li><a href="#">Terminos de funcionamiento</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- copyright -->
      <!-- move top -->
      <button onclick="topFunction()" id="movetop" title="Go to top">
        <span class="fa fa-long-arrow-up" aria-hidden="true"></span>
      </button>
      <script>
        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function () {
          scrollFunction()
        };

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
          } else {
            document.getElementById("movetop").style.display = "none";
          }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
          document.body.scrollTop = 0;
          document.documentElement.scrollTop = 0;
        }
      </script>
      <!-- /move top -->

    </section>
  </footer>
  <!--//footer-66 -->
  <!-- Template JavaScript -->
  <script src="assets/js/jquery-3.3.1.min.js"></script>
  <script src="assets/js/theme-change.js"></script>
  <!-- disable body scroll which navbar is in active -->
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll which navbar is in active -->
  <!--/MENU-JS-->
  <script>
    $(window).on("scroll", function () {
      var scroll = $(window).scrollTop();

      if (scroll >= 80) {
        $("#site-header").addClass("nav-fixed");
      } else {
        $("#site-header").removeClass("nav-fixed");
      }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function () {
      $("header").toggleClass("active");
    });
    $(document).on("ready", function () {
      if ($(window).width() > 991) {
        $("header").removeClass("active");
      }
      $(window).on("resize", function () {
        if ($(window).width() > 991) {
          $("header").removeClass("active");
        }
      });
    });
  </script>
  <!--//MENU-JS-->

  <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>