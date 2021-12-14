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
                                <form class="form-horizontal" id="edit" action="/RegistroCapacitaciones/RegistroCapacitacionesEdit" method="POST">
                                    <div class="form-group row" align="center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading text-center">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <span><strong><span class="glyphicon glyphicon-hdd"></span> Alta de Capacitaciones</strong>
                                                                                    </span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="x_content">

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nombre_curso">Nombre del Curso<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <input type="textarea" name="nombre_curso" id="nombre_curso" class="form-control col-md-7 col-xs-12" placeholder="Nombre del Curso" value="<?php echo $registro['nombre_curso']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nombre_expositor">Nombre del Expositor<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <input type="textarea" name="nombre_expositor" id="nombre_expositor" class="form-control col-md-7 col-xs-12" placeholder="Nombre del Curso" value="<?php
                                                                    if($registro['nombre_expositor'] == '000')
                                                                    {
                                                                       echo "EXPOSITOR EXTERNO";
                                                                    }
                                                                    else
                                                                    {
                                                                        echo $nombre['nombre'];
                                                                    }
                                                                     ?>"disabled>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha">Fecha<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12" value="<?php echo $registro['fecha']; ?>">
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nombre_expositor">Planta<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <select class="form-control" name="lugar" id="lugar">
                                                                        <?php echo $sLugarPlanta; ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="puestos">Personal<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <select class="form-control" name="persona" id="persona">
                                                                        <?php echo $sPuesto; ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="id_capacitacion" id="id_capacitacion" value="<?php echo $registro['id_capacitacion']; ?>"/>

                                                            <div class="form-group ">
                                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2 col-xs-offset-3">
                                                                    <button class="btn btn-danger col-md-3 col-sm-3 col-xs-5" type="button" id="btnCancel">Cancelar</button>
                                                                    <button class="btn btn-primary col-md-3 col-sm-3 col-xs-5" type="reset" >Resetear</button>
                                                                    <button class="btn btn-success col-md-3 col-sm-3 col-xs-5" id="btnAdd" type="submit">Actualizar</button>
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
                                    <!--
                                    <div class="form-group row" align="center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading text-center">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <span><strong><span class="glyphicon glyphicon-hdd"></span> Alta de Capacitaciones</strong>
                                                                                    </span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="x_content">

                                                            <div class="form-group col-md-9">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nombre_colaborador">Nombre del Colaborador Accidentado<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <select class="form-control" name="nombre_colaborador" id="nombre_colaborador" disabled>
                                                                        <p echo $sColaborador; ?>
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
                                                                    <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12" value="<?php echo $accidente['fecha_accidente']; ?>">
                                                                </div>
                                                                <span id="availability"></span>
                                                            </div>


                                                            <div class="form-group col-md-3">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="incapacidad">Activar Incapacidad<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <input type="checkbox" name="incapacidad" id="incapacidad" class="form-control col-md-5 col-xs-12" disabled >
                                                                </div>
                                                                <span id="availability"></span>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="lugar">Lugar del Accidente<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <select class="form-control" name="lugar" id="lugar">
                                                                        <php echo $sLugar; ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="clasificacion">Clasificación Accidente<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <select class="form-control" name="clasificacion" id="clasificacion">
                                                                        <php echo $sClasificacion; ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <span id="availability"></span>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="detalle">Detalle<span class="required">*</span></label>
                                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                                    <textarea class="form-control" name="detalle" id="detalle" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Describa brevemente como ocurrio el accidente"><?php echo $accidente['detalle_accidente']; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-2 col-sm-3 col-xs-12" for="causa">Causa<span class="required">*</span></label>
                                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                                    <textarea class="form-control" name="causa" id="causa" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Describa brevemente la Causa del accidente"><?php echo $accidente['causa']; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="acto">Acto Inseguro<span class="required">*</span></label>
                                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                                    <textarea class="form-control" name="acto" id="acto" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Defina el Acto Inseguro del accidente"><?php echo $accidente['acto_inseguro']; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-5 col-sm-3 col-xs-12" for="condicion">Condición Insegura<span class="required">*</span></label>
                                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                                    <textarea class="form-control" name="condicion" id="condicion" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Defina la Condición Insegura del accidente"><?php echo $accidente['condicion_insegura']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="id_accidente" id="id_accidente" value="<hp echo $accidente['id_accidente']; ?>"/>

                                                            <div class="form-group ">
                                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2 col-xs-offset-3">
                                                                    <button class="btn btn-danger col-md-3 col-sm-3 col-xs-5" type="button" id="btnCancel">Cancelar</button>
                                                                    <button class="btn btn-primary col-md-3 col-sm-3 col-xs-5" type="reset" >Resetear</button>
                                                                    <button class="btn btn-success col-md-3 col-sm-3 col-xs-5" id="btnAdd" type="submit">Actualizar</button>
                                                                </div>
                                                            </div>

                                                            <div id="resultado">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

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
