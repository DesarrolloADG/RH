<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora Registro y Contabilidad de Días Económicos <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#home">Registros desde Incidencias</a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#menu1">Días de Goce Sobrantes</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <br>
                        <div class="dataTable_wrapper">
                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                    <th>Empleado</th>
                                    <th>Fecha de Solicitud</th>
                                    <th>Fecha del Día Económico</th>
                                    <th>Estatus</th>
                                    <th>Documentación</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?= $tabla; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <br>
                        <h6>** Los días económicos soló son presentados para el área de producción.</h6>
                        <br>
                        <div class="dataTable_wrapper">
                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones1">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                    <th>Empleado</th>
                                    <th>Días Usados</th>
                                    <th>Días Restantes</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?= $tabla1; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php echo $footer; ?>
