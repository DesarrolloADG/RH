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
                                <form class="form-label-left input_mask" id="add" action="/DiasEconomicos/DiasEconomicosEdit" method="POST">
                                    <div class="form-group row" align="center">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                         <span><strong><span class="glyphicon glyphicon-hdd"></span> Modificación para el Registro de Días Económicos ADG</strong>
                                                                                    </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-7">
                                                                <div class="form-group">

                                                                    <label for="nombre_colaborador">Nombre del Colaborador que solicito el Día Económico<span class="required">:</span></label>
                                                                    <div>
                                                                        <select class="form-control" name="nombre_colaborador" id="nombre_colaborador" disabled>
                                                                            <?php echo $sColaborador; ?>
                                                                        </select>
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_inicio">Fecha Solicitud<span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                                                            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control col-md-7 col-xs-12" value="<?php echo $economico['fecha_solicitud']; ?>">
                                                                        </div>
                                                                        <span id="availability"></span>
                                                                    </div>

                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fecha_fin">Día Solicitado<span class="required">*</span></label>
                                                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                                                            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control col-md-7 col-xs-12" value="<?php echo $economico['fecha_dia_economico']; ?>" disabled>
                                                                        </div>
                                                                        <span id="availability"></span>
                                                                    </div>

                                                                    <br>

                                                                    <div class="form-group col-md-7">
                                                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clasificacion">Estatus</label>
                                                                        <div class="col-md-9 col-sm-6 col-xs-12">
                                                                            <input type="text" name="estatus" id="estatus" class="form-control col-md-7 col-xs-12" value="<?php echo $economico['estatus']; ?>" disabled>
                                                                        </div>
                                                                    </div>

                                                                    <input type="hidden" name="id_dia_economico" id="id_dia_economico" value="<?php echo $economico['id_dia_economico']; ?>"/>


                                                                    <div class="form-group ">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-1 col-xs-offset-3">
                                                                            <button class="btn btn-danger col-md-3 col-sm-4 col-xs-4" type="button" id="btnCancel">Cancelar</button>
                                                                            <button class="btn btn-primary col-md-3 col-sm-4 col-xs-4" type="reset" >Resetear</button>
                                                                            <button class="btn btn-success col-md-3 col-sm-4 col-xs-4" id="btnAdd" type="submit">Agregar</button>
                                                                        </div>
                                                                    </div>

                                                                    <div id="resultado">

                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="col-md-5 subir-archivos">
                                                                <div class="form-group">
                                                                    <label>Subir archivos</label>
                                                                    <div class="input-group">
                                                                        <input placeholder="" type="text" class="form-control carga-archivo-filename" disabled="disabled">
                                                                        <!-- don't give a name === doesn't send on POST/GET -->
                                                                        <span class="input-group-btn">
                                                                            <!-- image-preview-input -->
                                                                            <div class="btn btn-default carga-archivo-input">
                                                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                                                <span class="carga-archivo-input-title">Seleccionar archivo</span>
                                                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                                                                                <!-- rename it -->
                                                                            </div>
                                                                         </span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group image-preview">
                                                                        <input placeholder="" type="text" class="form-control carga-archivo-filename" disabled="disabled">
                                                                        <span class="input-group-btn">
                                                                            <div class="btn btn-default carga-archivo-input">
                                                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                                                <span class="carga-archivo-input-title">Seleccionar archivo</span>
                                                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group image-preview">
                                                                        <input placeholder="" type="text" class="form-control carga-archivo-filename" disabled="disabled">
                                                                        <span class="input-group-btn">
                                                                            <div class="btn btn-default carga-archivo-input">
                                                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                                                <span class="carga-archivo-input-title">Seleccionar archivo</span>
                                                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="input-group image-preview">
                                                                        <input placeholder="" type="text" class="form-control carga-archivo-filename" disabled="disabled">
                                                                        <span class="input-group-btn">
                                                                            <div class="btn btn-default carga-archivo-input">
                                                                                <span class="glyphicon glyphicon-folder-open"></span>
                                                                                <span class="carga-archivo-input-title">Seleccionar archivo</span>
                                                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="input-file-preview" />
                                                                            </div>
                                                                        </span>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="col-md-6">
                                                                            Espacio utilizado
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            523.0 KB
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <a class="btn btn-primary btn-block" href="#">Subir archivo</a>
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
