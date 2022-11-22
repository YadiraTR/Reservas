
<?php


include "../conexion.php";
    //----SESIÓN USUARIO LOGUEADO----
    session_start();
	
    if(!isset($_SESSION['id_pasajero'])){
      header("Location: login_pasajeros.php");
    }
    $id_empl = $_SESSION['id_pasajero'];
    $nombre = $_SESSION['nombre_pasajero'];
    $cipasa = $_SESSION['ci_pasajero'];
    $apellidopaterno=$_SESSION['apellido_paterno_pasajero'] ;
    $apellidomaterno=$_SESSION['apellido_materno_pasajero'] ;
    $avatar= $_SESSION['imagen'];

    //-----------------------------------------------------------
echo $id_empl;
if (isset($_POST['submit'])) {

  $alert = '';
  $id_progra = $_POST['pro'];
  $id_asie = $_POST['asiento_sele'];
  $Fecha_reserva = $_POST['date'];



  $query_insert = mysqli_query($conection, "INSERT INTO reserva(id_pasajero,id_prog,id_asie,Fecha_reserva, estado)
   VALUES('$id_empl','$id_progra','$id_asie','$Fecha_reserva','1')");
  if ($query_insert) {

    echo "<script>
    alert('Reservado');
    window.location ='index.php';
    </script>";
  } else {

    echo "<script>
    alert('Error al reservar');
    window.location ='Lista_reservas.php';
    </script>";
  }
}

if (empty($_GET['id'])) {
  header('Location: PReserva.php');
}
$id_prog = $_GET['id'];
$sql = mysqli_query($conection, "SELECT p.id_prog, r.desc_ruta, r.costo_ruta, p.fecha, p.hora FROM programacion as p INNER JOIN bus as b on p.id_bus = b.id_bus INNER JOIN ruta as r on r.id_ruta = p.id_ruta
    WHERE id_prog = $id_prog");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
  header('Location: PReserva.php');
} else {
  while ($data = mysqli_fetch_array($sql)) {
    $id_prog = $data['id_prog'];
    $desc_ruta = $data['desc_ruta'];
    $costo_ruta = $data['costo_ruta'];
    $desc_ruta = $data['desc_ruta'];
    $costo_ruta = $data['costo_ruta'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <link href="css/asientos.css" rel="stylesheet">
  <title>
   20 de agosto
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />

  <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
  <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
</head>

<body class="g-sidenav-show  bg-gray-200 " >

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"  id="sidenav-main">
    <div class="sidenav-header ">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">

        <img class="navbar-brand-img h-100"  src= "data:image/png;base64, <?php echo base64_encode($avatar)?>" />
                      
        <span class="ms-1 font-weight-bold text-white">Bienvenid@ <br>         
        <?php echo $nombre ; echo " "; echo $apellidopaterno; echo " "; echo $apellidomaterno;?></span>

      </a>
    </div>
    <hr class="horizontal light mt-0 mb-3">
    
      <ul class="navbar-nav ">
      <li class="nav-item">
          <a class="nav-link text-white" href="./index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Inicio</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="Lista_reservas.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
            </div>
            <span class="nav-link-text ms-1">Mis reservas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="Buscar_programacion.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">notifications</i>
            </div>
            <span class="nav-link-text ms-1">Reservar</span>
          </a>
        </li>
 

        <li class="nav-item">
          <a class="nav-link text-white " href="../index.html">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Salir</span>
          </a>
        </li>
      </ul>  
    </div>
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="index.html">DASHBOARD</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">EMPLEADOS</li>
          </ol>
        </nav>

          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">Perfil</span>
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                  <a class="dropdown-item border-radius-md" href="javascript:;">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">Notificación</span> from Laur
                        </h6>
                      </div>
                    </div>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Viajes disponibles</h6>
              </div>
              <ul class="navbar-nav d-lg-block d-none">
              <br>
                 <a href="./Buscar_programacion.php" class="btn btn-sm  bg-gradient-primary mb-2 me-1  " onclick="smoothToPricing('pricing-soft-ui')">Atras</a>    <br>             
                 <br>
                </ul>
            </div>
            <div class="container py-lg-4">
              <div class="row align-form-map">  
               <form method="post">
                  <div class='row'>
                     <input  style="display:none" type="text" name="pro" id="pro" value='<?php echo $id_prog ?>'>
                     <input  style="display:none" type="text" name="id_pasajero" id="id_pasajero" value='<?php echo $id_empl ?>'>
                     <div class="col-md-4">
                      
                       <label for="pasajero">Nombre Completo </label>
                       <div class="input-group input-group-outline mb-3">
                       <input id='empleado' type='text' class='form-control' value='<?php echo $nombre ; echo " "; echo $apellidopaterno; echo " "; echo $apellidomaterno;?>' readonly>            
                       </div>
                       <label for='descruta'>Ruta</label>
                       <div class="input-group input-group-outline mb-3">
                         <input id='desruta' type='text' class='form-control'value='<?php echo $desc_ruta ?>' readonly>
                       </div>           

                       <label for='ruta'>Precio</label>
                       <div class="input-group input-group-outline mb-3">
                         <input id='costo' type='text' class='form-control' value='<?php echo $costo_ruta ?>' readonly>
                       </div>

                       <label for='date'>Fecha </label>
                       <div class="input-group input-group-outline mb-3">
                         <input id='date' name="date" type='date' class='form-control' value='<?php echo date("Y-n-j")?>' readonly>
                       </div>
                      
                       <label for="empleado">Nº de asiento</label>   
                       <div class="input-group input-group-outline mb-3">                   
                          <?php
                          $query_asiento = mysqli_query($conection, "SELECT a.id_asie, a.num_asie
                          FROM asiento as a WHERE a.num_asie != ALL(SELECT a.num_asie FROM reserva  as r 
                          INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog 
                          where p.id_prog = $id_prog)");
                          $result_asiento = mysqli_num_rows($query_asiento);
                          ?>
                          <select name="asiento_sele" id="asiento_sele"class='form-control'>
                            <?php
                            if ($result_asiento>0) {
                              while ($id_asie = mysqli_fetch_array($query_asiento)) {
                            ?>
                                <option value="<?php echo $id_asie["id_asie"]; ?>"><?php echo $id_asie["num_asie"]; ?></option>
                            <?php
                              }
                            }
                            ?>
                          </select>   
                       </div>
                      <div class='col s15 l15 m15'>
                        <input type="submit"  name="submit" value="Guardar" class="btn btn-sm  bg-gradient-primary mb-2 me-1 ">
                      </div>
                      <div class='col s15 l15 m15'>
                      <a href="./Buscar_programacion.php" class="btn btn-sm  bg-gradient-primary mb-2 me-1  " onclick="smoothToPricing('pricing-soft-ui')">Terminar proceso</a>    <br>             
                     </div>
                    </div>                             
                                     
                        <!--PLANILLA ASIENTOS-->  
                        

                    <div class='input-field col s15 l15 m15'>
                    <div class="autobus">
                    <h5 style='text-align:center'> Transporte "20 de agosto"</h5>
                     <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                            <label  for="asiento1">C</label>
                            <input id="asiento" type="checkbox"  value="none"name="check" readonly/>                                            
                          </div>
                        </div>
                        <div class="seccion"> </div>
                        <div class="seccion"> </div>
                        <div class="seccion"> </div>
                        <div class="seccion"> </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                        <div class="asiento">
                            <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =1");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento1">1</label>
                              <?php
                                if ($result_EMPLEADO > 0) 
                                {
                                  ?>
                                  <label style="color: 		#FF0000" for="asiento1">1</label>
                                  <input id="asiento1" type="checkbox"  value="none"name="check" readonly/>
                                  <?php
                                }
                                else
                                {                               
                                 ?>
                                    <label for="asiento1">1</label>
                                    <input id="asiento1" type="checkbox" value="none"name="check"/>                                                                    
                                 <?php                        
                                }
                              ?>                        
                          </div>
                          <div class="asiento">
                            <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =2");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento2">2</label>
                              <?php
                                if ($result_EMPLEADO > 0) 
                                {
                                  ?>
                                  <label style="color:	#FF0000" for="asiento2">2</label>
                                  <input id="asiento2" type="checkbox"  value="none"name="check" readonly/>
                                  <?php
                                }
                                else
                                {                               
                                 ?>
                                    <label for="asiento2">2</label>
                                    <input id="asiento2" type="checkbox" value="none"name="check"/>                                                                    
                                 <?php                        
                                }
                              ?>                        
                          </div>
                        </div>
                        <div class="seccion">
                         <div class="asiento">
                            <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =3");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento3"></label>
                              <?php
                                if ($result_EMPLEADO > 0) 
                                {
                                  ?>
                                  <label style="color:	#FF0000" for="asiento3">3</label>
                                  <input id="asiento3" type="checkbox"  value="none"name="check" readonly/>
                                  <?php

                                }
                                else
                                {                               
                                 ?>
                                    <label for="asiento3">3</label>
                                    <input id="asiento3" type="checkbox" value="none"name="check"/>                                                                    
                                 <?php                        
                                }
                              ?>                        
                          </div>
                          <div class="asiento">
                            <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =4");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento4">4</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">4</label>
                               <input id="asiento4" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento4">4</label>
                               <input id="asiento4" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>                        
                          </div>
                        </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =5 ");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento4">5</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento5">5</label>
                               <input id="asiento5" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento45">5</label>
                               <input id="asiento5" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =6");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento6">6</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">6</label>
                               <input id="asiento6" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento6">6</label>
                               <input id="asiento6" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =7");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento4">7</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">7</label>
                               <input id="asiento7" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento7">7</label>
                               <input id="asiento7" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =8");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento8">8</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">8</label>
                               <input id="asiento8" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento8">8</label>
                               <input id="asiento8" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =9");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento9">9</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">9</label>
                               <input id="asiento9" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento9">9</label>
                               <input id="asiento9" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =10");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento10">10</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">9</label>
                               <input id="asiento10" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento10">10</label>
                               <input id="asiento10" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =11");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento11">11</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">11</label>
                               <input id="asiento11" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento11">11</label>
                               <input id="asiento11" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =12");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento12">12</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">12</label>
                               <input id="asiento12" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento12">12</label>
                               <input id="asiento12" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =13");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento13">13</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">13</label>
                               <input id="asiento13" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento13">13</label>
                               <input id="asiento13" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =14");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento14">14</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 	#FF0000" for="asiento14">14</label>
                               <input id="asiento14" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento14">14</label>
                               <input id="asiento14" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =15");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento15">15</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento15">15</label>
                               <input id="asiento15" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento15">15</label>
                               <input id="asiento15" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =16");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento16">16</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">16</label>
                               <input id="asiento16" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento16">16</label>
                               <input id="asiento16" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =17");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento9">17</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">17</label>
                               <input id="asiento9" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento17">17</label>
                               <input id="asiento17" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =18");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento18">18</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento18">18</label>
                               <input id="asiento18" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento18">18</label>
                               <input id="asiento18" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =19");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento19">19</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento19">19</label>
                               <input id="asiento19" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento19">19</label>
                               <input id="asiento19" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =20");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento20">20</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento20">20</label>
                               <input id="asiento20" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento20">20</label>
                               <input id="asiento20" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =21");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento21">21</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento21">21</label>
                               <input id="asiento21" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento21">21</label>
                               <input id="asiento21" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =22");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento22">22</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento22">22</label>
                               <input id="asiento22" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento22">22</label>
                               <input id="asiento22" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =23");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento23">23</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento1">23</label>
                               <input id="asiento23" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento23">23</label>
                               <input id="asiento23" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =24");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento24">24</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento24">24</label>
                               <input id="asiento24" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento24">24</label>
                               <input id="asiento24" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =25");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento9">25</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento25">25</label>
                               <input id="asiento25" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento25">25</label>
                               <input id="asiento25" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =26");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento10">26</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento26">26</label>
                               <input id="asiento26" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento26">26</label>
                               <input id="asiento26" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =27");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento27">27</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento27">27</label>
                               <input id="asiento27" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento27">27</label>
                               <input id="asiento27" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =28");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento28">28</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento28">28</label>
                               <input id="asiento28" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento28">28</label>
                               <input id="asiento28" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =29");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento9">29</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento29">29</label>
                               <input id="asiento29" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento29">29</label>
                               <input id="asiento29" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =30");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento10">30</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento30">30</label>
                               <input id="asiento30" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento30">30</label>
                               <input id="asiento30" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =31");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento11">31</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento31">31</label>
                               <input id="asiento31" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento31">31</label>
                               <input id="asiento31" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =32");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento12">32</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento32">32</label>
                               <input id="asiento32" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento132">32</label>
                               <input id="asiento32" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        </div>
                      </div>


                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =33");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento33">33</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento33">33</label>
                               <input id="asiento33" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento33">33</label>
                               <input id="asiento33" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =34");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento34">34</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento34">34</label>
                               <input id="asiento34" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento34">34</label>
                               <input id="asiento34" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =35");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento11">35</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento35">35</label>
                               <input id="asiento35" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento35">35</label>
                               <input id="asiento35" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =36");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento12">36</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento36">36</label>
                               <input id="asiento36" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento36">36</label>
                               <input id="asiento36" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        </div>
                      </div>

                      <div class="fila">
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =37");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento9">37</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento37">37</label>
                               <input id="asiento37" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento37">37</label>
                               <input id="asiento37" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =38");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento38">38</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento38">38</label>
                               <input id="asiento38" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento38">38</label>
                               <input id="asiento38" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                        </div>
                        <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =40");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento41">41</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento40">41</label>
                               <input id="asiento41" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento40">41</label>
                               <input id="asiento40" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                        <div class="seccion">
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =39");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento39">39</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento39">39</label>
                               <input id="asiento39" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento39">39</label>
                               <input id="asiento39" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?> 
                          </div>
                          <div class="asiento">
                          <?php
                              $query_EMPLEADO = mysqli_query($conection," SELECT a.num_asie FROM reserva  as r INNER JOIN asiento as a on r.id_asie = a.id_asie INNER JOIN programacion as p on r.id_prog = p.id_prog where p.id_prog = $id_prog and a.num_asie =40");
                              $result_EMPLEADO = mysqli_num_rows($query_EMPLEADO);
                            ?>
                            <label for="asiento40">40</label>
                            <?php
                             if ($result_EMPLEADO > 0) 
                             {
                              ?>
                               <label style="color: 		#FF0000" for="asiento40">40</label>
                               <input id="asiento40" type="checkbox"  value="none"name="check" readonly/>
                               <?php
                             }
                             else
                             {                               
                              ?>
                               <label for="asiento40">40</label>
                               <input id="asiento40" type="checkbox" value="none"name="check"/>                                                                    
                               <?php                        
                             }
                              ?>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    </div>          
                  </div>
                </form>
      </div>
            </div>
      </div>
   </div>
    <footer class="footer pt-3  ">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="copyright text-center text-sm text-muted text-lg-start">
              © <script>
                document.write(new Date().getFullYear())
              </script>,
              Trans 20 de agosto  |  <i class="#"></i>  Designed by 
              <a href="https://www.facebook.com/profile.php?id=100005211588607" class="font-weight-bold" target="_blank">Yadira Tirado Romero</a>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="material-icons py-2">settings</i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Material UI Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="material-icons">clear</i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0">
        <!-- Sidebar Backgrounds -->
        <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a>
        <!-- Sidenav Type -->
        <div class="mt-3">
          <h6 class="mb-0">Sidenav Type</h6>
          <p class="text-sm">Choose between 2 different sidenav types.</p>
        </div>
        <div class="d-flex">
          <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Dark</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Transparent</button>
          <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">White</button>
        </div>
        <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
        <!-- Navbar Fixed -->
        <div class="mt-3 d-flex">
          <h6 class="mb-0">Navbar Fixed</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
          </div>
        </div>
        <hr class="horizontal dark my-3">
        <div class="mt-2 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        
        <div class="w-100 text-center">
         <h6 class="mt-3">Siguenos en las redes sociales!</h6>
          <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
          </a>
          <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
          </a>
        </div>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>

  <script>
    var tabla = document.querySelector("#tabla");
    var dataTable = new DataTable(tabla,{
      perPage:5,
      perPageSelect:[5,10,15,20],
       
    });
    
  </script>
</body>

</html>