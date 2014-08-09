<!DOCTYPE html>

<html>

  <head>
  
     <title>Catálodo de autos</title>
     <meta charset="utf-8">
     
  <link href="css/estilo.css" rel="stylesheet" type="text/css">
  </head>
  
     <body>

     <header>
 
          <h1>CATÁLOGO DE AUTOS</h1>
          
                 
     </header>

    
    
     <div class="lista">
        <?php

        //DATOS DE LA BASE DE DATOS
            $servidor = "localhost";
            $usuario = "root";
            $clave = "ricardoputo";
            $basedatos = "autos";
            
        // CONECTAR A LA BASE DE DATOS
            $conexion=mysqli_connect ($servidor, $usuario, $clave) or die ('problema conectando porque :' . mysqli_error());
            mysqli_select_db ($conexion, $basedatos);



        // CREAR LA CONSULTA DE MARCAS ---------------------------------------------------------------------------------------
        
            $cadena ="SELECT * FROM consulta_marcas";
            $tabla = mysqli_query($conexion, $cadena) or die ("problema con cadena de conexion<br><b>" . mysqli_error()."</b>");
            $registros_encontrados = mysqli_num_rows($tabla);
            echo "<br>"."<h2>AUTOMÓVILES</h2>";

           print '<br/><table>'
          .'<tr ><td >id:</td>'
		  .'<td>Marca:</td>'
		  .'<td>Modelo:</td>'
		  .'<td>Km</td>'
		  .'<td>A&ntildeo</td>'
		  .'<td>Precio</td>'
		  .'<td>Modificar</td>'
		  .'<td>Borrar</td></tr>';

          // RECORRER LOS REGISTROS

           while ($registro = mysqli_fetch_array($tabla)){
	
	
          // MOSTRAR LOS CAMPOS 
              
             print '<tr>'
          .'<td>'.$registro['id'] .'</td>'
		  .'<td>'.$registro['Marca'] .'</td>'
		  .'<td>'.$registro['Modelo'] .'</td>'
		  .'<td>'.$registro['Km'] .'</td>'
		  .'<td>'.$registro['Anio'] .'</td>'
		  .'<td>'.$registro['Precio'] .'</td>'
		  .'<td><a href="modifica.php?mod='.$registro['id'].'">Modificar</a>          </td>'   
	      .'<td><a href="listado.php?br='.$registro['id'].'">Borrar</a></td>'
		  .'</tr></div>';
             
             
			}     
              
         print '</table>';
          //-----------------------------------------------------------------------------------------------
          
         
         // CREAR LA CONSULTA CONCESIONARIAS---------------------------------------------------------------
         
            $cadena ="SELECT * FROM concesionarias";
            $tabla = mysqli_query($conexion, $cadena) or die ("problema con cadena de conexion<br><b>" . mysqli_error()."</b>");
            $registros_encontrados = mysqli_num_rows($tabla);
            echo "<br>"."<h2>CONCESIONARIAS</h2>";

           print '<br/><table>'
          .'<tr ><td >id:</td>'
		  .'<td>Concesionaria:</td>'
		  .'<td>Direccion</td>'
		  .'<td>telefono</td></tr>';

          // RECORRER LOS REGISTROS

           while ($registro = mysqli_fetch_array($tabla)){
	
	
          // MOSTRAR LOS CAMPOS 
              
             print '<tr>'
          .'<td>'.$registro['id'] .'</td>'
		  .'<td>'.$registro['Concesionaria'] .'</td>'
		  .'<td>'.$registro['Direccion'] .'</td>'
		  .'<td>'.$registro['Telefono'] .'</td>'
		  .'<td><a href="modifica.php?mod='.$registro['id'].'">Modificar</a></td>'   
	      .'<td><a href="listado.php?br='.$registro['id'].'">Borrar</a></td>'
		  .'</tr></div>';
             
             
			}     
              
         print '</table>';

         

       //PARA BORRAR AUTOS----------------------------------------------------------------------------

          if (isset($_GET['br'])&&is_numeric($_GET['br'])){
	
	
	       $id= $_GET ['br'];
	
	       $r= mysqli_query ( $conexion, "delete from consulta_marcas where id=$id") ;
	
	
	if (!$r){
		echo "no se pudo eliminar";
		} else {
			echo "registro eliminado";
			
			}
	    }
	
     ?>
     </div>
     
      <div class="ingreso">
           
        <?php 
         include ("ingresar.php"); // incluye el formulario ingresar datos
        ?>
     </div>

   </body>

</html>
