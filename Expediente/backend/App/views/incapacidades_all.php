<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora Incapacidades ADG <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="row">
                    <div class="tile_count float-right col-sm-12">
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                            <div class="count"><?php echo $total_incapacidadesTrimestre['total_trimestre']; ?>.00</div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> Este Trimestre </i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                            <div class="count"><?php echo $total_incapacidadesADG['total']; ?>.00</div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> Este Año</i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                            <div class="count"><?php echo $total_incapacidades['total']; ?>.00</div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 2020 </i></span>
                        </div>
                    </div>
                </div>

                <div class="panel-body" <?php echo $visible; ?>>
                    <a href="/Incapacidades/Add" type="button" class="btn btn-primary" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <form name="all" id="all" action="/Empresa/delete" method="POST">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Empleado</th>
                                        <th>Fecha Inicial</th>
                                        <th>Fecha Final</th>
                                        <th>Clasificacion Incapacidad</th>
                                        <th>Estatus</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $tabla; ?>
                                    </tbody>
                                </table>
                            </div>

                        </form>
                    </table>
                </div>
            </div>


        </div>
    </div>

</div>
<?php echo $footer; ?>
