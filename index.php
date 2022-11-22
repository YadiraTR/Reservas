
<!doctype html>
<html lang="zxx">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Trans 20 de agosto| Home</title>
  <!-- Template CSS -->
  <link href="//fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css2?family=Limelight&display=swap" rel="stylesheet">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style-starter.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- Template CSS -->
</head>

<body>
  <!--header-->
  <header id="site-header" class="fixed-top">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light">
        <h1><a class="navbar-brand" href="index.php">
            <span>20</span>de Agosto
          </a></h1>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="fa icon-expand fa-bars"></span>
          <span class="fa icon-close fa-times"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">Sobre Nosotros?</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="services.html">Servicios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login_pasajeros.php">Reservas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login_empleados.php">empleados</a>
            </li>
          </ul>
          <ul class="navbar-nav search-right mt-lg-0 mt-2">
            <li class="nav-item mr-3" title="Search"><a href="#search" class="btn search-search">
                <span class="fa fa-comments" aria-hidden="true"></span></a></li>
            <li class="nav-item"><a href="contact.html" class="btn btn-primary d-none d-lg-block btn-style mr-2">Contactanos </a></li>
          </ul>

          <!-- //toggle switch for light and dark theme -->
          <!-- search popup -->
          <div id="search" class="pop-overlay">
            <br> <br>
            <form action="#">
             
              <div class="wrapper" >
              
                <a class="close" href="index.php">&times;</a>
                <div class="title">Asistente Lía</div>
                <div class="form">
                    <div class="bot-inbox inbox">
                        <div class="icon">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="msg-header">
                            <p>Hola como puedo ayudarte?</p>
                        </div>
                    </div>
                </div>
                <div class="typing-field">
                    <div class="input-data">
                        <input id="data" type="text" placeholder="Escribe aquí." required>
                        <button id="send-btn">Enviar</button>
                    </div>
                </div>
              </div>
            </form>
          
          </div>
          <script>
        $(document).ready(function(){
        $("#send-btn").on("click", function(){
            $value = $("#data").val();
            $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
            $(".form").append($msg);
            $("#data").val('');
            
            // start ajax code
            $.ajax({
                url: 'message.php',
                type: 'POST',
                data: 'text='+$value,
                success: function(result){
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                    $(".form").append($replay);
                    // when chat goes down the scroll bar automatically comes to the bottom
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }
            });
        });
    });
