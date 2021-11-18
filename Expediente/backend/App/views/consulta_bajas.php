<?php echo $header;?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora Solicitudes para Proceso de Baja ADG extraidos de ASPEL-NOI <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form class="form-horizontal" id="form-existente" action="" method="POST">
                    <div class="form-group ">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="nombre">Colaborador Existente <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="existente" id="existente" type="checkbox" name="my-checkbox" checked>
                            </div>
                        </div>

                        <div class="form-group" id="identificador">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="identificador">Identificador<span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" name="identificador" id="identificador">
                                    <option value="" hidden>Selecciona un identificador</option>
                                    <?php echo $sIdentificador; ?>
                                </select>
                            </div>
                        </div>

                        <div class="panel-body" id="tabla_muestra">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th ></th>
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Fecha Baja</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody id="registros">
                                    <?= $sColaboradorExistente; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?php echo $footer;?>
