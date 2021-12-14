<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora Contabilidad para Vacaciones <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="container">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a data-toggle="tab" href="#home">Reporte Vacaciones Sobrantes Producción</a>
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
                                    <th>Ingreso en</th>
                                    <th>Tiempo Trabajando en ADG</th>
                                    <th>Días Correspondientes</th>
                                    <th>Días Usados</th>
                                    <th>Días Disponibles</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?= $tabla; ?>
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
