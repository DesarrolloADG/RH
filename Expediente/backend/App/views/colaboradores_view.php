<?php echo $header;?>
<div class="right_col">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Datos del Colaborador<small>Con ID <?php echo $colaborador['catalogo_colaboradores_id']; ?>  </small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link " type="submit" id="btnCancel"><i class="fa fa-close"></i></a></li>

                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-2">
                    <div class="">
                        <img id="vista_previa" class="form-control foto" src="/img/colaboradores/<?=$colaborador['foto']?>" alt="Foto de Perfil">
                    </div>
                    <div class="byline"></div>
                </div>
                <div class="col-md-4">
                    <h2 class="title">
                        <a>
                            <p class="excerpt"><span class="bi bi-file-person" style="color:grey"></span><b>| <?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></b> </p>
                        </a>

                        <a>
                            <p class="excerpt"><span class="bi bi-app-indicator" style="color:grey"></span> | NÚMERO DEL COLABORADOR: <?php echo $colaborador['numero_identificador']; ?></p>
                        </a>

                        <a>
                            <p class="excerpt"><span class="bi bi-gender-ambiguous" style="color:grey"></span> | <?php echo $colaborador['sexo']; ?></p>
                        </a>
                        <a>
                            <p class="excerpt"><span class="bi bi-building" style="color:grey"></span> | <?php echo $nombreEmpresa['nombre_empresa']; ?></p>
                        </a>
                        <a>
                            <p class="excerpt"><span class="bi bi-credit-card" style="color:grey"></span> | CURP: <?php echo $colaborador['curp']; ?></p>
                        </a>
                        <a>
                            <p class="excerpt"><span class="bi bi-credit-card" style="color:grey"></span> | RFC: <?php echo $colaborador['rfc']; ?></p>
                        </a>
                        <a>
                            <p class="excerpt"><span class="bi bi-credit-card" style="color:grey"></span> | IMSS: <?php echo $colaborador['imss']; ?></p>
                        </a>

                    </h2>
                    <div class="byline"></div>
                </div>
                <div class="col-md-6">
                    <h2 class="title">

                        <a>
                            <p class="excerpt"><span class="glyphicon glyphicon-th" style="color:grey"></span><b> | DEPARTAMENTO/AREA ACTUAL:</b> <?php echo $nombreDepartamento['nombre']; ?></p>
                        </a>

                        <a>
                            <?php
                            $firstDate  = new DateTime($colaborador['fecha_alta']);
                            $secondDate = new DateTime(date("Y") . "-" . date("m") . "-" . date("d"));
                            $intvl = $firstDate->diff($secondDate);
                            $fecha = $intvl->y . " año(s), " . $intvl->m." mes(es) y ".$intvl->d." dia(s)";
                            ?>
                            <p class="excerpt"><span class="bi bi-calendar-x" style="color:grey"></span><b> | ANTIGUEDAD EN ADG:</b> <?php echo $fecha ?></p>
                        </a>
                        <a>
                            <p class="excerpt"><span class="bi bi-calendar-x" style="color:grey"></span><b> | FECHA DE INGRESO A ADG:</b> <?php echo $colaborador['fecha_alta']; ?></p>
                        </a>
                        <a>
                            <p class="excerpt"><span class="bi bi-app-indicator" style="color:grey"></span><b>| PUESTO ACTUAL:</b>  <?php echo $nombrePuesto['nombre']; ?></p>
                        </a>
                        <a>
                            <?php
                            $firstDate  = new DateTime($AntiguedadPuestoActual['fecha_actualizacion']);
                            $secondDate = new DateTime(date("Y") . "-" . date("m") . "-" . date("d"));
                            $intvl = $firstDate->diff($secondDate);
                            $fecha = $intvl->y . " año(s), " . $intvl->m." mes(es) y ".$intvl->d." dia(s)";
                            ?>
                            <p class="excerpt"><span class="bi bi-app-indicator" style="color:grey"></span><b> | ANTIGUEDAD EN EL PUESTO ACTUAL:</b> <?php echo $fecha ?></p>
                        </a>
                    </h2>
                    <div class="byline"></div>
                </div>
                <div class="x_content">
                    <div class="container">
                        <ul class="nav nav-tabs">
                            <br>
                            <li class="active">
                                <a data-toggle="tab" href="#home">
                                    <span class="fa fa-archive" style="color:gray"></span> Documentación</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu3">
                                    <span class="fa fa-user" style="color:gray"></span> Datos Personales</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu1">
                                    <span class="fa fa-sticky-note" style="color:gray"></span> Datos Ingreso</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu2">
                                    <span class="fa fa-credit-card" style="color:gray"></span> Prestaciones</a>
                            </li>
                            <li>
                                <a data-toggle="tab" href="#menu4">
                                    <span class="fa fa-line-chart" style="color:gray"></span> Capacitación</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#menu6">
                                    <span class="fa fa-heart" style="color:gray"></span> Salud/Seguridad</a>
                            </li>

                            <li>
                                <a data-toggle="tab" href="#menu7">
                                    <span class="fa fa-tasks" style="color:gray"></span> Carrera</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div id="home" class="tab-pane fade in active">
                                <br>
                                <div class="form-group row">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Documentacion"><i class="fa fa-plus" aria-hidden="true"></i> Documento</button>
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
                                            <th>Titulo</th>
                                            <th>Nombre del Archivo</th>
                                            <th>Descripcion</th>
                                            <th>Fecha Alta</th>
                                            <th>Acciones</th>
                                        </tr>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel-body">
                                                <div class="col-md-6">
                                                    <div class="col-md-9 col-sm-9  offset-md-5">
                                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_Datos_Ingreso"><i class="fa fa-edit" aria-hidden="true"></i> Editar</button>
                                                    </div>
                                                    <div id="resultado"> </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <div class="form-group col-md-6">
                                                        <label>FECHA DE INGRESO AL PUESTO EN ADG: </label>
                                                        <input type="text" class="form-control" value="<?php echo $colaborador['fecha_alta']; ?>" disabled>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>PORCENTAJE INICIAL DE APEGO AL PUESTO:</label>
                                                        <input id="porcentaje_proyecto" type="text" class="form-control" value="<?php echo $ingreso_proyecto['porcentaje_apego']; ?>"disabled>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>CALIFICACIÓN DE LA EVALUACIÓN INICIAL DE LA INDUCCIÓN: </label>
                                                        <input id="calificacion_evaluacion" type="text" class="form-control" value=" NO SE HA CARGADO" disabled>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <?php echo $CuestionarioIngreso_; ?>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>CALIFICACIÓN OBTENIDA EN EL PROYECTO DE INGRESO:</label>
                                                        <input id="calificacion_proyecto" type="text" class="form-control" value="<?php echo $ingreso_proyecto['calificacion_proyecto']; ?>" disabled>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>NOMBRE DEL PROYECTO QUE PRESENTO:</label>
                                                        <input id="nombre_proyecto" type="text" class="form-control" value="<?php echo $ingreso_proyecto['nombre_proyecto']; ?>"disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 subir-archivos">
                                                    <div class="form-group">
                                                        <label>HISTÓRICO DE PUESTOS OCUPADOS EN ADG</label>
                                                        <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="dataTable_wrapper">
                                                                <br>
                                                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                                    <thead>
                                                                    <tr>
                                                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                        <th>Nombre del Puesto</th>
                                                                        <th>Fecha de Ingreso</th>
                                                                    </tr>
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
                            </div>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <br>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="col-md-9 col-sm-9  offset-md-5">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_Incentivo_Trimestral"><i class="fa fa-edit" aria-hidden="true"></i> Editar</button>
                                        </div>
                                        <div id="resultado"> </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="form-group col-md-6">
                                            <label>DIAS RESTANTES DE VACACIONES POR DISFRUTAR: </label>
                                            <input type="text" class="form-control" value="<?php echo $colaborador['fecha_alta']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>MONTO DE SU INCENTIVO TRIMESTRAL:</label>
                                            <input id="monto_trimestral" type="text" class="form-control" value="<?php echo $incentivo_trimestral['monto']; ?>"disabled>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>DÍAS ECONÓMICOS RESTANTES POR DISFRUTAR: </label>
                                            <?php echo $tabla_economicos; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6 subir-archivos">
                                        <div class="form-group">
                                            <label>HISTORÍA DE SUELDOS O SALARIOS</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="dataTable_wrapper">
                                                        <br>
                                                        <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                            <thead>
                                                            <tr>
                                                                <th>Cantidad por día</th>
                                                                <th>Fecha de Modificación/Alta </th>
                                                            </tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?= $tablaSueldo; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <br>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="col-md-9 col-sm-9  offset-md-5">
                                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modal_Datos_Personales"><i class="fa fa-edit" aria-hidden="true"></i> Editar</button>
                                        </div>
                                        <div id="resultado"> </div>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="form-group col-md-6">
                                            <label>FECHA DE NACIMIENTO: </label>
                                            <input type="text" class="form-control" value="<?php echo $colaborador['fecha_nacimiento']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>GENERO:</label>
                                            <input type="text" class="form-control" value="<?php echo $colaborador['sexo']; ?>"disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>ESTADO CIVIL: </label>
                                            <input type="text" class="form-control" id="id_estado_civil" value="<?php echo $otros_datos['estado_civil']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>ULTIMO GRADO DE ESTUDIOS: </label>
                                            <input type="text" class="form-control" id="id_ultimo_grado" value="<?php echo $otros_datos['ultimo_grado_estudios']; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 subir-archivos">
                                        <div class="form-group">
                                            <br>
                                            <label>DOMICILIOS REGISTRADOS PARA EL COLABORADOR</label>
                                            <br>
                                            <br>
                                            <div class="col-md-9 col-sm-9  offset-md-5">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Domicilios"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="dataTable_wrapper">
                                                        <br>
                                                        <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                            <thead>
                                                            <tr>
                                                                <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                <th>Domicilio</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?= $tabla2; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <hr>
                                            <label>REGISTRO DE HIJOS</label>
                                            <br>
                                            <br>
                                            <div class="col-md-9 col-sm-9  offset-md-5">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Hijos"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="dataTable_wrapper">
                                                        <br>
                                                        <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                            <thead>
                                                            <tr>
                                                                <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                <th>Ocupación</th>
                                                                <th>Fecha de Nacimiento</th>
                                                                <th>Edad</th>
                                                                <th>Genero</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?= $tabla3; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <hr>
                                            <label>ESTUDIOS ADICIONALES</label>
                                            <br>
                                            <br>
                                            <div class="col-md-9 col-sm-9  offset-md-5">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Estudios"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="dataTable_wrapper">
                                                        <br>
                                                        <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                            <thead>
                                                            <tr>
                                                                <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                <th>Descripción</th>
                                                                <th>Documento Obtenido</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?= $tabla4; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div id="menu4" class="tab-pane fade">
                                <br>
                                <div class="panel-body">
                                    <div class="col-md-12">
                                        <div class="form-group col-md-6">
                                            <label>NOMBRE DE LA ÚLTIMA CAPACITACIÓN QUE ASISTIO: </label>
                                            <?=  $DatoUltimoCurso; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>PORCENTAJE DE ASISTENCIA A CAPACITACIONES ADG:</label>
                                            <?=  $DatoPorcentaje; ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>¿ES INSTRUCTOR DE CAPACITACIÓN? </label>
                                            <input type="text" class="form-control" value="<?php if($EsCapacitador['numero'] >= 1)
                                            {
                                                echo $EsCapacitador['numero']." VEZ HA SIDO CAPACITADOR";
                                            }
                                            else
                                            {
                                                echo "ACTUALMENTE NO ES CAPACITADOR";
                                            }?>" disabled>
                                        </div>
                                        <?= $ResultadoUltimaEvaluacion; ?>
                                    </div>
                                    <div class="col-md-12 subir-archivos">
                                        <div class="form-group">
                                            <br>
                                            <label>HISTORÍA DE CAPACITACIONES REGISTRADAS CONCLUIDAS A LOS QUE HA ASISTIDO</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="dataTable_wrapper">
                                                        <br>
                                                        <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                            <thead>
                                                            <tr>
                                                                <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                <th>Nombre de la Capacitación</th>
                                                                <th>Fecha de Capacitación</th>
                                                                <th>Evaluación</th>
                                                                <th>Estatus</th>
                                                                <th>Asistencia</th>
                                                                <th>Calificación</th>
                                                            </tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?=  $TablaCapacitaciones; ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="form-group col-md-5">
                                                            <label>PROMEDIO GENERAL DE LAS EVALUACIONES: </label>
                                                            <?=  $Promedio; ?>
                                                        </div>
                                                        <?=  $Promedio_E; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-6">
                                            <label>EL COLABORADOR HA SUFRIDO ACCIDENTES: </label>
                                            <input type="text" class="form-control" value="<?php echo $accidentes_count ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>SE HAN REGISTRADO PARA EL COLABORADOR:</label>
                                            <input type="text" class="form-control" value="<?php echo $accidentes['cuantas']; ?> Accidentes"disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>INCAPACIDADES REGISTRADAS PARA EL COLABORADOR PROVENIENTES DE ACCIDENTES:</label>
                                            <input type="text" class="form-control" value="<?php echo $incapacidades_count; ?> "disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>EL COLABORADOR TRABAJA MEDIANTE UNA CULTURA DE SEGURIDAD: </label>
                                            <input type="text" class="form-control" value="<?php echo $trabaja_seguridad; ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 subir-archivos">
                                        <div class="form-group">
                                            <label>HISTORÍA DE ACCIDENTES</label>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="dataTable_wrapper">
                                                        <br>
                                                        <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                            <thead>
                                                            <tr>
                                                                <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                <th>Descripción</th>
                                                                <th>Fecha del Accidente</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?=  $tablaAccidentes; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div id="menu7" class="tab-pane fade">
                                <br>
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <div class="form-group col-md-12">
                                            <label>PUESTO DE ASCENDENCIA: </label>
                                            <input type="text" class="form-control" value="<?php echo $nombrePuesto['nombre']; ?>" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>ÚLTIMO PUESTO AL QUE ESTA O ESTUVO PROPUESTO:</label>
                                            <input type="text" class="form-control" value="<?php echo $AscensoUltimo['puesto']; ?>"disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>TIEMPO QUE DEBE O TIENE QUE ESPERAR PARA SER ASCENDIDO: </label>
                                            <input type="text" class="form-control" value="<?php echo $AscensoUltimo['dias'];?> DÍAS" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6 subir-archivos">
                                        <div class="form-group">
                                            <label>COMPETENCIAS QUE DEBE CUMPLIR PARA SER ASCENDIDO</label>
                                            <br>
                                            <br>
                                            <div class="col-md-9 col-sm-9  offset-md-5">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Competencias"><i class="fa fa-plus" aria-hidden="true"></i> Añadir Competencia al Colaborador</button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="dataTable_wrapper">
                                                        <br>
                                                        <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                            <thead>
                                                            <tr>
                                                                <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                <th>Competencia a cumplir</th>
                                                                <th>Acciones</th>
                                                            </tr>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?=  $tablaCompetencias; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="form-group">
                                                <label>HISTORICO DE ASCENSOS ADG</label>
                                                <br>
                                                <br>
                                                <div class="col-md-9 col-sm-9  offset-md-5">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Ascenso"><i class="fa fa-plus" aria-hidden="true"></i> Nuevo</button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="dataTable_wrapper">
                                                            <br>
                                                            <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                                                <thead>
                                                                <tr>
                                                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                                    <th>Puesto de Ascenso</th>
                                                                    <th>Fecha de Registro</th>
                                                                    <th>Fecha de Termino Evaluación</th>
                                                                    <th>Estatus</th>
                                                                    <th>Descripción</th>
                                                                    <th>Acciones</th>
                                                                </tr>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?=  $tablaAscenso; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="x-content"></div>
                </div>
        </div>
        <div class="clearfix"></div>

    </div>
