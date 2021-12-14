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
                                <form class="form-label-left input_mask" id="add" action="/EmpleadoADG/Add" method="POST">
                                    <div class="form-group row" align="center">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading text-center">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <span><strong><span class="glyphicon glyphicon-hdd"></span> Alta Registro Insignia Empleado ADG</strong>
                                                            </span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="x_content">

                                                            <div class="form-group col-md-6">
                                                                <label class="control-label col-md-5 col-sm-3 col-xs-12" for="ano">Año a Premiar <span class="required">*</span></label>
                                                                <div class="col-md-7 col-sm-6 col-xs-12">
                                                                    <select class="form-control" name="ano" id="ano">
                                                                        <option value="" disabled selected>Selecciona el Año de la Insignia</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2024">2024</option>
                                                                        <option value="2025">2025</option>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-12">
                                                                <label class="control-label col-md-12 col-sm-3 col-xs-12" for="detalle">Descripción de la Insignia:<span class="required">*</span></label>
                                                                <div class="col-md-12 col-sm-6 col-xs-12">
                                                                    <textarea class="form-control" name="detalle" id="detalle" cols="40" rows="4" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Describa brevemente sobre la Insignia del año"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="fecha">Fecha de Liberación<span class="required">*</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <input type="date" name="fecha" id="fecha" class="form-control col-md-7 col-xs-12" placeholder="Nombre de la Empresa">
                                                                </div>
                                                                <span id="availability"></span>
                                                            </div>

                                                            <div class="form-group col-md-5">
                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="cantidad">Cantidad a Entregar<span class="required">* $:</span></label>
                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                    <input type="number" name="cantidad" id="cantidad" class="form-control col-md-7 col-xs-12" placeholder="2000.00">
                                                                </div>
                                                                <span id="availability"></span>
                                                            </div>


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
