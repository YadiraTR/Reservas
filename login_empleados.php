

<?php

require "conexion.php";
session_start();

			if($_POST)
			{
				$usuario = $_POST['Username'];
				$password = $_POST['Password'];

				 $sql = "SELECT id_empleado, password_empleado, nombre_empleado, apellido_paterno_empleado, apellido_materno_empleado, imagen, id_rol FROM empleado
				 WHERE email_empleado ='$usuario'";
				 $resultado =$conexion ->query($sql);
				 $num=$resultado->num_rows;
				 if($num>0)
				 {
					$row = $resultado->fetch_assoc();
					$password_bd=$row['password_empleado'];

					$pass_c=md5($password);

					if($password_bd == $pass_c){
						$_SESSION['id_empleado'] = $row['id_empleado'];
						$_SESSION['nombre_empleado'] = $row['nombre_empleado'];
						$_SESSION['apellido_paterno_empleado'] = $row['apellido_paterno_empleado'];
						$_SESSION['apellido_materno_empleado'] = $row['apellido_materno_empleado'];
						$_SESSION['imagen'] = $row['imagen'];
						$_SESSION['id_rol'] = $row['id_rol'];
						

				
							header("location: paginadeadmin/index.php");


						
					} else {
					
						echo "<script>
						alert('usuario o contraseña incorrecto');
						window.location ='login_empleados.php';
						</script>";
					
					}
					
					
					} else {
						echo "<script>
						alert('El usuario no existe');
						window.location ='login_empleados.php';
						</script>";
						session_destroy();
				 }				
		
	         }
			
?>





<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>login empleados:: Trans 20 de Agosto</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Trendz Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<link rel="stylesheet" href="css/style_logiin.css" type="text/css" media="all" />

</head>

<body>
	<!-- /login-section -->

	<section class="w3l-forms-23">
		<div class="forms23-block-hny">
			<div class="wrapper">
				<h1>LOGIN DE EMPLEADOS</h1>
				<div class="d-grid forms23-grids">
					<div class="form23">
						<div class="main-bg">
							<h6 class="sec-one">20 DE AGOSTO</h6>
							<div class="speci-login first-look">
								<img src="images/user.png" alt="" class="img-responsive">
							</div>
						</div>
						<div class="bottom-content">
							<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
								<input type="email" name="Username" id="text_usuario" class="input-form" placeholder="Email"
										required/>
								
								<input type="password" name="Password" id="text_password" class="input-form"
										placeholder="Contraseña" required="required" />
							
								<button type="submit" class="loginhny-btn btn">Ingresar</button>
							</form>
							
						</div>
					</div>
				</div>
				<div class="w3l-copy-right text-center">
				<p>© 2021 Trans 20 de Agosto. Todos los derechos reservados | Diseño de  <a href="https://www.facebook.com/profile.php?viewas=100000686899395&id=100005211588607" target="_blank">Yadira Tirado Romero</a> </p>
				</div>
			</div>
		</div>
	</section>
	<!-- //login-section -->
</body>

</html>