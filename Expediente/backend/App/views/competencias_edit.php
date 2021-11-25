<?php echo $header;?>
<div class="right_col">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
                                                         <span><strong><span class="glyphicon glyphicon-hdd"></span> Editar Registro Competencias ADG para Vida y Carrera</strong>
                                                                                    </span>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
                    <form class="form-label-left input_mask" id="add" action="/Competencias/CompetenciasEdit" method="POST">
                        <div class="form-group">

                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2" for="nombre">Nombre de la Competencia<span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <input type="text" name="nombre" id="nombre" class="form-control col-md-7 col-xs-12" placeholder="Ej. Puntualidad" value="<?php echo $empresa['nombre']; ?>">
                                </div>
                                <span id="availability"></span>
                            </div>

                            <div class="form-group col-md-12">
                                <label class="control-label col-md-2" for="descripcion">Descripción dela Competencia<span class="required">*</span></label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                    <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ej. Cumplir con los horarios establecidos"><?php echo $empresa['descripcion']; ?></textarea>
                                </div>
                                <span id="availability"></span>
                            </div>
                            <input type="hidden" name="catalogo_competencia_id" id="catalogo_competencia_id" value="<?php echo $empresa['catalogo_competencia_id']; ?>">

                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button class="btn btn-danger col-md-5 col-sm-5 col-xs-5" type="button" id="btnCancel">Cancelar</button>
                                    <button class="btn btn-success col-md-5 col-sm-5 col-xs-5" id="btnAdd" type="submit">Actualizar</button>
                                </div>
                            </div>


                            <div id="resultado">

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</div>
<?php echo $footer;?>
