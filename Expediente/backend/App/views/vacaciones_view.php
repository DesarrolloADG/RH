<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Historial de Vacaciones Registradas y Pagadas para el  Colaborador <small> <?php echo $colaboradores['nombre']; ?></small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">

                <div class="table-responsive">

                    <table class="table table-striped jambo_table bulk_action">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                    <th>Nombre</th>
                                    <th>Fecha Registrada</th>
                                    <th>Nomina</th>
                                    <th>Estatus</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?= $tabla; ?>
                                </tbody>
                            </table>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php echo $footer; ?>
