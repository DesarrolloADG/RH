<?php echo $header;?>
<div class="right_col">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
      <div class="panel panel-default">
          <div class="panel-heading text-center">
                                                         <span><strong><span class="glyphicon glyphicon-hdd"></span> Alta de Registro Accidente ADG</strong>
                                                                                    </span>
          </div>
          <div class="panel-body">
              <div class="col-md-12">
                  <form class="form-label-left input_mask" id="add" action="/Competencias/CompetenciasAdd" method="POST">
                      <div class="form-group">

                          <div class="form-group col-md-12">
                              <label class="control-label col-md-2" for="nombre">Nombre de la Competencia<span class="required">*</span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                  <input type="text" name="nombre" id="nombre" class="form-control col-md-7 col-xs-12" placeholder="Ej. Puntualidad">
                              </div>
                              <span id="availability"></span>
                          </div>

                          <div class="form-group col-md-12">
                              <label class="control-label col-md-2" for="descripcion">Descripción dela Competencia<span class="required">*</span></label>
                              <div class="col-md-4 col-sm-6 col-xs-12">
                                  <textarea class="form-control" name="descripcion" id="descripcion" placeholder="Ej. Cumplir con los horarios establecidos"></textarea>
                              </div>
                              <span id="availability"></span>
                          </div>
                          <br>
                          <div class="form-group">
                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2 col-xs-offset-3">
                                  <button class="btn btn-danger col-md-3 col-sm-3 col-xs-5" type="button" id="btnCancel">Cancelar</button>
                                  <button class="btn btn-primary col-md-3 col-sm-3 col-xs-5" type="reset" >Resetear</button>
                                  <button class="btn btn-success col-md-3 col-sm-3 col-xs-5" id="btnAdd" type="submit">Agregar</button>
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
