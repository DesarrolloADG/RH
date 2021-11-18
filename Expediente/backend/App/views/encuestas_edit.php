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
                                    <form class="form-label-left input_mask" id="add" action="/Encuestas/EncuestasAdd" method="POST">
                                        <div class="form-group row" align="center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <span><strong><span class="glyphicon glyphicon-check"></span> Registro Alta Encuestas</strong>
                                                                                    </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="x_content">
                                                                    <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="tipo_encuesta">Tipo de Encuesta<span class="required">*</span></label>
                                                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                                                            <select class="form-control" name="tipo_encuesta" id="tipo_encuesta">
                                                                                <?php echo $sTipoEncuesta; ?>
                                                                            </select>
                                                                        </div>
                                                                    <span id="availability"></span>
                                                                </div>

                                                                <div class="form-group col-md-5">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha_inicio">Fecha de Activacíón<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control col-md-7 col-xs-12" value="<?php echo $encuestas['fecha_inicio']; ?>">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>

                                                                <div class="form-group col-md-5">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha_final">Expira la Encuesta el día<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="date" name="fecha_final" id="fecha_final" class="form-control col-md-7 col-xs-12"  value="<?php echo $encuestas['fecha_fin']; ?>">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>
                                                                <span id="availability"></span>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="detalle">Descripción
                                                                        </label>
                                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                                        <textarea class="form-control" name="detalle" id="detalle" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Describa brevemente como ocurrio el accidente"><?php echo $encuestas['comentario']; ?></textarea>
                                                                    </div>
                                                                </div>


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
