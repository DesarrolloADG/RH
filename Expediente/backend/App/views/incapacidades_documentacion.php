<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora Documentación Incapacidades <small>Empleado para el colaborador <?= $nombre_colaborador_1; ?></small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="panel-body" <?php echo $visible; ?>>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Documentacion"><i class="fa fa-plus" aria-hidden="true"></i> Documento</button>
                    <a href="/Incapacidades" type="button" class="btn btn-danger btn-circle" <?= $agregarHidden?>><i class="fa fa-reply"> <b>Regresar</b></i></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Titulo</th>
                                        <th>Nombre del Archivo</th>
                                        <th>Descripcion</th>
                                        <th>Fecha Alta</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $tabla; ?>
                                    </tbody>
                                </table>
                            </div>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="modal fade" id="Modal_Documentacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="form-group row" align="center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <span><strong><span class="glyphicon glyphicon-hdd"></span> Carga de Archivos para Expediente</strong>
                                                                                    </span>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Usted esta cargando los archivos de:</label>
                                    <h2>
                                        <a>
                                            <?= $nombre_colaborador; ?>
                                        </a>
                                    </h2>
                                    <br>

                                </div>
                                <div class="form-group">
                                    <label>Con Fecha de ALta:</label>
                                    <h2>
                                        <a>
                                            <p class="excerpt"><span class="bi bi-calendar-week" style="color:grey"></span> | <?php echo date('d-m-Y');; ?></p>
                                        </a>
                                    </h2>
                                    <br>

                                </div>

                                <div class="form-group">
                                    <label>Motivo de la incapacidad:</label>
                                    <h2>
                                        <a>
                                            <?= $nombre_incapacidad; ?>
                                        </a>
                                    </h2>
                                    <br>

                                </div>
                                <br>

                            </div>
                            <div class="col-md-7 subir-archivos">

                                <form enctype="multipart/form-data" id="form_colaboradores">

                                    <?= $id_incapacidad; ?>

                                    <div class="form-group">
                                        <label for="title">Título *</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="EJ. CLAVE 15ERJEI433 INCAPACIDAD" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onInput="validarInput()">
                                        <span id="availability1"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Descripción *</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Ej. INCAPACIDAD DOCUMENTO" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        <span id="availability2"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Tipo de Archivo *</label>
                                        <select class="form-control" name="archivo" id="archivo">
                                            <option value="" disabled selected> Selecciona el tipo de documento que subiras</option>
                                            <?php echo $sArchivo; ?>
                                        </select>
                                        <span id="availability3"></span>
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
                                            283.0 KB
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Validar" id="btn_Validar"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormColaboradores()">Subir Archivo
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
</div>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    function onSubmitFormColaboradores() {
        var frm = document.getElementById('form_colaboradores');
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
            if(!document.getElementById("description").value.length)
            {
                console.log("debes llenar la descripcion");
                $('#availability2').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Descripción</span>');

            }
            else
            {
                if(!document.getElementById("archivo").value.length)
                {
                    console.log("debes elegir el tipo de archivo");
                    $('#availability3').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Elige una opción de la lista despegable Tipo de Archivo</span>');

                }
                else
                {
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
                        xhttp.open("POST", "/Incapacidades/DocumentoAdd", true);
                        xhttp.send(data);
                        $('#form_colaboradores').trigger('reset');
                    }
                }
            }
        }
    }
</script>
<?php echo $footer; ?>