</div>

    <div class="modal fade" id="Modal_Documentacion" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="fa fa-archive"></span> Carga de Archivos para Expediente</strong>
                                                                                    </span>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Usted esta cargando los archivos de:</label>
                                        <h2>
                                            <a>
                                                <p class="excerpt"><span class="bi bi-file-person" style="color:grey"></span> | <?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></p>
                                            </a>
                                        </h2>
                                        <br>

                                    </div>
                                    <div class="form-group">
                                        <label>Con Fecha de ALta:</label>
                                        <h2>
                                            <a>
                                                <p class="excerpt"><span class="bi bi-calendar-week" style="color:grey"></span> | <?php echo date('d-m-Y');; ?></p>
                                            </a>
                                        </h2>
                                        <br>

                                    </div>
                                    <br>

                                </div>
                                <div class="col-md-7 subir-archivos">

                                    <form enctype="multipart/form-data" id="form_colaboradores">

                                        <?= $id_colaborador; ?>

                                        <div class="form-group">
                                            <label for="title">Título *</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="CURP" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" onInput="validarInput()">
                                            <span id="availability1"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Descripción *</label>
                                            <input type="text" class="form-control" id="description" name="description" placeholder="Ej. CURP MARIBEL MARTINEZ ACTUALIZADA" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                            <span id="availability2"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Tipo de Archivo *</label>
                                            <select class="form-control" name="archivo" id="archivo">
                                                <option value="" disabled selected> Selecciona el tipo de documento que subiras</option>
                                                <?php echo $sArchivos; ?>
                                            </select>
                                            <span id="availability3"></span>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="file" accept="application/pdf" class="form-control" id="file" name="file">
                                        </div>
                                        <span id="availability4"></span>
                                        <br>
                                    </form>



                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-6">
                                                Espacio máximo
                                            </div>
                                            <div class="col-md-6">
                                                783.0 KB
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" name="btn_Validar" id="btn_Validar"
                                            class="btn btn-primary btn-block" onclick="onSubmitFormColaboradores()">Subir Archivo
                                            </button>
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
    <div class="modal fade" id="Modal_Datos_Ingreso" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="glyphicon glyphicon-edit"></span> EDITAR DATOS DE INGRESO: <br><?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></strong>
                            </div>
                            <div class="panel-body">
                                    <form enctype="multipart/form-data" id="form_ingreso_proyecto">

                                        <div class="form-group">
                                            <input type="hidden" class="form-control" id="id_ingreso_proyecto" name="id_ingreso_proyecto" value="<?php echo $ingreso_proyecto['id_ingreso']; ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="porcentaje">PORCENTAJE INICIAL DE APEGO AL PUESTO*</label>
                                            <input type="text" class="form-control" id="porcentaje" name="porcentaje" placeholder="100" style="text-transform:uppercase;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" onkeyup="javascript:this.value=this.value.toUpperCase();" onInput="validarInput()" value="<?php echo $ingreso_proyecto['porcentaje_apego']; ?>">
                                            <span id="availability_1"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="calificacion">CALIFICACIÓN OBTENIDA EN EL PROYECTO DE INGRESO*</label>
                                            <input type="text" class="form-control" id="calificacion" name="calificacion" placeholder="Ej. 100" style="text-transform:uppercase;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $ingreso_proyecto['calificacion_proyecto']; ?>">
                                            <span id="availability_2"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">NOMBRE DEL PROYECTO DE INGRESO*</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. ANÁLISIS FODA RIESGOS ADG" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $ingreso_proyecto['nombre_proyecto']; ?>">
                                            <span id="availability_3"></span>
                                        </div>
                                    </form>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" name="btn_Validar_Datos" id="btn_Validar_Datos"
                                                    class="btn btn-primary btn-block" onclick="onSubmitFormIngresoProyecto()">Registrar
                                            </button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_Incentivo_Trimestral" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="glyphicon glyphicon-edit"></span> EDITAR INCENTIVO TRIMESTRAL: <br><?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></strong>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" id="form_incentivo">

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_incentivo" name="id_incentivo" value="<?php echo $incentivo_trimestral['id_incentivo']; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="monto">MONTO DE SU INCENTIVO TRIMESTRAL*</label>
                                        <input type="text" class="form-control" id="monto" name="monto" placeholder="100" style="text-transform:uppercase;" onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" onkeyup="javascript:this.value=this.value.toUpperCase();" onInput="validarInput()" value="<?php echo $incentivo_trimestral['monto']; ?>">
                                        <span id="availability_incentivo"></span>
                                    </div>
                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Incentivo" id="btn_Incentivo"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormMontoIncentivoTrimestral()">Actualizar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_Datos_Personales" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="glyphicon glyphicon-edit"></span> EDITAR OTROS DATOS PERSONALES: <br><?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></strong>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" id="form_otros_datos_personales">

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_colaborador_datos_personales" name="id_colaborador_datos_personales" value="<?php echo $id_colaborador_ ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado_civil">Estado Civil</label>
                                        <select class="form-control" name="estado_civil" id="estado_civil">
                                            <option value="" disabled selected> Selecciona el Estado Civil</option>
                                            <?php echo $sOtros; ?>
                                        </select>
                                        <span id="availability_estado_civil"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="ultimo_grado">Último Grado de Estudios*</label>
                                        <select class="form-control" name="ultimo_grado" id="ultimo_grado">
                                            <option value="" disabled selected> Selecciona el Último Grado de Estudios</option>
                                            <?php echo $sUltimoGradoEstudios; ?>
                                        </select>
                                        <span id="availability_ultimo_grado"></span>
                                    </div>

                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Datos_Personales" id="btn_Datos_Personales"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormDatosPersonales()">Registrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_Domicilios" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="glyphicon glyphicon-edit"></span> AGREGAR DOMICILIO PARA EL COLABORADOR <br><?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></strong>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" id="form_domicilio">

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_colaborador_domicilio" name="id_colaborador_domicilio" value="<?php echo $id_colaborador_ ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="domicilio">Describa Detalladamente el Domicilio*</label>
                                        <textarea class="form-control" name="domicilio" id="domicilio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Cenicienta de Figaro, 40, 874, santa Ana Poniente, 51060, TLAHUAC, CDMX"></textarea>

                                        <span id="availability_domicilio"></span>
                                    </div>

                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Domicilio" id="btn_Domicilio"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormDomicilio()">Registrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_Ascenso" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="glyphicon glyphicon-edit"></span> REGISTRO DE ASCENSO PARA EL COLABORADOR <br><?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></strong>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" id="form_ascenso">

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_colaborador_ascenso" name="id_colaborador_ascenso" value="<?php echo $id_colaborador_ ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="ascenso">Puesto para el que esta Propuesto*</label>
                                        <select class="form-control" name="ascenso" id="ascenso" required>
                                            <option value="" disabled selected> Selecciona un Puesto</option>
                                            <?php echo $sCompetencia; ?>
                                        </select>
                                        <span id="availability_ascenso"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="fecha_1">Fecha de Propuesta*</label>
                                        <input type="date" class="form-control" id="fecha_1" name="fecha_1">
                                        <span id="availability_fecha1"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for=fecha_2">Fecha de Evaluación Termino*</label>
                                        <input type="date" class="form-control" id="fecha_2" name="fecha_2">
                                        <span id="availability_fecha2"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="detalle">Descripción del Motivo de Ascendencia:<span class="required">*</span></label>
                                        <textarea class="form-control" name="detalle" id="detalle" cols="40" rows="8" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" placeholder="Describa brevemente COMO SE GENERO ESTA PROPUESTA DE ASCENSO."></textarea>
                                        <span id="availability_detalle"></span>
                                    </div>


                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Ascenso" id="btn_Ascenso"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormAscenso()">Registrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_Competencias" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="glyphicon glyphicon-edit"></span> AGREGAR COMPETENCIA PARA EL COLABORADOR <br><?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></strong>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" id="form_competencias">

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_colaborador_competencia" name="id_colaborador_competencia" value="<?php echo $id_colaborador_ ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="competencia_c">Competencia a Asignar*</label>
                                        <select class="form-control" name="competencia_c" id="competencia_c" required>
                                            <option value="" disabled selected> Selecciona la Ocupación</option>
                                            <?php echo $sCompetencia; ?>
                                        </select>
                                        <span id="availability_competencia"></span>
                                    </div>

                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Competencia" id="btn_Competencia"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormCompetencia()">Registrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_Hijos" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="glyphicon glyphicon-edit"></span> REGISTRAR HIJOS PARA EL COLABORADOR <br><?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></strong>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" id="form_hijos_registro">

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_colaborador_hijos" name="id_colaborador_hijos" value="<?php echo $id_colaborador_ ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="ocupacion">Ocupación*</label>
                                        <select class="form-control" name="ocupacion" id="ocupacion">
                                            <option value="" disabled selected> Selecciona la Ocupación</option>
                                            <?php echo $sOcupacion; ?>
                                        </select>
                                        <span id="availability_ocupacion"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="nacimiento_fecha">Fecha de Nacimiento*</label>
                                        <input type="date" class="form-control" id="nacimiento_fecha" name="nacimiento_fecha">
                                        <span id="availability_nacimiento"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="genero">Genero*</label>
                                        <select class="form-control" name="genero" id="genero">
                                            <option value="" disabled selected> Selecciona un Genero</option>
                                            <?php echo $sGeneros; ?>
                                        </select>
                                        <span id="availability_genero"></span>
                                    </div>

                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Estudios" id="btn_Hijos"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormHijos()">Registrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Modal_Estudios" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="form-group row" align="center">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading text-center">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <span><strong><span class="glyphicon glyphicon-edit"></span> REGISTRAR ESTUDIOS EXTRA PARA EL COLABORADOR  <br><?php echo $colaborador['nombre'] . " " . $colaborador['apellido_paterno'] . " " . $colaborador['apellido_materno']; ?></strong>
                            </div>
                            <div class="panel-body">
                                <form enctype="multipart/form-data" id="form_estudios_">

                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_cola" name="id_cola" value="<?php echo $id_colaborador_ ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="estudios">Descripción*</label>
                                        <input type="text" class="form-control" id="estudios" name="estudios" placeholder="Ej. CURSO DE DISEÑO WEB" style="text-transform:uppercase;"  onkeyup="javascript:this.value=this.value.toUpperCase();" onInput="validarInput()">
                                        <span id="availability_estudios_"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="doc_obtenido">Documento Obtenido*</label>
                                        <select class="form-control" name="doc_obtenido" id="doc_obtenido">
                                            <option value="" disabled selected> Selecciona el Documento Obtenido</option>
                                            <?php echo $sDocu; ?>
                                        </select>
                                        <span id="availability_doc_obtenido"></span>
                                    </div>

                                </form>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" name="btn_Estudios_" id="btn_Estudios_"
                                                class="btn btn-primary btn-block" onclick="onSubmitFormEstudios()">Registrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Documento</h4></center>
                </div>
                <div class="modal-body" align="center">
                    <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script>

        function onSubmitFormColaboradores() {
            var frm = document.getElementById('form_colaboradores');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#availability1').html('');
            $('#availability2').html('');
            $('#availability3').html('');
            $('#availability4').html('');
            if(!document.getElementById("title").value.length)
            {
                console.log("debes llenar el titulo");
                $('#availability1').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Título</span>');

            }
            else {
                if(!document.getElementById("description").value.length)
                {
                    console.log("debes llenar la descripcion");
                    $('#availability2').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Descripción</span>');

                }
                else
                {
                    if(!document.getElementById("archivo").value.length)
                    {
                        console.log("debes elegir el tipo de archivo");
                        $('#availability3').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Elige una opción de la lista despegable Tipo de Archivo</span>');

                    }
                    else
                    {
                        if(!document.getElementById("file").value.length)
                        {
                            console.log("debes subir un archivo");
                            $('#availability4').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes subir un Archivo .PDF</span>');

                        }
                        else
                        {
                            $('#btn_Validar').attr("disabled", true);
                            console.log("ya entre");
                            xhttp.onreadystatechange = function () {
                                if (this.readyState == 4) {
                                    var msg = xhttp.responseText;
                                    if (msg == 'success') {
                                        //alert(msg);

                                        alertify
                                            .alert("Subido con Éxito", function(){
                                            });
                                        if($('#Modal_Documentacion').modal('hide'))
                                        {
                                            location.reload()
                                        }

                                    } else {
                                        alert(msg);
                                    }
                                }
                            };
                            xhttp.open("POST", "/Colaboradores/DocumentoAdd", true);
                            xhttp.send(data);
                            $('#form_colaboradores').trigger('reset');
                        }
                    }
                }
            }
        }
        function onSubmitFormCompetencia() {
            var frm = document.getElementById('form_competencias');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#availability_competencia').html('');

            if(!document.getElementById("competencia_c").value.length)
            {
                $('#availability_competencia').html('<span class="text-danger glyphicon glyphicon-remove"></span><span>Selecciona Una opción</span>');

            }
            else
            {
                            $('#btn_Competencia').attr("disabled", true);
                            console.log("ya entre");
                            xhttp.onreadystatechange = function () {
                                if (this.readyState == 4) {
                                    var msg = xhttp.responseText;
                                    if (msg == 'success') {
                                        //alert(msg);

                                        alertify
                                            .alert("Subido con Éxito", function(){
                                            });
                                        if($('#Modal_Competencias').modal('hide'))
                                        {
                                            location.reload()
                                        }

                                    } else {
                                        alert(msg);
                                    }
                                }
                            };
                            xhttp.open("POST", "/Colaboradores/CompetenciasAdd", true);
                            xhttp.send(data);

            }
        }
        function onSubmitFormAscenso() {
            var frm = document.getElementById('form_ascenso');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#availability_ascenso').html('');

            if(!document.getElementById("ascenso").value.length)
            {
                $('#availability_ascenso').html('<span class="text-danger glyphicon glyphicon-remove"></span><span>Selecciona Una Opción</span>');
            }
            else
            {
                if(!document.getElementById("fecha_1").value.length)
                {
                    $('#availability_fecha1').html('<span class="text-danger glyphicon glyphicon-remove"></span><span>Selecciona Una Fecha</span>');
                }
                else
                {
                    if(!document.getElementById("fecha_2").value.length)
                    {
                        $('#availability_fecha2').html('<span class="text-danger glyphicon glyphicon-remove"></span><span>Selecciona Una Fecha</span>');
                    }
                    else {
                        if(!document.getElementById("detalle").value.length)
                        {
                            $('#availability_detalle').html('<span class="text-danger glyphicon glyphicon-remove"></span><span>Escribe Brevemente una descripción del motivo de Ascendencia</span>');
                        }
                        else {
                            $('#btn_Ascenso').attr("disabled", true);
                            console.log("ya entre");
                            xhttp.onreadystatechange = function () {
                                if (this.readyState == 4) {
                                    var msg = xhttp.responseText;
                                    if (msg == 'success') {
                                        //alert(msg);

                                        alertify
                                            .alert("Subido con Éxito", function () {
                                            });
                                        if ($('#Modal_Ascenso').modal('hide')) {
                                            location.reload()
                                        }

                                    } else {
                                        alert(msg);
                                    }
                                }
                            };
                            xhttp.open("POST", "/Colaboradores/AscensoAdd", true);
                            xhttp.send(data);
                        }
                    }
                }

            }
        }
        function onSubmitFormIngresoProyecto() {
            var frm = document.getElementById('form_ingreso_proyecto');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#availability_1').html('');
            $('#availability_2').html('');
            $('#availability_3').html('');
            if(!document.getElementById("porcentaje").value.length)
            {
                console.log("debes llenar el porcentaje");
                $('#availability_1').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Porcentaje Inicial</span>');
            }
            else {
                if(!document.getElementById("calificacion").value.length)
                {
                    console.log("debes llenar la calificacion");
                    $('#availability_2').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Calificación</span>');

                }
                else
                {
                    if(!document.getElementById("nombre").value.length)
                    {
                        console.log("debes llenar nombre");
                        $('#availability_3').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Nombre</span>');
                    }
                    else
                    {
                            $('#btn_Validar_datos').attr("disabled", true);
                            console.log("ya entre");
                            xhttp.onreadystatechange = function () {
                                if (this.readyState == 4) {
                                    var msg = xhttp.responseText;
                                    if (msg == 'success') {
                                        alert(msg);
                                        var nombre = document.getElementById("nombre").value;
                                        var calificacion = document.getElementById("calificacion").value;
                                        var porcentaje = document.getElementById("porcentaje").value;
                                        $('#Modal_Datos_Ingreso').modal('hide')
                                        $('#nombre_proyecto').val(nombre);
                                        $('#calificacion_proyecto').val(calificacion);
                                        $('#porcentaje_proyecto').val(porcentaje);
                                    } else {
                                        alert(msg);
                                    }
                                }
                            };
                            xhttp.open("POST", "/Colaboradores/DatosPersonalesEdit", true);
                            xhttp.send(data);
                            //$('#form_ingreso_proyecto').trigger('reset');

                    }
                }
            }
        }
        function onSubmitFormMontoIncentivoTrimestral() {
            var frm = document.getElementById('form_incentivo');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            if(!document.getElementById("monto").value.length)
            {
                $('#availability_incentivo').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Incentivo</span>');
            }
            else
            {
                 $('#btn_Incentivo').attr("disabled", true);
                 console.log("ya entre");
                 xhttp.onreadystatechange = function () {
                            if (this.readyState == 4) {
                                var msg = xhttp.responseText;
                                if (msg == 'success') {
                                    alert(msg);
                                    var monto = document.getElementById("monto").value;
                                    $('#Modal_Incentivo_Trimestral').modal('hide')
                                    $('#monto_trimestral').val(monto);
                                } else {
                                    alert(msg);
                                }
                            }
                        };
                 xhttp.open("POST", "/Colaboradores/IncentivoEdit", true);
                 xhttp.send(data);
                //$('#form_ingreso_proyecto').trigger('reset');

            }
        }
        function onSubmitFormHijos() {
            var frm = document.getElementById('form_hijos_registro');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#availability_ocupacion').html('');
            $('#availability_nacimiento').html('');
            $('#availability_genero').html('');
            
            if(!document.getElementById("ocupacion").value.length)
            {
                $('#availability_ocupacion').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Selecciona una opción</span>');
            }
            else
            {
                if(!document.getElementById("nacimiento_fecha").value.length)
                {
                    $('#availability_nacimiento').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Selecciona una Fecha Valida</span>');
                }
                else
                {
                        if(!document.getElementById("genero").value.length)
                        {
                            $('#availability_genero').html('<span class="text-danger glyphicon glyphicon-remove"></span><span>Selecciona Una opción</span>');

                        }
                        else
                        {
                            $('#btn_Hijos').attr("disabled", true);
                            console.log("ya entre");
                            xhttp.onreadystatechange = function () {
                                if (this.readyState == 4) {
                                    var msg = xhttp.responseText;
                                    if (msg == 'success') {
                                        alertify
                                            .alert("Subido con Éxito", function(){
                                            });
                                        if($('#Modal_Hijos').modal('hide'))
                                        {
                                            location.reload()
                                        }
                                    } else {
                                        alert(msg);
                                    }
                                }
                            };
                            xhttp.open("POST", "/Colaboradores/HijosAdd", true);
                            xhttp.send(data);
                            //$('#form_ingreso_proyecto').trigger('reset');
                        }
                }
            }
        }
        function onSubmitFormEstudios() {
            var frm = document.getElementById('form_estudios_');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#availability_estudios_').html('');
            $('#availability_doc_obtenido').html('');

            if(!document.getElementById("estudios").value.length)
            {
                $('#availability_estudios_').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Descripción</span>');
            }
            else
            {
                if(!document.getElementById("doc_obtenido").value.length)
                {
                    $('#availability_doc_obtenido').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Selecciona una opción</span>');
                }
                else
                {
                    $('#btn_Estudios_').attr("disabled", true);
                    console.log("ya entre");
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4) {
                            var msg = xhttp.responseText;
                            if (msg == 'success') {
                                alertify
                                    .alert("Subido con Éxito", function(){
                                    });
                                if($('#Modal_Estudios').modal('hide'))
                                {
                                    location.reload()
                                }
                            } else {
                                alert(msg);
                            }
                        }
                    };
                    xhttp.open("POST", "/Colaboradores/EstudiosAdd", true);
                    xhttp.send(data);
                    //$('#form_ingreso_proyecto').trigger('reset');
                }

            }
        }
        function onSubmitFormDomicilio() {
            var frm = document.getElementById('form_domicilio');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#availability_domicilio').html('');

            if(!document.getElementById("domicilio").value.length)
            {
                $('#availability_estudios_').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Debes llenar el campo Descripción</span>');
            }
            else
            {
                    $('#btn_Domicilio').attr("disabled", true);
                    console.log("ya entre");
                    xhttp.onreadystatechange = function () {
                        if (this.readyState == 4) {
                            var msg = xhttp.responseText;
                            if (msg == 'success') {
                                alertify
                                    .alert("Subido con Éxito", function(){
                                    });
                                if($('#Modal_Domicilios').modal('hide'))
                                {
                                    location.reload()
                                }
                            } else {
                                alert(msg);
                            }
                        }
                    };
                    xhttp.open("POST", "/Colaboradores/DomicilioAdd", true);
                    xhttp.send(data);
                    //$('#form_ingreso_proyecto').trigger('reset');


            }
        }
        function onSubmitFormDatosPersonales() {
            var frm = document.getElementById('form_otros_datos_personales');
            var data = new FormData(frm);
            var xhttp = new XMLHttpRequest();

            $('#availability_estado_civil').html('');
            $('#availability_ultimo_grado').html('');

            if(!document.getElementById("estado_civil").value.length)
            {
                $('#availability_estado_civil').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Selecciona una opción</span>');
            }
            else
            {
                if(!document.getElementById("ultimo_grado").value.length)
                {
                    $('#availability_ultimo_grado').html('<span class="text-danger glyphicon glyphicon-remove"></span><span> Selecciona una opción</span>');
                }
                else
                {

                    var combo = document.getElementById("estado_civil");
                    var estado_civil_ = combo.options[combo.selectedIndex].text;

                    var combo = document.getElementById("ultimo_grado");
                    var ultimo_grado_ = combo.options[combo.selectedIndex].text;


                        $('#btn_Datos_Personales').attr("disabled", true);
                        console.log("ya entre");
                        xhttp.onreadystatechange = function () {
                            if (this.readyState == 4) {
                                var msg = xhttp.responseText;
                                if (msg == 'success') {
                                    alertify
                                        .alert("Subido con Éxito", function(){
                                        });
                                    if($('#Modal_Datos_Personales').modal('hide'))
                                    {
                                        $('#id_estado_civil').val(estado_civil_);
                                        $('#id_ultimo_grado').val(ultimo_grado_);
                                        $('#btn_Datos_Personales').attr("disabled", false);
                                    }
                                } else {
                                    alert(msg);
                                }
                            }
                        };
                        xhttp.open("POST", "/Colaboradores/OtrosDatosPersonalesEdit", true);
                        xhttp.send(data);
                        //$('#form_ingreso_proyecto').trigger('reset');

                }
            }
        }
        function gt_1 (a){

            alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response) {
                var result = false;
                $.ajax({
                    type: "POST",
                    async: false,
                    url: "/Colaboradores/delete", // script to validate in server side
                    data: {a: a},
                    success: function (data) {
                        console.log("success::: " + data);
                        result = (data == "true") ? false : true;

                        if (result == true) {
                            alert("si");

                        } else {
                            location.reload();
                            alertify.success("Se ha eliminado correctamente");
                        }
                    }
                });
                // return true if username is exist in database
                return result;
            });
        }

        function eliminar_estudios(a){

            alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response) {
                if(response) {
                    var result = false;
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: "/Colaboradores/Delete_Estudios", // script to validate in server side
                        data: {a: a},
                        success: function (data) {
                            console.log("success::: " + data);
                            result = (data == "true") ? false : true;

                            if (result == true) {
                                alert("si");

                            } else {
                                location.reload();
                                alertify.success("Se ha eliminado correctamente");
                            }
                        }
                    });
                    // return true if username is exist in database
                    return result;
                }
            });
        }

        function eliminar_hijos(a){

            alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response) {
                if(response) {
                    var result = false;
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: "/Colaboradores/Delete_Hijos", // script to validate in server side
                        data: {a: a},
                        success: function (data) {
                            console.log("success::: " + data);
                            result = (data == "true") ? false : true;

                            if (result == true) {
                                alert("si");

                            } else {
                                location.reload();
                                alertify.success("Se ha eliminado correctamente");
                            }
                        }
                    });
                    // return true if username is exist in database
                    return result;
                }
            });
        }

        function eliminar_competencias(a){

            alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response) {
                if(response) {
                    var result = false;
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: "/Colaboradores/Delete_Competencia", // script to validate in server side
                        data: {a: a},
                        success: function (data) {
                            console.log("success::: " + data);
                            result = (data == "true") ? false : true;

                            if (result == true) {
                                alert("si");

                            } else {
                                location.reload();
                                alertify.success("Se ha eliminado correctamente");
                            }
                        }
                    });
                    // return true if username is exist in database
                    return result;
                }
            });
        }

        function eliminar_domicilio(a){

            alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response) {
                if(response) {
                    var result = false;
                    $.ajax({
                        type: "POST",
                        async: false,
                        url: "/Colaboradores/Delete_Domicilio", // script to validate in server side
                        data: {a: a},
                        success: function (data) {
                            console.log("success::: " + data);
                            result = (data == "true") ? false : true;

                            if (result == true) {
                                alert("si");

                            } else {
                                location.reload();
                                alertify.success("Se ha eliminado correctamente");
                            }
                        }
                    });
                    // return true if username is exist in database
                    return result;
                }
            });
        }

    </script>

    <?php echo $footer;?>
