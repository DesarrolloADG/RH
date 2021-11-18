<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Asistencia a la Capacitación <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="x_content">
                    <div class="row">
                        <div class="tile_count float-right col-sm-12">
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-check-circle-o"></i> Duración Capacitación</span>
                                <div class="count"> <?php echo $registro_id['duracion'] ?>.00</div>
                                <i class="green"><i class="fa fa-clock-o"></i> Hora(s) </i></span>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-check-circle-o"></i> Total de Horas a Cubrir</span>
                                <div class="count"><?php echo $registro_id['horas_cubrir'] ?>.00</div>
                                <span class="count_bottom"><i class="green"><i class="fa fa-clock-o"></i> Hora(s)</i></span>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-check-circle-o"></i> Total de Asistentes</span>
                                <div class="count"><?php echo $contador['contador']; ?>.00</div>
                                <span class="count_bottom"><i class="green"><i class="fa fa-user"></i> Registrados</i></span>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-check-circle-o"></i> Total de Asistentes</span>
                                <div class="count"><?php echo $contador_asistentes['contador']; ?>.00</div>
                                <span class="count_bottom"><i class="green"><i class="fa fa-user"></i> Que Asistieron</i></span>
                            </div>
                            <div class="col-md-2 col-sm-4  tile_stats_count">
                                <span class="count_top"><i class="fa fa-check-circle-o"></i> Horas Cubiertas</span>
                                <div class="count"><?php echo $horas_cubiertas; ?>.00</div>
                                <span class="count_bottom"><i class="green"><i class="fa fa-user"></i> Horas</i></span>
                            </div>
                            <?php echo $estatus ?>
                        </div>
                    </div>
                </div>

                <div class="panel-body" <?php echo $visible; ?>>

                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Seleccione cada Colaborador que participo en la capacitación</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <form enctype="multipart/form-data" id="form_colaboradores">
                            <div class="x_content">
                                <div class="form-group col-md-9">
                                    <label class="control-label col-md-7 col-sm-3 col-xs-12" for="nombre_colaborador">Nombre del Colaborador Registrado desde Asistentes<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                        <select class="form-control" name="nombre_colaborador" id="nombre_colaborador">
                                            <option value="" disabled selected>Selecciona un Colaborador</option>
                                            <?php echo $sColaboradorAsistencia; ?>
                                        </select>
                                        <span id="availability1"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 text-center">
                                        <br>
                                        <button class="btn btn-success" type="button" id="buttonSearch" onclick="gt()">Registrar Asistencia</button>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </div>
                        </form>
                        <form enctype="multipart/form-data" id="form_id">
                            <div class="x_content">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="id_capacitacion_asistente" name="id_capacitacion_asistente">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <h6>** Colaboradores que participaron en la capacitación y registraron su asistencia.</h6>

                    <table class="table table-striped jambo_table bulk_action">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                    <th>Nombre</th>
                                    <th>Fecha de Alta</th>
                                    <th>Planta</th>
                                    <th>Su Puesto</th>
                                    <th id="acciones">Acciones</th>
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

<script>
    function gt (){
        if(!document.getElementById("nombre_colaborador").value.length)
        {
            console.log("debes llenar el titulo");
            $('#availability1').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Selecciona una Opción Valida</span>');

        }
        else
        {
            var frm = document.getElementById('form_colaboradores');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#buttonSearch').attr("disabled", true);
            console.log("ya entre");
            }
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4) {
                    var msg = xhttp.responseText;
                    if (msg == 'success') {
                        location.reload();
                        alertify.success("Se agrego correctamente");
                    } else {
                        alert(msg);
                    }
                }
            };
            xhttp.open("POST", "/RegistroCapacitaciones/ParticipanteAddAsistencia", true);
            xhttp.send(data);
            $('#form_colaboradores').trigger('reset');
        }

    function gt_1 (a){

        $("#id_capacitacion_asistente").val(a); //aplicamos el nuevo valor al input

        alertify.confirm('¿Segúro que desea eliminar la asistencia?', function(response) {
            var result = false;
            $.ajax({
                type: "POST",
                async: false,
                url: "/RegistroCapacitaciones/deleteAsistencia", // script to validate in server side
                data: {a: a},
                success: function (data) {
                    console.log("success::: " + data);
                    result = (data == "true") ? false : true;

                    if (result == true) {
                        alert("si");

                    } else {
                        location.reload();
                        alertify.success("Se ha eliminado correctamente");
                    }
                }
            });
            // return true if username is exist in database
            return result;
        });
    }
</script>
<?php echo $footer; ?>
