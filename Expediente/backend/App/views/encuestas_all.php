<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Encuestas<small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="container">
                    <ul class="nav nav-tabs">
                        <br>
                        <li class="active">
                            <a data-toggle="tab" href="#home">
                                <span class="fa fa-archive" style="color:gray"></span> General</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#menu3">
                                <span class="fa fa-user" style="color:gray"></span> Ingreso</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#menu_induccion">
                                <span class="fa fa-user" style="color:gray"></span> Inducción</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#menu1">
                                <span class="fa fa-sticky-note" style="color:gray"></span> Comunicación Organizacional</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#menu2">
                                <span class="fa fa-credit-card" style="color:gray"></span> Comunicación</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#menu4">
                                <span class="fa fa-line-chart" style="color:gray"></span> Clima Laboral</a>
                        </li>

                        <li>
                            <a data-toggle="tab" href="#menu6">
                                <span class="fa fa-heart" style="color:gray"></span> Salida</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    Se muestran los registros dados de alta para las evaluaciones anuales, excluyendo Cuestionario de Ingreso y Salida, los anteriores son asignados automaticamente al registrar un usuario y al darlo de baja. **
                                    <br>
                                    <br>
                                    <a href="/Encuestas/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                                </div>
                                <div id="resultado"> </div>
                                <br>
                            </div>
                            <div class="dataTable_wrapper">
                                <br>
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Tipo Encuesta</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Fecha de Alta Evaluación</th>
                                        <th>Trimestre Aplicación</th>
                                        <th>Estado</th>
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
                                    Se muestran los registros dados de alta para las evaluaciones anuales, excluyendo Cuestionario de Ingreso y Salida, los anteriores son asignados automaticamente al registrar un usuario y al darlo de baja. **
                                    <br>
                                    <br>
                                    <a href="/Encuestas/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                                </div>
                                <div id="resultado"> </div>
                                <br>
                            </div>
                            <div class="dataTable_wrapper">
                                <br>
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Tipo Encuesta</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Fecha de Alta Evaluación</th>
                                        <th>Trimestre Aplicación</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $tabla_comunicacion_organizacional; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu_induccion" class="tab-pane fade">
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    Cuestionarios de Ingreso para Colaboradores dados de alta desde el Sistema de Accesos. **
                                    <br>
                                    <br>
                                    <a href="/Encuestas/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                                </div>
                                <div id="resultado"> </div>
                                <br>
                            </div>
                            <div class="dataTable_wrapper">
                                <br>
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones-ingreso">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAllIngreso" id="checkAllIngreso" value=""/></th>
                                        <th>Nombre</th>
                                        <th>Fecha de Registro</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $tablaInduccion; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    Cuestionarios de Ingreso para Colaboradores dados de alta desde el Sistema de Accesos. **
                                    <br>
                                    <br>
                                    <a href="/Encuestas/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                                </div>
                                <div id="resultado"> </div>
                                <br>
                            </div>
                            <div class="dataTable_wrapper">
                                <br>
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones-ingreso">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAllIngreso" id="checkAllIngreso" value=""/></th>
                                        <th>Nombre</th>
                                        <th>Fecha de Registro</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $tablaIngreso; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    Se muestran los registros dados de alta para las evaluaciones anuales, excluyendo Cuestionario de Ingreso y Salida, los anteriores son asignados automaticamente al registrar un usuario y al darlo de baja. **
                                    <br>
                                    <br>
                                    <a href="/Encuestas/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                                </div>
                                <div id="resultado"> </div>
                                <br>
                            </div>
                            <div class="dataTable_wrapper">
                                <br>
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Tipo Encuesta</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Fecha de Alta Evaluación</th>
                                        <th>Trimestre Aplicación</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $tabla_comunicacion; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu4" class="tab-pane fade">
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    Se muestran los registros dados de alta para las evaluaciones anuales, excluyendo Cuestionario de Ingreso y Salida, los anteriores son asignados automaticamente al registrar un usuario y al darlo de baja. **
                                    <br>
                                    <br>
                                    <a href="/Encuestas/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                                </div>
                                <div id="resultado"> </div>
                                <br>
                            </div>
                            <div class="dataTable_wrapper">
                                <br>
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Tipo Encuesta</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Fecha de Alta Evaluación</th>
                                        <th>Trimestre Aplicación</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $tabla_clima_laboral; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="menu5" class="tab-pane fade">
                            <br>
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <div class="form-group col-md-6">
                                        <label>PORCENTAJE PARA EL CUMPLIMIENTO DE INDICADORES: </label>
                                        <input type="text" class="form-control" value="<?php echo ""; ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>ÚLTIMA CALIFICACIÓN EVALUACIÓN 360°:</label>
                                        <input type="text" class="form-control" value="<?php echo ""; ?>"disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>EL COLABORADOR HA PRESENTADO PROYECTOS DE MEJORA: </label>
                                        <input type="text" class="form-control" value="<?php echo ""; ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>PORCENTAJE(%) DE APEGO A SU PUESTO: </label>
                                        <input type="text" class="form-control" value="<?php echo ""; ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>PORCENTAJE(%) DE APEGO A SU PERFIL ACTUAL: </label>
                                        <input type="text" class="form-control" value="<?php echo ""; ?>" disabled>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-6">
                                        <label>El colaborador cuenta con reportes de Buenas Prácticas de Manufactura, Actas Administrativas o Reportes de Conducta
                                            : </label>
                                        <input type="text" class="form-control" value="<?php echo $repo; ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>ÚLTIMO REPORTE REGISTRADO: </label>
                                        <input type="text" class="form-control" value="<?php echo $repor; ?>" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>El colaborador ha sido distinguido con el reconocimiento "Empleado ADG"
                                            : </label>
                                        <input type="text" class="form-control" value="<?php echo ""; ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 subir-archivos">
                                    <div class="form-group">

                                    </div>
                                </div>
                                <div class="col-md-6 subir-archivos">
                                    <div class="form-group">

                                    </div>
                                </div>
                                <div class="col-md-6 subir-archivos">
                                    <div class="form-group">
                                        <label>PROYECTOS DE MEJORA PROPUESTOS POR EL COLABORADOR</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="dataTable_wrapper">
                                                    <br>
                                                    <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                            <th>Nombre del Proyecto</th>
                                                            <th>Se aplico</th>
                                                        </tr>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 subir-archivos">
                                    <div class="form-group">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2><i class="fa fa-align-left"></i> Historícos <small>por Colaborador</small></h2>
                                                <ul class="nav navbar-right panel_toolbox">
                                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                    </li>
                                                    <li class="dropdown">
                                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    </li>
                                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                    </li>
                                                </ul>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="x_content">

                                                <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                                                    <div class="panel">
                                                        <a class="panel-heading collapsed" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="false" aria-controls="collapseOne">
                                                            <h4 class="panel-title">HISTORÍAL EVAUACIONES DE DESEMPEÑO</h4>
                                                        </a>
                                                        <div id="collapseOne1" class="panel-collapse in collapse" role="tabpanel" aria-labelledby="headingOne" style="">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="dataTable_wrapper">
                                                                            <br>
                                                                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                                    <th>Fecha Aplicación</th>
                                                                                    <th>Calificación</th>
                                                                                </tr>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                            </table>
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
                                                            <h4 class="panel-title">HISTORÍAL EVAUACIONES 360°</h4>
                                                        </a>
                                                        <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" style="">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="dataTable_wrapper">
                                                                            <br>
                                                                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                                    <th>Fecha Aplicación</th>
                                                                                    <th>Calificación</th>
                                                                                </tr>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel">
                                                        <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
                                                            <h4 class="panel-title">INDICADORES QUE MEJOR CUMPLE EL COLABORADOR</h4>
                                                        </a>
                                                        <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                            <div class="panel-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="dataTable_wrapper">
                                                                            <br>
                                                                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                                    <th>Descripción Indicador</th>
                                                                                    <th>Porcentaje</th>
                                                                                </tr>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                </tbody>
                                                                            </table>
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


                            </div>
                            <br>
                        </div>
                        <div id="menu6" class="tab-pane fade">
                            <br>
                            <div class="form-group row">
                                <div class="col-md-9 col-sm-9  offset-md-3">
                                    Cuestionarios de Ingreso para Colaboradores dados de alta desde el Sistema de Accesos. **
                                    <br>
                                    <br>
                                    <a href="/Encuestas/Add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                                </div>
                                <div id="resultado"> </div>
                                <br>
                            </div>
                            <div class="dataTable_wrapper">
                                <br>
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones-ingreso">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAllIngreso" id="checkAllIngreso" value=""/></th>
                                        <th>Nombre</th>
                                        <th>Fecha de Salida</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?= $tablaSalida; ?>
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
