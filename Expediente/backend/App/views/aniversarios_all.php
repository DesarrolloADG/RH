<?php
echo $header; ?>
<div class="right_col">
  <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
    <div class="panel panel-default">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">

                        <h2 style="color: #73879C; text-align: center;">Aniversarios ADG de Este Mes (<?php
                            $fechamovimiento =  date('Y-m-d H:i:s');
                            $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
                            $mes = substr($fechamovimiento, 5, -9);

                            if ($mes <= 12) {
                                echo $meses[$mes - 1];
                            }
                            else{
                                echo "Solo existen 12 meses hay un error en el formato de tu fecha: ".$fechamovimiento;
                            }
                            ?>)</h2>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="bi bi-building"></i> XOCHIMILCO</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                                    <th>Nombre</th>
                                                    <th>Ingreso en </th>
                                                    <th>A trabajado</th>
                                                    <th>Cumplira su</th>
                                                    <th align="center">¿Que día?</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php echo $tabla; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="bi bi-building"></i> VALLEJO</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-vallejo">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="checkAll" id="checkAllVallejo" value=""/></th>
                                                    <th>Nombre</th>
                                                    <th>Ingreso en </th>
                                                    <th>A trabajado</th>
                                                    <th>Cumplira su</th>
                                                    <th align="center">¿Que día?</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php echo $tablaVallejo; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="bi bi-building"></i> PAM LÍQUIDOS</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-liquidos">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="checkAll" id="checkAllLiquidos" value=""/></th>
                                                    <th>Nombre</th>
                                                    <th>Ingreso en </th>
                                                    <th>A trabajado</th>
                                                    <th>Cumplira su</th>
                                                    <th align="center">¿Que día?</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php echo $tablaLiquidos; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="bi bi-building"></i> PAM DESHIDRATADOS</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-deshidratados">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="checkAllDeshidratados" id="checkAll" value=""/></th>
                                                    <th>Nombre</th>
                                                    <th>Ingreso en </th>
                                                    <th>A trabajado</th>
                                                    <th>Cumplira su</th>
                                                    <th align="center">¿Que día?</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php echo $tablaDeshidratados; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2><i class="bi bi-building"></i> ADMINISTRATIVOS</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>
                                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">
                                        <div class="dataTable_wrapper">
                                            <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-produccion">
                                                <thead>
                                                <tr>
                                                    <th><input type="checkbox" name="checkAll" id="checkAllProduccion" value=""/></th>
                                                    <th>Nombre</th>
                                                    <th>Ingreso en </th>
                                                    <th>A trabajado</th>
                                                    <th>Cumplira su</th>
                                                    <th align="center">¿Que día?</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php echo $tablaProduccion; ?>
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
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <h2 style="color: #73879C; text-align: center;">Aniversarios ADG por Mes</h2>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Enero</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-enero">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllEnero" id="checkAllEnero" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaEnero; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Febrero</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-febrero">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllFebrero" id="checkAllFebrero" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaFebrero; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Marzo</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-marzo">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllMarzo" id="checkAllMarzo" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaMarzo; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Abril</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-abril">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllAbril" id="checkAllAbril" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaAbril; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Mayo</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-mayo">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllMayo" id="checkAllMayo" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaMayo; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Junio</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-junio">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllJunio" id="checkAllJunio" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaJunio; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Julio</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-julio">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllJulio" id="checkAllJulio" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaJulio; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Agosto</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-agosto">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllAgosto" id="checkAllAgosto" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaAgosto; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Septiembre</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-septiembre">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllSeptiembre" id="checkAllSeptiembre" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaSeptiembre; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Octubre</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-octubre">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllOctubre" id="checkAllOctubre" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaOctubre; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Noviembre</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-noviembre">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllNoviembre" id="checkAllNoviembre" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaNoviembre; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2><i class="fa fa-calendar"></i> Diciembre</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">
                                            <div class="row">
                                                <div class="dataTable_wrapper">
                                                    <table class="table table-striped table-bordered table-hover" id="muestra-aniversarios-diciembre">
                                                        <thead>
                                                        <tr>
                                                            <th><input type="checkbox" name="checkAllDiciembre" id="checkAllDiciembre" value=""/></th>
                                                            <th>Nombre</th>
                                                            <th>Ingreso en </th>
                                                            <th>A trabajado</th>
                                                            <th>Cumplira su</th>
                                                            <th align="center">¿Que día?</th>
                                                            <th align="center">Plantilla</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php echo $tablaDiciembre; ?>
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
</div>
<?php echo $footer; ?>
