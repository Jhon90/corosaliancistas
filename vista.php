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
                        "pageLength": 20,
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


            <table id="table_id" class="table table-bordered border-primary">

                <tbody>
                    <?php
                    
                    $id_coro=$_GET['id_coro'];
                    $contador = 0;

                    $query_coro = $pdo->prepare("SELECT * FROM tb_coros WHERE id_coro = '$id_coro'AND estado = '1' ");
                    $query_coro->execute();
                    $coros = $query_coro->fetchAll(PDO::FETCH_ASSOC);

                    foreach($coros as $coro_){
                            $id_coro = $coro_['id_coro'];
                            $nombre = $coro_['nombre'];            
                            $coro = $coro_['coro'];
                            $contador = $contador + 1;
                    }
                    ?>
                   
                        <tr>
                            <thead>
                                <th><center><strong><h3><?php echo $nombre; ?></h3></strong></center></th>
                            </thead> 
                        </tr>

                        <tr>                                  
                            <td> <?php echo $contador.'.'."<center><h3 style='font-family:calibri'>$coro</h3></center>";?></td>    
                        </tr>
                   
                    
                    <br>
                                            
                </tbody>
            </table>
            <hr>

        </div> 
        <?php include('layout/footer2.php'); ?>
    </div> 
</div> 

</head>
