<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Bitacora Reportes ADG <small>Conducta, BPM's, Actas Administrativas</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <br>
                <div class="x_content">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <br>
                            <li class="active">
                                <a data-toggle="tab" href="#home">
                                    <span class="fa fa-file" style="color:gray"></span> Reportes al Personal</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu3">
                                    <span class="fa fa-file" style="color:gray"></span> Reportes  BPM's</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu1">
                                    <span class="fa fa-file" style="color:gray"></span> Actas Administrativas</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <a href="/Reportes/Personal" type="submit"  class="btn btn-primary"><span class="fa fa-plus" style="color:white"></span> Nuevo</a>
                                    </div>
                                    <div id="resultado"> </div>
                                    <br>
                                </div>
                                <br>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                            <th>Empleado</th>
                                            <th>Fecha de alta</th>
                                            <th>Turno</th>
                                            <th>Imprimir</th>
                                            <th>Cargar</th>
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
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Documentacion"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                                    </div>
                                    <div id="resultado"> </div>
                                    <br>
                                </div>
                                <br>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                            <th>Empleado</th>
                                            <th>Fecha Accidente</th>
                                            <th>Trimestre</th>
                                            <th>Incapacidad</th>

                                            <th>Causa</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?= $tabla; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Documentacion"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                                    </div>
                                    <div id="resultado"> </div>
                                    <br>
                                </div>
                                <br>
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                        <thead>
                                        <tr>
                                            <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                            <th>Empleado</th>
                                            <th>Fecha Accidente</th>
                                            <th>Trimestre</th>
                                            <th>Incapacidad</th>

                                            <th>Causa</th>
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
                    <div class="x-content"></div>
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
