<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Candidatos Empleado ADG <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="panel-body" <?php echo $visible; ?>>

                        <div class="x_panel">
                        <div class="x_title">
                            <h2>Seleccione cada Colaborador a participar en la Insignia</h2>
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
                                        <label class="control-label col-md-5 col-sm-3 col-xs-12" for="nombre_colaborador">Nombre del Colaborador a Registrar<span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <select class="form-control" name="nombre_colaborador" id="nombre_colaborador">
                                                <option value="" disabled selected>Selecciona un Colaborador</option>
                                                <?php echo $sColaboradorAsistencia; ?>
                                            </select>
                                            <span id="availability1"></span>
                                        </div>
                                        <input type="hidden" class="form-control" id="id_candidato_1" name="id_candidato_1" value="<?php echo $id_c; ?>">

                                    </div>
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4 text-center">
                                            <br>
                                            <button class="btn btn-success" type="button" id="buttonSearch" onclick="gt()">Agregar Participante</button>
                                        </div>
                                        <div class="col-md-4"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>

                <div class="table-responsive">
                    <h6>** Colaboradores que actualmente participaran y/o participaron en la capacitación.</h6>

                    <table class="table table-striped jambo_table bulk_action">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                    <th>Nombre</th>
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
        xhttp.open("POST", "/EmpleadoADG/CandidatoAdd", true);
        xhttp.send(data);
        $('#form_colaboradores').trigger('reset');
    }

    }

function gt_1 (a){

    alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response) {
        var result = false;
        $.ajax({
            type: "POST",
            async: false,
            url: "/EmpleadoADG/delete", // script to validate in server side
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