</script>
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
  <!-- main-slider -->
  <section class="w3l-main-slider position-relative" id="home">
    <div class="companies20-content">
      <div class="owl-one owl-carousel owl-theme">
        <div class="item">
          <li>
            <div class="slider-info banner-view bg bg2">
              <div class="banner-info">
                <div class="container">
                  <div class="banner-info-bg">
                    <h5>Empresa de transporte  <br> 20 de agosto.</h5>
                    <div class="banner-buttons">
                      <a class="btn btn-style btn-primary" href="about.html">Ver más</a>
                      <a href="#small-dialog" class="popup-with-zoom-anim play-view">
                        <span class="video-play-icon">
                          <span class="fa fa-play"></span>
                        </span>
                        <h6>Nuestro de trabajo</h6>
                      </a>
                      <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                      <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                        <iframe src="https://www.facebook.com/plugins/video.php?height=248&href=https%3A%2F%2Fwww.facebook.com%2FTrans20deAgosto.srl%2Fvideos%2F838074250340660%2F&show_text=false&width=560&t=0" allow="autoplay; fullscreen"
                          allowfullscreen=""></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </div>
        <div class="item">
          <li>
            <div class="slider-info  banner-view banner-top1 bg bg2">
              <div class="banner-info">
                <div class="container">
                  <div class="banner-info-bg">
                    <h2 style="color: white;">"Más de 30 años de experiencia avalan nuestra trayectoria"</h2>
                    <div class="banner-buttons">
                      <a class="btn btn-style btn-primary" href="about.html">Read More</a>
                      <a href="#small-dialog" class="popup-with-zoom-anim play-view">
                        <span class="video-play-icon">
                          <span class="fa fa-play"></span>
                        </span>
                        <h6>Nuestro trabajo</h6>
                      </a>
                      <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                      <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                        <iframe src="https://player.vimeo.com/video/425349644" allow="autoplay; fullscreen"
                          allowfullscreen=""></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </div>
        <div class="item">
          <li>
            <div class="slider-info banner-view banner-top2 bg bg2">
              <div class="banner-info">
                <div class="container">
                  <div class="banner-info-bg">
                    <h3 style="color: white;">"Nos preparamos para ser los mejores "</h3>
                    <div class="banner-buttons">
                      <a class="btn btn-style btn-primary" href="about.html">Ver más</a>
                      <a href="#small-dialog1" class="popup-with-zoom-anim play-view">
                        <span class="video-play-icon">
                          <span class="fa fa-play"></span>
                        </span>
                        <h6>Ve nuestro trabajo</h6>
                      </a>
                      <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                      <div id="small-dialog2" class="zoom-anim-dialog mfp-hide">
                        <iframe src="https://player.vimeo.com/video/425349644" allow="autoplay; fullscreen"
                          allowfullscreen=""></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </div>
        <div class="item">
          <li>
            <div class="slider-info banner-view banner-top3 bg bg2">
              <div class="banner-info">
                <div class="container">
                  <div class="banner-info-bg">
                    <h3 style="color: white;">"Calidad, confianza y puntualidad nos caracteriza "</h3>
                    <div class="banner-buttons">
                      <a class="btn btn-style btn-primary" href="about.html">Ver más</a>
                      <a href="#small-dialog3" class="popup-with-zoom-anim play-view">
                        <span class="video-play-icon">
                          <span class="fa fa-play"></span>
                        </span>
                        <h6>Ve nuestro trabajo</h6>

                      </a>
                      <!-- dialog itself, mfp-hide class is required to make dialog hidden -->
                      <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
                        <iframe src="https://player.vimeo.com/video/425349644" allow="autoplay; fullscreen"
                          allowfullscreen=""></iframe>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </div>
      </div>
    </div>
  </section>
  <!-- //banner-slider-->
  <!-- //bottom-grids -->
  <div class="w3l-bottom-grids">
    <div class="container-fluid px-0">
      <div class="bottomhny-grids-sec">
        <div class="bottomhny-1">
          <div class="bottomhny-gd-ingf">
            <h4>Puntualidad en cada viaje.</h4>
          </div>
        </div>
        <div class="bottomhny-1 bottomhny-2">
          <div class="bottomhny-gd-ingf">
            <h4>Responsabilidad con nuestros pasajeros.</h4>
          </div>
        </div>
        <div class="bottomhny-1 bottomhny-1-img">
          <div class="bottomhny-gd-ingf">

          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- //bottom-grids -->
  <!-- /content-3-->
  <section class="w3l-content-3">
    <!-- /content-3-main-->
    <div class="content-3-mian py-5">
      <div class="container py-lg-5">
        <div class="content-info-in row">
          <div class="col-lg-6">
            <img src="assets/images/ab1.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-6 mt-lg-0 mt-5 about-right-faq align-self  pl-lg-5">
            <div class="title-content text-left mb-2">
              <h6 class="sub-title">20 de agosto</h6>
              <h3 class="hny-title"> Tenemos más de 30 años de trayectoria</h3>
            </div>
            <p class="mt-3">El grupo 20 de agosto, empresa de transporte interdepartamental e intercantonal de transporte publico 100% Boliviano, ostenta un papel de liderazgo dentro del sector logístico boliviano.

              Fundada en 1971 por Marcelino Moldes, la compañía dispone de más de 40.000 m2 de instalaciones logísticas estratégicamente ubicadas en el municipio de Monteagudo Bolivia. Contando con una amplia red de corresponsales y agentes en las principales ciudades de Santa Cruz y Sucre.</p>
            <a href="about.html" class="btn btn-style btn-primary mt-md-5 mt-4">Ver más</a>
          </div>
        </div>
      </div>
  </section>
  <!-- //content-3-->
  <!-- /features-4 -->
  <section class="features-4">
    <div class="features4-block py-5">
      <div class="container py-lg-4">
        <div class="title-content text-center mb-lg-5 mt-4">
          <h6 class="sub-title">20 de agosto</h6>
          <h3 class="hny-title">Nuestros servicios</h3>
          <p class="fea-para">Esta estructura permite al Grupo 20 de agosto ofrecer una extensa gama de servicios que incluye:</p>
        </div>
        <div class="row features4-grids text-left mt-lg-4">
          <div class="col-lg-3 col-md-6 features4-grid mt-4">
            <div class="features4-grid-inn">
              <div class="img-featured">
                <div class="ch-item ch-img-1">
                  <div class="ch-info-wrap">
                    <div class="ch-info">
                      <div class="ch-info-front ch-img-1"></div>
                      <div class="ch-info-back">
                        <h4>Transporte público</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            
            </div>
          </div>
          <div class="col-lg-3 col-md-6 features4-grid mt-4">
            <div class="features4-grid-inn">
              <div class="img-featured">
                <div class="ch-item ch-img-2">
                  <div class="ch-info-wrap">
                    <div class="ch-info">
                      <div class="ch-info-front ch-img-2"></div>
                      <div class="ch-info-back">
                        <h4>Encomiendas</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-3 col-md-6 features4-grid mt-4">
            <div class="features4-grid-inn">
              <div class="img-featured">
                <div class="ch-item ch-img-3">
                  <div class="ch-info-wrap">
                    <div class="ch-info">
                      <div class="ch-info-front ch-img-3"></div>
                      <div class="ch-info-back">
                        <h4> Transporte de carga pesada</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="col-lg-3 col-md-6 features4-grid mt-4">
            <div class="features4-grid-inn">
              <div class="img-featured">
                <div class="ch-item ch-img-4">
                  <div class="ch-info-wrap">
                    <div class="ch-info">
                      <div class="ch-info-front ch-img-4"></div>
                      <div class="ch-info-back">
                        <h4> Agencia de viajes</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="features4-rightinfo">
                

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <!--//features-4 -->

  <!-- /specification-6-->
  <section class="w3l-specification-6">
    <div class="specification-6-mian py-5">
      <div class="container py-lg-5">
        <div class="row story-6-grids">
          <div class="col-lg-10 story-gd pl-lg-4  text-center mx-auto">
            <div class="title-content px-lg-5">
              <h6 class="sub-title">
                NUESTRA ORGANIZACIÓN</h6>
              <h3 class="hny-title two">Nuestros viajes</h3>
              <p class="mt-3 mb-lg-5 px-lg-5 counter-para">Se puede observar que varias personas quedaron satisfechas por el trabajo que realiza la empresa de transporte</p>
            </div>
            <div class="skill_info mt-5 pt-lg-4">
              <div class="stats_left">
                <div class="counter_grid">
                  <div class="icon_info">
                    <p class="counter">65</p>
                    <h4>Total de buses</h4>

                  </div>
                </div>
              </div>
              <div class="stats_left">
                <div class="counter_grid">
                  <div class="icon_info">
                    <p class="counter">165</p>
                    <h4>Tranparencia</h4>

                  </div>
                </div>
              </div>
              <div class="stats_left">
                <div class="counter_grid">
                  <div class="icon_info">
                    <p class="counter">463</p>
                    <h4>Total de viajes</h4>

                  </div>
                </div>
              </div>
              <div class="stats_left">
                <div class="counter_grid">
                  <div class="icon_info">
                    <p class="counter">5063</p>
                    <h4>Personas satisfechas</h4>

                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- //specification-6-->
  
  <!-- middle -->
  <div class="middle py-5">
    <div class="container py-xl-5 py-lg-3">
      <div class="welcome-left text-left py-3">
        <div class="title-content">
          <h6 class="sub-title">Contactos</h6>
          <h3 class="hny-title two mb-2">Imaginate viajar tan comodo como nunca</h3>
          <p>Tienes alguna pregunta? <a href="74852369">
            75824623</a></p>

        </div>
        <a href="services.html" class="btn btn-white mt-md-5 mt-4 mr-sm-2">Nuestros servicios</a>
        <a href="contact.html" class="btn btn-white-active btn-primary mt-md-5 mt-4">Contactanos</a>
      </div>
    </div>
  </div>
  <!-- //middle -->
  <!--/testimonials-->
  <section class="w3l-testimonials">
    <div class="testimonials py-5">
      <div class="container text-center py-lg-3">
        <div class="title-content text-center mb-lg-5 mb-4">
          <h6 class="sub-title">Nuestro equipo de trabajo</h6>
          <h3 class="hny-title">Quieres a los mejores pues viaja con nosotros</h3>

        </div>
        <div class="row">
          <div class="col-lg-10 mx-auto">
            <div class="owl-testimonial owl-carousel owl-theme">
              <div class="item">
                <div class="slider-info mt-lg-4 mt-3">
                  <div class="img-circle">
                    <img src="assets/images/team1.jpg" class="img-fluid rounded" alt="client image">
                  </div>
                  <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                    id
                    accusantium
                    officia quod quasi necessitatibus perspiciatis Harum error provident
                    quibusdam tenetur.</div>
                  <div class="name">- Jenkins</div>

                </div>
              </div>
              <div class="item">
                <div class="slider-info mt-lg-4 mt-3">
                  <div class="img-circle">
                    <img src="assets/images/team2.jpg" class="img-fluid rounded" alt="client image">
                  </div>
                  <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                    id
                    accusantium
                    officia quod quasi necessitatibus perspiciatis Harum error provident
                    quibusdam tenetur.</div>
                  <div class="name">- John Balmer</div>
                </div>
              </div>
              <div class="item">
                <div class="slider-info mt-lg-4 mt-3">
                  <div class="img-circle">
                    <img src="assets/images/team3.jpg" class="img-fluid rounded" alt="client image">
                  </div>
                  <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                    id
                    accusantium
                    officia quod quasi necessitatibus perspiciatis Harum error provident
                    quibusdam tenetur.</div>
                  <div class="name">- Kiss Kington</div>
                </div>
              </div>
              <div class="item">
                <div class="slider-info mt-lg-4 mt-3">
                  <div class="img-circle">
                    <img src="assets/images/team4.jpg" class="img-fluid rounded" alt="client image">
                  </div>
                  <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea sit
                    id
                    accusantium
                    officia quod quasi necessitatibus perspiciatis Harum error provident
                    quibusdam tenetur.</div>
                  <div class="name">- Elizabeth</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--//testimonials-->

  <!-- footer-66 -->
  <footer class="w3l-footer-66">
    <section class="footer-inner-main">
      <div class="footer-hny-grids py-5">
        <div class="container py-lg-4">
          <div class="text-txt">
            <div class="row newsletter-grids-footer">
              <div class="col-lg-6 newsletter-text pr-lg-5">
                <h3 class="hny-title two">Quieres ser parte de nosotros?</h3>
                <h4>Ingresa tu correo electronico para ser parte de una experiencia unica 
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
              <p>© 2021 20 de agosto | Designed by <a href="https://www.facebook.com/profile.php?id=100005211588607">Yadira Tirado</a></p>
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
  <!-- disable body scroll which navbar is in active -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script>
	$(document).ready(function () {
		$('.popup-with-zoom-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-zoom-in'
		});

		$('.popup-with-move-anim').magnificPopup({
			type: 'inline',

			fixedContentPos: false,
			fixedBgPos: true,

			overflowY: 'auto',

			closeBtnInside: true,
			preloader: false,

			midClick: true,
			removalDelay: 300,
			mainClass: 'my-mfp-slide-bottom'
		});
	});
