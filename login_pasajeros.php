<?php

require "conexion.php";
session_start();

			if($_POST)
			{
				$usuario = $_POST['Username'];
				$password = $_POST['Password'];

				 $sql = "SELECT id_pasajero, password_pasajero, nombre_pasajero, apellido_paterno_pasajero, apellido_materno_pasajero, imagen 
         FROM pasajero
				 WHERE email_pasajero ='$usuario'";
				 $resultado =$conexion ->query($sql);
				 $num=$resultado->num_rows;
				 if($num>0)
				 {
					$row = $resultado->fetch_assoc();
					$password_bd=$row['password_pasajero'];

					$pass_c=md5($password);

					if($password_bd == $pass_c){
						$_SESSION['id_pasajero'] = $row['id_pasajero'];
            $_SESSION['ci_pasajero'] = $row['ci_pasajero'];
						$_SESSION['nombre_pasajero'] = $row['nombre_pasajero'];
						$_SESSION['apellido_paterno_pasajero'] = $row['apellido_paterno_pasajero'];
						$_SESSION['apellido_materno_pasajero'] = $row['apellido_materno_empleado'];
						$_SESSION['imagen'] = $row['imagen'];
		
						

				
							header("location: pagina_pasajeros/index.php");


						
					} else {
					
						echo "<script>
						alert('usuario o contraseña incorrecto');
						window.location ='login_pasajeros.php';
						</script>";
					
					}
					
					
					} else {
						echo "<script>
						alert('El usuario no existe');
						window.location ='login_pasajeros.php';
						</script>";
						session_destroy();
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
              <form action="#" method="GET" class="d-sm-flex">
                <input type="search" placeholder="Search.." name="search" required="required" autofocus>
                <button type="submit">Search</button>
                <a class="close" href="#url">&times;</a>
              </form>
          
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
						<h3 class="hny-title mb-lg-5 mb-4">INGRESA AHORA!</h3>
					</div>
					<div class="row con-two">
					   <div class="col-lg-6 ">
             <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<input type="email"  name="Username" id="text_usuario" class="input-form" placeholder="Email"
										required="required" />
								<input type="password"  name="Password" id="text_password" class="input-form"
										placeholder="Contraseña" required="required" />
								<button type="submit" class="btn btn-style">Login</button>
							</form>
							<p class="mt-4" >No tienes una cuenta?<a class="mt-4" href="registro_pasajero.php">Registrate ahora!!</a></p>
						</div>   					  
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
</div>
					  <div class="hours">
						<h6 class="mt-4">Email:</h6>
						<p> <a href="mailto:info@example.com">
							trans20deagosto@gmail.com</a></p>
						<h6 class="mt-4">Address:</h6>
						<p> Av. Acero 324</p>
						<h6 class="mt-4">Contact:</h6>
						<p class="margin-top"><a href="tel:+(21) 255 999 8899">+(21)
							255 999 8899</a></p>
					  </div>
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
<!-- Código de instalación Cliengo para yadiratr@gmail.com --> 
<script type="text/javascript">(function () { var ldk = document.createElement('script'); 
  ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/619bf2a66b8e47002aa612d3/619bf2a96b8e47002aa612d7.js?platform=registration';
  var s = document.getElementsByTagName('script')[0]; 
  s.parentNode.insertBefore(ldk, s); })();</script>
</body>

</html>