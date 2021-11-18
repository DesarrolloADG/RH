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
                                    <form class="form-label-left input_mask" id="add" action="/Accidentes/AccidentesAdd" method="POST">
                                        <div class="form-group row" align="center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <span><strong><span class="glyphicon glyphicon-hdd"></span> Alta de Registro Accidente ADG</strong>
                                                                                    </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="x_content">

                                                                <div class="form-group col-md-9">
                                                                    <label class="control-label col-md-5 col-sm-3 col-xs-12" for="nombre_colaborador">Nombre del Colaborador Accidentado<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="nombre_colaborador" id="nombre_colaborador">
                                                                            <option value="" disabled selected>Selecciona un Colaborador</option>
                                                                            <?php echo $idColaborador; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-3">
                                                                    <label class="control-label col-md-5 col-sm-3 col-xs-12" for="empresa"><span class="fa fa-building"></span> Plantilla: </label>
                                                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                                                        <label class="control-label col-md-4 col-sm-3 col-xs-12" for="empresa">Xochimilco</label>                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>

                                                                <div class="form-group col-md-5">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha">Fecha del Accidente<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12" placeholder="Nombre de la Empresa">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>


                                                                <div class="form-group col-md-3">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="incapacidad">Activar Incapacidad<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="checkbox" name="incapacidad" id="incapacidad" class="form-control col-md-5 col-xs-12" placeholder="1">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="lugar">Lugar del Accidente<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="lugar" id="lugar">
                                                                            <option value="" disabled selected>Selecciona un Lugar</option>
                                                                            <?php echo $idLugar; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="clasificacion">Clasificación Accidente<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="clasificacion" id="clasificacion">
                                                                             <option value="" disabled selected>Selecciona la Clasificación</option>
                                                                            <?php echo $idClasificacion; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <span id="availability"></span>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="detalle">Detalle<span class="required">*</span></label>
                                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                                        <textarea class="form-control" name="detalle" id="detalle" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Describa brevemente como ocurrio el accidente"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-2 col-sm-3 col-xs-12" for="causa">Causa<span class="required">*</span></label>
                                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                                        <textarea class="form-control" name="causa" id="causa" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Describa brevemente la Causa del accidente"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="acto">Acto Inseguro<span class="required">*</span></label>
                                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                                        <textarea class="form-control" name="acto" id="acto" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Defina el Acto Inseguro del accidente"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-5 col-sm-3 col-xs-12" for="condicion">Condición Insegura<span class="required">*</span></label>
                                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                                        <textarea class="form-control" name="condicion" id="condicion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Defina la Condición Insegura del accidente"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group ">
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
