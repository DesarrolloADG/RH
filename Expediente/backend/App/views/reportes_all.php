<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora Reportes ADG <small>Conducta, BPM's, Actas Administrativas</small></h2>
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
                                    <span class="fa fa-file" style="color:gray"></span> Reportes al Personal</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu3">
                                    <span class="fa fa-file" style="color:gray"></span> Reportes  BPM's</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu1">
                                    <span class="fa fa-file" style="color:gray"></span> Actas Administrativas</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <a href="/Reportes/Personal" type="submit"  class="btn btn-primary"><span class="fa fa-plus" style="color:white"></span> Nuevo</a>
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
                                            <th>Fecha de alta</th>
                                            <th>Turno</th>
                                            <th>Imprimir</th>
                                            <th>Cargar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?= $tabla; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="menu1" class="tab-pane fade">
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Reportes_Actas_Admnistrativas"><i class="fa fa-plus" aria-hidden="true"></i>  Nuevo</button>
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
                                            <th>Fecha Reporte</th>
                                            <th>Motivo</th>
                                            <th>Descripción</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?= $tablaacta; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Reportes_bpms"><i class="fa fa-plus" aria-hidden="true"></i>  Nuevo</button>
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
                                            <th>Fecha </th>
                                            <th>Hora</th>
                                            <th>Causa</th>
                                            <th>Datos de Relevancia</th>
                                            <th>Observaciones</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?= $tablabpm; ?>
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
<div class="modal fade" id="Modal_Reportes_bpms" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="form-group row" align="center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <span><strong><span class="glyphicon glyphicon-circle-arrow-up"></span> Registro Reporte BPM´s ADG</strong>
                                                                                    </span>
                        </div>
                        <div class="panel-body">

                            <form enctype="multipart/form-data" id="form_reportes_personal_bpm">
                                <div class="form-group row" align="center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="fecha">Fecha del Suceso<span class="required">*</span></label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12" placeholder="Nombre de la Empresa">
                                                </div>
                                                <span id="availability"></span>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="hora">Hora del Suceso<span class="required">*</span></label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <input type="time" name="hora" id="hora" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <span id="availability_1"></span>
                                            </div>

                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="nombre_colaborador_reporte">Nombre de Quien Reporta<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <select class="form-control" name="nombre_colaborador_reporte" id="nombre_colaborador_reporte">
                                                    <option value="" disabled selected>Selecciona un Colaborador</option>
                                                    <?php echo $idColaborador; ?>
                                                </select>
                                            </div>
                                            <span id="availability_2"></span>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label class="control-label col-md-12 col-sm-3 col-xs-12" for="nombre_colaborador_reportado">Nombre del Colaborador Reportado<span class="required">*</span></label>
                                            <div class="col-md-12 col-sm-6 col-xs-12">
                                                <select class="form-control" name="nombre_colaborador_reportado" id="nombre_colaborador_reportado">
                                                    <option value="" disabled selected>Selecciona un Colaborador</option>
                                                    <?php echo $idColaborador; ?>
                                                </select>
                                            </div>
                                            <span id="availability_3"></span>
                                        </div>

                                        <div class="form-group col-md-12">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="motivo">Motivo del Incumplimiento<span class="required">*</span></label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <select class="form-control" name="motivo" id="motivo">
                                                        <option value="" disabled selected>Selecciona un Motivo de Incumplimiento</option>
                                                        <?php echo $idMotivo; ?>
                                                    </select>
                                                </div>
                                            <span id="availability_4"></span>
                                        </div>

                                            <div class="form-group col-md-12">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="otro">Otros Datos de Relevancia</label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <textarea class="form-control" name="otro" id="otro" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Detalle algunos datos de relevancia PARA EL REGISTRO DEL REPORTE BPM´S"></textarea>
                                                </div>
                                            </div>
                                            <span id="availability_5"></span>

                                            <div class="form-group col-md-12">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="observaciones">Observaciones</label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <textarea class="form-control" name="observaciones" id="observaciones" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Detalle algunos puntos importantes a tomar en consideración el levantamiento del reporte BPM´S"></textarea>
                                                </div>
                                            </div>
                                            <span id="availability_6"></span>

                                            <div class="form-group col-md-12">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="file">Archivo Escaneado con Firmas de los Representantes e Implicados</label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <input type="file" accept="application/pdf" class="form-control" id="file" name="file">
                                                </div>
                                            </div>
                                            <span id="availability_7"></span>

                                            <br>
                                        </div>
                                    </div>
                                </div>

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
                                    <button type="submit" name="btn_Validar_Reportes_bpm" id="btn_Validar_Reportes_bpm"
                                            class="btn btn-primary btn-block" onclick="onSubmitFormReportesPersonalBPM()">Terminar Registro
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
<div class="modal fade" id="Modal_Reportes_Actas_Admnistrativas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="form-group row" align="center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <span><strong><span class="glyphicon glyphicon-circle-arrow-up"></span> Registro Acta Administrativa</strong>
                                                                                    </span>
                        </div>
                        <div class="panel-body">

                            <form enctype="multipart/form-data" id="form_reportes_acta">
                                <div class="form-group row" align="center">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-6">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="fecha_">Fecha del Suceso<span class="required">*</span></label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <input type="date" name="fecha_" id="fecha_" class="form-control col-md-7 col-xs-12">
                                                </div>
                                                <span id="availability_"></span>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="nombre_colaborador_reportado_">Nombre del Colaborador Reportado<span class="required">*</span></label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <select class="form-control" name="nombre_colaborador_reportado_" id="nombre_colaborador_reportado_">
                                                        <option value="" disabled selected>Selecciona un Colaborador</option>
                                                        <?php echo $idColaborador; ?>
                                                    </select>
                                                </div>
                                                <span id="availability_1_"></span>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="motivo_">Motivo del Acta Administrativa<span class="required">*</span></label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <select class="form-control" name="motivo_" id="motivo_">
                                                        <option value="" disabled selected>Selecciona un Motivo del Acta Administrativa</option>
                                                        <?php echo $idMotivoActa; ?>
                                                    </select>
                                                </div>
                                                <span id="availability_2_"></span>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="otro_">Resumen del Acta Administrativa</label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <textarea class="form-control" name="otro_" id="otro_" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Detalle a Resumen breve lo sucedido"></textarea>
                                                </div>
                                                <span id="availability_3_"></span>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="file_">Archivo Escaneado con Firmas de los Representantes e Implicados</label>
                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                    <input type="file" accept="application/pdf" class="form-control" id="file_" name="file_">
                                                </div>
                                                <span id="availability_4_"></span>
                                            </div>

                                            <br>
                                        </div>
                                    </div>
                                </div>

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
                                    <button type="submit" name="btn_Validar_Acta" id="btn_Validar_Acta"
                                            class="btn btn-primary btn-block" onclick="onSubmitFormReporteActa()">Terminar Registro
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

    function onSubmitFormReportesPersonalBPM() {
        var frm = document.getElementById('form_reportes_personal_bpm');
        var data = new FormData(frm);
        var xhttp = new XMLHttpRequest();

        $('#availability').html('');
        $('#availability_1').html('');
        $('#availability_2').html('');
        $('#availability_3').html('');
        $('#availability_4').html('');
        $('#availability_5').html('');
        $('#availability_6').html('');
        $('#availability_7').html('');
        if(!document.getElementById("fecha").value.length)
        {
            console.log("Debes Elegir Una Fecha");
            $('#availability').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes Elegir Una Fecha</span>');

        }
        else {
            if(!document.getElementById("hora").value.length)
            {
                console.log("Debes Elegir Una Hora");
                $('#availability_1').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes Elegir Una Hora</span>');

            }
            else
            {
                    if(!document.getElementById("nombre_colaborador_reporte").value.length)
                    {
                        console.log("Debes Elegir un Colaborador (Quien Reporta)");
                        $('#availability_2').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes Elegir un Colaborador (Quien Reporta)</span>');

                    }
                    else {
                        if(!document.getElementById("nombre_colaborador_reportado").value.length)
                        {
                            $('#availability_3').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes Elegir un Colaborador (Reportado)</span>');

                        }
                        else {
                            if(!document.getElementById("motivo").value.length)
                            {
                                $('#availability_4').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes Seleccionar un Motivo de Reporte</span>');

                            }
                            else {
                                if(!document.getElementById("otro").value.length)
                                {
                                    $('#availability_5').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Menciona Otros Aspectos Importantes del Reporte</span>');

                                }
                                else {
                                    if(!document.getElementById("observaciones").value.length)
                                    {
                                        $('#availability_6').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Detalla las Observaciones del Reporte</span>');

                                    }
                                    else
                                        {
                                        if(document.getElementById("file").value.length)
                                        {
                                            $('#availability_7').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Sube un Archivo .PDF</span>');
                                            console.log("Falta PDF");

                                        }
                                        else
                                            {
                                            $('#btn_Validar_Reportes_bpm').attr("disabled", true);
                                            console.log("ya entre");
                                            xhttp.onreadystatechange = function () {
                                                if (this.readyState == 4) {
                                                    var msg = xhttp.responseText;
                                                    if (msg == 'success') {
                                                        alert(msg);
                                                        location.reload();
                                                    } else {
                                                        alert(msg);
                                                    }
                                                }
                                            };
                                            xhttp.open("POST", "/Reportes/DocumentoBPM", true);
                                            xhttp.send(data);
                                        }
                                    }
                                }
                            }
                        }
                    }

            }

        }
    }

    function onSubmitFormReporteActa() {
        var frm = document.getElementById('form_reportes_acta');
        var data = new FormData(frm);
        var xhttp = new XMLHttpRequest();

        $('#availability_').html('');
        $('#availability_1_').html('');
        $('#availability_2_').html('');
        $('#availability_3_').html('');
        $('#availability_4_').html('');
        if(!document.getElementById("fecha_").value.length)
        {
            console.log("Debes Elegir Una Fecha");
            $('#availability_').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes Elegir Una Fecha</span>');

        }
        else {
              if(!document.getElementById("nombre_colaborador_reportado_").value.length)
              {
                   $('#availability_1_').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes Elegir un Colaborador (Reportado)</span>');

              }
              else {
                        if(!document.getElementById("motivo_").value.length)
                        {
                            $('#availability_2_').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes Seleccionar un Motivo de Reporte</span>');

                        }
                        else {
                            if(!document.getElementById("otro_").value.length)
                            {
                                $('#availability_3_').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Agrega un Resumen de los Aspectos más Importantes del Reporte</span>');

                            }
                            else
                                {
                                    if(!document.getElementById("file_").value.length)
                                    {
                                        $('#availability_4_').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Sube un Archivo .PDF</span>');
                                        console.log("Falta PDF");

                                    }
                                    else
                                    {
                                        $('#btn_Validar_Acta').attr("disabled", true);
                                        console.log("ya entre");
                                        xhttp.onreadystatechange = function () {
                                            if (this.readyState == 4) {
                                                var msg = xhttp.responseText;
                                                if (msg == 'success') {
                                                    alert(msg);
                                                    location.reload();
                                                } else {
                                                    alert(msg);
                                                }
                                            }
                                        };
                                        xhttp.open("POST", "/Reportes/DocumentoActa", true);
                                        xhttp.send(data);
                                    }
                                }
                        }
                    }



        }
    }
</script>

<?php echo $footer; ?>
