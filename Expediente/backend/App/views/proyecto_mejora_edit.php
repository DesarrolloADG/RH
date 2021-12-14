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
                                    <form class="form-label-left input_mask" id="add" action="/ProyectosMejora/ProyectosEdit" method="POST">
                                        <div class="form-group row" align="center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <span><strong><span class="glyphicon glyphicon-hdd"></span> Modificar Registro de Proyecto de Mejora ADG</strong>
                                                            </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="x_content">

                                                                <div class="form-group col-md-12">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nombrep">Nombre del Poyecto Propuesto a ADG<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="text" name="nombrep" id="nombrep" class="form-control col-md-7 col-xs-12" placeholder="Ej. ANÁLISIS FODA PRODUCCIÓN" value=" <?php echo $sProyectos['nombrep']; ?>">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-5 col-sm-3 col-xs-12" for="nombre_colaborador">Nombre del Colaborador que Presento el Proyecto<span class="required">*</span></label>
                                                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                                                        <select class="form-control" name="nombre_colaborador" id="nombre_colaborador">
                                                                            <option value="" disabled selected>Selecciona un Colaborador</option>
                                                                            <?php echo $sColaborador; ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha">Fecha en que Presento el Poyecto<span class="required">*</span></label>
                                                                    <div class="col-md-8 col-sm-6 col-xs-12">
                                                                        <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12" placeholder="Nombre de la Empresa" value="<?php echo $sProyectos['fecha']; ?>">
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>

                                                                <div class="form-group col-md-12">
                                                                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="detalle">Descripción del Proyecto a Detalle:<span class="required">*</span></label>
                                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                                        <textarea class="form-control" name="detalle" id="detalle" cols="40" rows="8" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="OBJETIVOS, MISIÓN, VISIÓN, ALCANCES"><?php echo $sProyectos['descripcion']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="form-group col-md-12">
                                                                    <label class="control-label col-md-4 col-sm-3 col-xs-12" for="check">Indique sí el Proyecto se Implemento:<span class="required">*</span></label>
                                                                    <div class="col-md-1 col-sm-6 col-xs-12">
                                                                        <?php
                                                                        $tabla = '';
                                                                        if($sProyectos['implementacion'] == 1)
                                                                        {
                                                                            $check = $tabla.=<<<html
                                                                              checked
html;
                                                                        }
                                                                        ?>
                                                                        <input type="checkbox" name="check" id="check" class="form-control col-md-5 col-xs-12" placeholder="1" <?php echo $tabla; ?>>
                                                                    </div>
                                                                    <span id="availability"></span>
                                                                </div>
                                                                <br>

                                                                <div class="form-group col-md-12">
                                                                    <label class="control-label col-md-12 col-sm-3 col-xs-12" for="detalle1">Resultados de la Evaluación de o para la Implementación:<span class="required">*</span></label>
                                                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                                                        <textarea class="form-control" name="detalle1" id="detalle1" cols="40" rows="5" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="OBJETIVOS, MISIÓN, VISIÓN, ALCANCES"><?php echo $sProyectos['resultados']; ?></textarea>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                                <div class="form-group ">
                                                                    <br>
                                                                    <br>
                                                                    <br>
                                                                    <div class="col-md-12 col-sm-9 col-xs-12 col-md-offset-3 col-xs-offset-4">
                                                                        <button class="btn btn-danger col-md-3 col-sm-3 col-xs-5" type="button" id="btnCancel">Cancelar</button>
                                                                        <button class="btn btn-success col-md-3 col-sm-3 col-xs-5" id="btnAdd" type="submit">Actualizar</button>
                                                                    </div>
                                                                </div>
                                                                <input type="hidden" name="id_proyecto_mejora" id="id_proyecto_mejora" value="<?php echo $proyecto_mejora; ?>"/>

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
