<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                    <h2>Capacitaciones <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="panel-body" <?php echo $visible; ?>>
                    <a href="/RegistroCapacitaciones/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Curso</th>
                                        <th>Duración</th>
                                        <th>Cubrir</th>
                                        <th><span class="glyphicon glyphicon-calendar" style="color:white"></span></th>
                                         <th>Planta</th>
                                        <th>Grupo</th>
                                        <th>Estatus</th>
                                        <th>Acciones</th>
                                        <th>Asistencia</th>
                                        <th>Calificación</th>
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
    <div class="modal-dialog modal-sm">
        <div class="form-group row" align="center">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <span><strong><span class="fa fa-archive"></span> Asignar Calificación al Expositor</strong>
                                                                                    </span>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-12">

                                <form enctype="multipart/form-data" id="form_colaboradores">

                                    <input type="hidden" style="width:350px;" class="form-control" id="id_colaborador" name="id_colaborador">

                                    <div class="form-group">
                                        <label for="title">Asignar Calificación (0 - 100) *</label>
                                        <input type="number" class="form-control" id="title" name="title" placeholder="100" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onInput="validarInput()">
                                        <span id="availability1"></span>
                                    </div>
                                </form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Validar" id="btn_Validar"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormColaboradores()">Guardar
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
<script>
    function onSubmitFormColaboradores() {
        var frm = document.getElementById('form_colaboradores');
        var data = new FormData(frm);
        var xhttp = new XMLHttpRequest();

        $('#availability1').html('');

        if(!document.getElementById("title").value.length)
        {
            console.log("Debes Asignar una Calificación");
            $('#availability1').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Título</span>');

        }
        else {
                        $('#btn_Validar').attr("disabled", true);
                        console.log("ya entre");
                        xhttp.onreadystatechange = function () {
                            if (this.readyState == 4) {
                                var msg = xhttp.responseText;
                                if (msg == 'success') {
                                    //alert(msg);

                                    alertify
                                        .alert("Subido con Éxito", function(){
                                        });
                                    if($('#Modal_Documentacion').modal('hide'))
                                    {
                                        location.reload()
                                    }

                                } else {
                                    alert(msg);
                                }
                            }
                        };
                        xhttp.open("POST", "/RegistroCapacitaciones/CalificacionAdd", true);
                        xhttp.send(data);
                        $('#form_colaboradores').trigger('reset');
        }
    }
</script>

<?php echo $footer; ?>
