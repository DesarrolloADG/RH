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
                            <div class="count">1.00</div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> Este Trimestre </i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                            <div class="count">3.00</div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> Este Año</i></span>
                        </div>
                        <div class="col-md-2 col-sm-4  tile_stats_count">
                            <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                            <div class="count">5.00</div>
                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 2020 </i></span>
                        </div>
                    </div>
                </div>

                <div class="panel-body" <?php echo $visible; ?>>
                    <a href="/Incapacidades/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                    <a type="button" class="btn btn-info" data-toggle="modal" data-target=".Modal_Nuevo"><i class="fa fa-bar-chart-o"> <b>Indicadores</b></i></a>
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
<div class="modal fade Modal_Nuevo" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">

                <div class="form-group row" align="center">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading text-center">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                    </button>
                                    <span><strong><span class="glyphicon glyphicon-hdd"></span> Indicadores de Accidentes ADG</strong>
                                                                                    </span>
                                </div>

                            </div>
                            <div class="x_content">
                                <div class="row">
                                    <div class="tile_count float-right col-sm-12">
                                        <div class="col-md-2 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                                            <div class="count">1.00</div>
                                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> Este Trimestre </i></span>
                                        </div>
                                        <div class="col-md-2 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                                            <div class="count">3.00</div>
                                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> Este Año</i></span>
                                        </div>
                                        <div class="col-md-2 col-sm-4  tile_stats_count">
                                            <span class="count_top"><i class="fa fa-clock-o"></i> Total de Accidentes</span>
                                            <div class="count">5.00</div>
                                            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i> 2020 </i></span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php echo $footer; ?>
