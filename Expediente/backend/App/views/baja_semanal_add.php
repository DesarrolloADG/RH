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
                                    <form class="form-label-left input_mask" id="add" action="/Baja/BajaAddConsulta" method="POST">
                                        <div class="form-group row" align="center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <span><strong><span class="glyphicon glyphicon-user"></span> Bajas Colaboradores ADG</strong>
                                                                                    </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="x_content">

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nombre_colaborador">Nombre del Colaborador<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="nombre_colaborador" id="nombre_colaborador">
                                                                            <?php echo $sColaborador; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-5">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha">Fecha de Salida Prevista<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12"  value="<?php echo $baja['fecha_baja']; ?>" disabled>
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>


                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="motivo">Motivo de Baja<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="motivo" id="motivo">
                                                                            <option value="" disabled selected>Selecciona el Motivo</option>
                                                                            <?php echo $idMotivo; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span id="availability"></span>



                                                                <div class="form-group ">
                                                                    <br>
                                                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2 col-xs-offset-3">
                                                                        <button class="btn btn-danger col-md-3 col-sm-3 col-xs-5" type="button" id="btnCancel">Cancelar</button>
                                                                        <button class="btn btn-primary col-md-3 col-sm-3 col-xs-5" type="reset" >Resetear</button>
                                                                        <button class="btn btn-success col-md-3 col-sm-3 col-xs-5" id="btnAdd" type="submit">Agregar</button>
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
