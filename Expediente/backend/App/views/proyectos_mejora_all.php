<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora de Registro para Proyectos de Mejora ADG <small></small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br>
                <div class="x_content">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <br>
                            <li class="active">
                                <a data-toggle="tab" href="#home">
                                    <span class="fa fa-file" style="color:gray"></span> Registros Activos</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <a href="/ProyectosMejora/Add" type="submit"  class="btn btn-primary"><span class="fa fa-plus" style="color:white"></span> Nuevo</a>
                                    </div>
                                    <div id="resultado"> </div>
                                    <br>
                                </div>
                                <br>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                            <th>Empleado</th>
                                            <th>Nombre Proyecto</th>
                                            <th>Fecha de Alta</th>
                                            <th>Se Implemento</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?= $tabla; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="x-content"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade Modal_Nuevo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                    <div class="form-group row" align="center">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading text-center">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                        </button>
                                        <span><strong><span class="glyphicon glyphicon-hdd"></span> Indicadores de Accidentes ADG</strong>
                                                                                    </span>
                                    </div>

                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="tile_count float-right col-sm-12">
                                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                                <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                                                <div class="count">1.00</div>
                                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> Este Trimestre </i></span>
                                            </div>
                                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                                <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                                                <div class="count">3.00</div>
                                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> Este Año</i></span>
                                            </div>
                                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                                <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                                                <div class="count">5.00</div>
                                                <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 2020 </i></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="Modal_Documentacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="form-group row" align="center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <span><strong><span class="glyphicon glyphicon-circle-arrow-up"></span> Carga de Archivo Reporte Personal ADG</strong>
                                                                                    </span>
                        </div>
                        <div class="panel-body">

                            <form enctype="multipart/form-data" id="form_reportes_personal">

                                <input type="hidden" style="width:350px;" class="form-control" id="id_colaborador" name="id_colaborador">

                                <div class="form-group">
                                    <label for="title">Título *</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Titulo del Archivo" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onInput="validarInput()">
                                    <span id="availability1"></span>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="file" accept="application/pdf" class="form-control" id="file" name="file">
                                </div>
                                <span id="availability4"></span>
                                <br>
                            </form>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        Espacio máximo
                                    </div>
                                    <div class="col-md-6">
                                        783.0 KB
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" name="btn_Validar" id="btn_Validar"
                                            class="btn btn-primary btn-block" onclick="onSubmitFormReportesPersonal()">Subir Archivo
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ver_archivo_personal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Documento</h4></center>
            </div>
            <div class="modal-body" align="center">
                <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script>
    function onSubmitFormReportesPersonal() {
        var frm = document.getElementById('form_reportes_personal');
        var data = new FormData(frm);
        var xhttp = new XMLHttpRequest();

        $('#availability1').html('');
        $('#availability2').html('');
        $('#availability3').html('');
        $('#availability4').html('');
        if(!document.getElementById("title").value.length)
        {
            console.log("debes llenar el titulo");
            $('#availability1').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Título</span>');

        }
        else {
            if(!document.getElementById("file").value.length)
            {
                console.log("debes subir un archivo");
                $('#availability4').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes subir un Archivo .PDF</span>');

            }
            else
            {
                $('#btn_Validar').attr("disabled", true);
                console.log("ya entre");
                xhttp.onreadystatechange = function () {
                    if (this.readyState == 4) {
                        var msg = xhttp.responseText;
                        if (msg == 'success') {
                            alert(msg);
                            $('#Modal_Documentacion').modal('hide')
                            location.reload();
                        } else {
                            alert(msg);
                        }
                    }
                };
                xhttp.open("POST", "/Reportes/DocumentoAdd", true);
                xhttp.send(data);
                $('#form_bajas').trigger('reset');
            }

        }
    }
</script>

<?php echo $footer; ?>
