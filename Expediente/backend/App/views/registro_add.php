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
                                    <form class="form-label-left input_mask" id="add" action="/RegistroCapacitaciones/RegistroAdd" method="POST">
                                        <div class="form-group row" align="center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <span><strong><span class="fa fa-book"></span> Alta de Capacitaciones</strong>
                                                                                    </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="x_content">

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nom_cur">Nombre del Curso<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="textarea" name="nom_cur" id="nom_cur" class="form-control col-md-7 col-xs-12" placeholder="Ej. PRIMEROS AUXILIOS">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="duracion">Duración del Curso<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="number" name="duracion" id="duracion" class="form-control col-md-7 col-xs-12" placeholder="Ej. 1">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="horas">Horas a cubrir<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="number" name="horas" id="horas" class="form-control col-md-7 col-xs-12" placeholder="Ej. 30">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nom_exp">Nombre del Expositor<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="nom_exp" id="nom_exp">
                                                                            <option value="" disabled selected>Selecciona un Expositor</option>
                                                                            <option value="000">EXPOSITOR EXTERNO</option>
                                                                            <?php echo $idExpositor; ?>
                                                                        </select>
                                                                        <span id="availability1"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha">Fecha<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12" >
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="lugar">Planta<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="lugar" id="lugar">
                                                                            <option value="" disabled selected>Selecciona una Planta</option>
                                                                            <?php echo $idLugarPlanta; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="puesto">Personal<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="puesto" id="puesto">
                                                                            <option value="" disabled selected>Selecciona el Personal</option>
                                                                            <?php echo $idPuesto; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="calificacion">Tendrán Alguna Calificación<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name=calificacion id=calificacion">
                                                                            <option value="" disabled selected>Selecciona si Incluiran Calificaciones</option>
                                                                            <option value="0">Si Incluiran</option>
                                                                            <option value="1">No Incluiran</option>
                                                                        </select>
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
