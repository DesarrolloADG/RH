<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora Solicitudes para Proceso de Baja ADG <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="container">

                    <div class="tab-content">
                            <br>
                            <div class="panel-body" <?php echo $visible; ?>>
                                <a href="/Baja/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Baja Administrativo</b></i></a>
                                <a href="/Baja/Consulta" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Baja Producción</b></i></a>
                            </div>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Empleado</th>
                                        <th>Colaborador Tipo</th>
                                        <th>Se registro la Baja</th>
                                        <th>Fecha de Salida</th>
                                        <th>Cuestionario de Salida</th>
                                        <th>Check List</th>
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
                            <span><strong><span class="glyphicon glyphicon-circle-arrow-up"></span> Carga de Archivo Baja ADG</strong>
                                                                                    </span>
                        </div>
                        <div class="panel-body">

                                <form enctype="multipart/form-data" id="form_bajas">

                                    <input type="hidden" style="width:350px;" class="form-control" id="id_colaborador" name="id_colaborador">

                                    <div class="form-group">
                                        <label for="title">Título *</label>
                                        <input type="text" class="form-control" id="title" name="title" placeholder="CHECK LIST BAJA COLABORADOR" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onInput="validarInput()">
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
                                                class="btn btn-primary btn-block" onclick="onSubmitFormBajas()">Subir Archivo
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
    function onSubmitFormBajas() {
        var frm = document.getElementById('form_bajas');
        var data = new FormData(frm);
        var xhttp = new XMLHttpRequest();

        $('#availability1').html('');
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
                        xhttp.open("POST", "/Baja/DocumentoAdd", true);
                        xhttp.send(data);
                        $('#form_bajas').trigger('reset');
                    }

        }
    }
</script>

<?php echo $footer; ?>