</script>
<!--//-->
  <script src="assets/js/theme-change.js"></script>
  <script src="assets/js/owl.carousel.js"></script>
  <!-- script for banner slider-->
  <script>
    $(document).ready(function () {
      $('.owl-one').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: true
          },
          1000: {
            items: 1,
            nav: true
          }
        }
      })
    })
  </script>
  <!-- //script -->
  <!-- script for owlcarousel -->
  <script>
    $(document).ready(function () {
      $('.owl-testimonial').owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        responsiveClass: true,
        autoplay: false,
        autoplayTimeout: 5000,
        autoplaySpeed: 1000,
        autoplayHoverPause: false,
        responsive: {
          0: {
            items: 1,
            nav: false
          },
          480: {
            items: 1,
            nav: false
          },
          667: {
            items: 1,
            nav: false
          },
          1000: {
            items: 1,
            nav: false
          }
        }
      })
    })
  </script>
  <!-- disable body scroll which navbar is in active -->
  <script>
    $(function () {
      $('.navbar-toggler').click(function () {
        $('body').toggleClass('noscroll');
      })
    });
  </script>
  <!-- disable body scroll which navbar is in active -->

  <!-- stats number counter-->
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.countup.js"></script>
  <script>
    $('.counter').countUp();
  </script>
  <!-- //stats number counter -->
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
<!-- Código de instalación Cliengo para https://www.facebook.com/profile.php?id=100005211588607 --> <script type="text/javascript">(function () { var ldk = document.createElement('script'); ldk.type = 'text/javascript'; ldk.async = true; ldk.src = 'https://s.cliengo.com/weboptimizer/61ad9b2b661007002aff5d2f/61ba289ddff13c002a0d2a24.js?platform=onboarding_modular'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ldk, s); })();</script>
</body>

</html>