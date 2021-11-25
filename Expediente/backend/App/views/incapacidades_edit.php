<?php echo $header;?>
<div class="right_col">
    <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col align-self-center">
            <div class="col align-self-center">
                <div class="center-block">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="x_content">
                                <form class="form-label-left input_mask" id="add" action="/Incapacidades/IncapacidadesEdit" method="POST">
                                    <div class="form-group row" align="center">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                         <span><strong><span class="glyphicon glyphicon-hdd"></span> Modificar Registro Incapcidades Colaborador ADG</strong>
                                                                                    </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group">

                                                                    <label for="nombre_colaborador">Nombre del Colaborador a Registrar Incapacidad<span class="required">*</span></label>
                                                                    <div>
                                                                        <select class="form-control" name="nombre_colaborador" id="nombre_colaborador" disabled>
                                                                            <?php echo $sColaborador; ?>
                                                                        </select>
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_inicio">Fecha Inicial<span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                                                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control col-md-7 col-xs-12" value="<?php echo $incapacidad['fecha_inicio']; ?>">
                                                                        </div>
                                                                        <span id="availability"></span>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_fin">Fecha Final<span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                                                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control col-md-7 col-xs-12" value="<?php echo $incapacidad['fecha_fin']; ?>">
                                                                        </div>
                                                                        <span id="availability"></span>
                                                                    </div>

                                                                    <br>

                                                                    <div class="form-group col-md-5">
                                                                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="incapacidad">Incapacidad Subsecuente<span class="required">*</span></label>
                                                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                                                            <input type="checkbox" name="incapacidad" id="incapacidad" class="form-control col-md-5 col-xs-12" placeholder="1">
                                                                        </div>
                                                                        <span id="availability"></span>
                                                                    </div>

                                                                    <div class="form-group col-md-7">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificacion">Tipo de Incapacidad<span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                                                            <select class="form-control" name="clasificacion" id="clasificacion">
                                                                                <?php echo $sClasificacion; ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>


                                                                    <input type="hidden" name="id_incapacidad" id="id_incapacidad" value="<?php echo $incapacidad['id_incapacidad']; ?>"/>


                                                                    <div class="form-group ">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1 col-xs-offset-3">
                                                                            <button class="btn btn-danger col-md-3 col-sm-4 col-xs-4" type="button" id="btnCancel">Cancelar</button>
                                                                            <button class="btn btn-primary col-md-3 col-sm-4 col-xs-4" type="reset">Resetear</button>
                                                                            <button class="btn btn-success col-md-3 col-sm-4 col-xs-4" id="btnAdd" type="submit">Actualizar</button>
                                                                        </div>
                                                                    </div>

                                                                    <div id="resultado">

                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

<?php echo $footer;?>
