<?php
//https://www.musica.com/letras.asp?letra=1580552
include('app/config.php');

?>

<!DOCTYPE html>
<html lang="es">
    
<head>
    <?php include('layout/head.php'); ?>
</head>

<style>

.container-fluid {

    /* Para pantalla pc
      height: 150px;
  width: 80%;
  padding-right: 140px;
  padding-left: 140px;
  margin-right: auto;
  margin-left: auto;


  Para celular:
    */


    height: auto;
  width: auto;
  padding-right: auto;
  padding-left: auto;
  margin-right: auto;
  margin-left: auto;
}

</style>

<div class="wrapper">
    
    <br>
    <div class="container-fluid">
        <div class="col-md">
            
            <script>
                $(document).ready(function() {
                    $('#table_id').DataTable( {

                        //Informacion para la tabla, DataTable 
                        "pageLength": 10,
                        "language": {
                            "emptyTable": "No hay información",
                            "info": "Mostrando _START_ a _END_ de _TOTAL_ Coros",
                            "infoEmpty": "Mostrando 0 a 0 de 0 Usuarios",
                            "infoFiltered": "(Filtrado de _MAX_ total Coros)",
                            "infoPostFix": "",
                            "thousands": ",",
                            "lengthMenu": "Mostrar _MENU_ Coros",
                            "loadingRecords": "Cargando...",
                            "processing": "Procesando...",
                            "search": "Buscar coro:",
                            "zeroRecords": "Sin resultados encontrados",
                            "paginate": {
                                "first": "Primero",
                                "last": "Ultimo",
                                "next": "Siguiente",
                                "previous": "Anterior"
                            }
                        }
                    });
                } );
            </script>
           
            <div class="row">
                <div class="col-md-auto">
                    <center>                        
                        <img src="public/img/logo.jpg" width="180px" height="180">                                                  
                    </center>
                </div>
                <div class="col-md-auto">
                      <br><br><h3 class="link-primary">Coros <small class="text-muted">Aliancistas</small></h3>
                </div>
            </div>
            <hr>
                 
            <table id="table_id" class="table table-bordered border-primary">

              
                <thead>
                    <th><center>Nro</center></th>
                    <th>Coros</th>
         
                </thead>
                <tbody>
                <?php

                $contador = 0;
                $query_coro = $pdo->prepare("SELECT * FROM tb_coros WHERE estado = '1' ");
                $query_coro->execute();
                $coros = $query_coro->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($coros as $coro_){
                    $id_coro = $coro_['id_coro'];
                    $nombre = $coro_['nombre'];            
                    $coro = $coro_['coro'];
                    $contador = $contador + 1;
                    ?>
                    <!--Codigo HTML de la tabla-->
                    <tr>
                                    
                        <td><center><?php echo $contador;?></center> </td>
    
                       <!--  <td> <?php echo $nombre;?></td>-->
                       <td><a href='vista.php?id_coro=<?php echo $id_coro; ?>'><?php echo $nombre;?></a></td>
    
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            


        </div> 
        <hr>
        <footer class="footer">
        <?php include('layout/footer4.php'); ?> 

        </footer>
    </div>  
</div>

</html>