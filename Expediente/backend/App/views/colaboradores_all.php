<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2><?php echo $tituloColaboradores; ?> <small>ADG - RH</small></h2>
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
                                    <th></th>
                                    <th># Empleado</th>
                                    <th>Nombre</th>
                                    <th>Empresa</th>
                                    <th>Departamento</th>
                                    <th>Pago</th>
                                    <th>Identificador</th>
                                    <th>Acciones</th>
                                </tr>
                                </thead>
                                <tbody id="registros">
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
