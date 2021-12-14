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
                                    <form class="form-label-left input_mask" id="add" action="/Reportes/ReportesPersonalAdd" method="POST">
                                        <div class="form-group row" align="center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <span><strong><span class="glyphicon glyphicon-hdd"></span> Alta de Reporte Personal ADG</strong>
                                                            </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="x_content">

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-5 col-sm-3 col-xs-12" for="nombre_colaborador">Nombre del Colaborador a Levantar el Reporte<span class="required">*</span></label>
                                                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="nombre_colaborador" id="nombre_colaborador">
                                                                            <option value="" disabled selected>Selecciona un Colaborador</option>
                                                                            <?php echo $idColaborador; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-5">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha">Fecha del Reporte<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12" placeholder="Nombre de la Empresa">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-5 col-sm-3 col-xs-12" for="turno">Turno del Incidente<span class="required">*</span></label>
                                                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="turno" id="turno">
                                                                            <option value="" disabled selected>Selecciona un Turno</option>
                                                                            <option value="Matutino" >Matutino</option>
                                                                            <option value="Vespertino">Vespertino</option>
                                                                            <option value="Nocturno">Nocturno</option>
                                                                            <option value="Fin de Semana">Fin de Semana</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-5">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="jefe">Nombre del Jefe Inmediato<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="jefe" id="jefe">
                                                                            <option value="" disabled selected>Nombre del Jefe Inmediato</option>
                                                                            <?php echo $idColaboradorJefes; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-5 col-sm-3 col-xs-12" for="supervisor">Nombre del Supervisor de Turno<span class="required">*</span></label>
                                                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="supervisor" id="supervisor">
                                                                            <option value="" disabled selected>Nombre del Supervisor</option>
                                                                            <?php echo $idColaboradorJefes; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-5">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="reporta">Nombre de Quien Reporta<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="reporta" id="reporta">
                                                                            <option value="" disabled selected>Selecciona un Colaborador</option>
                                                                            <?php echo $idColaborador; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="detalle">Descripción del Suceso que da Origen al Reporte:<span class="required">*</span></label>
                                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                                        <textarea class="form-control" name="detalle" id="detalle" cols="40" rows="8" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Describa brevemente como ocurrio el accidente"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="check">Indique sí ha Habido Reincidencia de Este Evento:<span class="required">*</span></label>
                                                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                                                        <input type="checkbox" name="check" id="check" class="form-control col-md-5 col-xs-12" placeholder="1">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="check-grave">Fue Grave el Reporte:<span class="required">*</span></label>
                                                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                                                        <input type="checkbox" name="check-grave" id="check-grave" class="form-control col-md-5 col-xs-12" placeholder="1">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>
                                                                <br>

                                                                <div class="form-group ">
                                                                    <br>
                                                                    <br>
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
