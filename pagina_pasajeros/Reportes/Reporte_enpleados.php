<?php 
 include "../../conexion.php";

 $sentenciaSQL=$conection->prepare("SELECT u.id_empleado, u.nombre_empleado, u.apellido_paterno_empleado, u.apellido_materno_empleado,
 u.ci_empleado, u.fech_nacimiento, u.telefono_empleado, u.ciudad_empleado, u.direccion_empleado, u.email_empleado, u.imagen, r.descripcion_rol
 FROM empleado u  INNER JOIN rol r ON u.id_rol = r.id_rol WHERE u.Estado = 1");
 $sentenciaSQL->execute();
 $result=$sentenciaSQL->fetch(PDO::FETCH_ASSOC);

?>

<table data-vertable="ver6" id="tabla" class="table table-striped table-bordered" style="width:100%" data-sort="tabla">
                      <thead>
                        <tr class="row100 head">
                          <th class="column100 column8" data-column="column8"></th>
                          <th class="column100 column2" data-column="column2">Rol</th>
                          <th class="column100 column3" data-column="column3">Nombre</th>
                          <th class="column100 column4" data-column="column4">Apellido paterno</th>
                          <th class="column100 column5" data-column="column5">Apellido materno</th>
                          <th class="column100 column6" data-column="column6">Carnet</th>
                          <th class="column100 column7" data-column="column7">Fecha de nacimiento</th>
                          <th class="column100 column7" data-column="column7">Teléfono</th>
                          <th class="column100 column7" data-column="column7">Ciudad</th>
                          <th class="column100 column7" data-column="column7">Dirección</th>
                          <th class="column100 column7" data-column="column7">Email</th>
                        </tr>
                      </thead>                
                      <tbody>    
                        <?php    
                          $sentenciaSQL=$conection->prepare("SELECT u.id_empleado, u.nombre_empleado, u.apellido_paterno_empleado, u.apellido_materno_empleado,
                          u.ci_empleado, u.fech_nacimiento, u.telefono_empleado, u.ciudad_empleado, u.direccion_empleado, u.email_empleado, u.imagen, r.descripcion_rol
                          FROM empleado u  INNER JOIN rol r ON u.id_rol = r.id_rol WHERE u.Estado = 1" ) ;
                          $sentenciaSQL->EXECUTE();
                          $result=$sentenciaSQL->fetch(PDO::FETCH_LAZY);
                          if($result > 0)
                          {
                            while($data = mysqli_fetch_array($query))
                            {
                            ?>
                                <tr>
                                <td class="column100 column1" data-column="column1"><img height= "70px" src= "data:image/png;base64, <?php echo base64_encode($data['imagen'])?>"/></td>
                                <td class="column100 column1" data-column="column1"><?php echo $data["descripcion_rol"]?></td>
                                <td class="column100 column2" data-column="column2"><?php echo $data["nombre_empleado"]?></td>
                                <td class="column100 column3" data-column="column3"><?php echo $data["apellido_paterno_empleado"]?></td>
                                <td class="column100 column4" data-column="column4"><?php echo $data["apellido_materno_empleado"]?></td>
                                <td class="column100 column5" data-column="column5"><?php echo $data["ci_empleado"]?></td>      
                                <td class="column100 column8" data-column="column8"><?php echo $data["fech_nacimiento"]?></td>
                                <td class="column100 column8" data-column="column8"><?php echo $data["telefono_empleado"]?></td>
                                <td class="column100 column5" data-column="column5"><?php echo $data["ciudad_empleado"]?></td>      
                                <td class="column100 column8" data-column="column8"><?php echo $data["direccion_empleado"]?></td>
                                <td class="column100 column8" data-column="column8"><?php echo $data["email_empleado"]?></td>
                                <td class="column100 column8" data-column="column8">
                                   <a style="color: green" class="fas fa-eye" href="ver_empleado.php?id=<?php echo $data["id_empleado"]?>" title="Ver"><p></p></a>
                                   <a style="color: green" class="fas fa-edit" href="Modificar_empleados.php?id=<?php echo $data["id_empleado"]?>"title="Editar"><p></p></a>
                                   <a style="color: red" class="far fa-trash-alt "  href="Eliminar_empleados.php?id=<?php echo $data["id_empleado"]?>" title="Eliminar"><p></p></a>
                                                                     
                              </td>                                    
                                </tr>
                              <?php
                            }
                          }
                        ?>                  
                      </tbody>
                    </table>