<?php echo $header;?>

<div class="right_col">
    <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col align-self-center">
            <div class="col align-self-center">
                <div class="center-block">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="x_content">
                                    <div class="form-group row">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading text-center">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <span><strong><span class="glyphicon glyphicon-hdd"></span> Informe de Registro Accidente ADG</strong>
                                                                                    </span>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="x_content">
                                                            <div class="dashboard-widget-content">
                                                                <ul class="list-unstyled timeline widget">
                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Nombre</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['nombre']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Fecha del accidente</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['fecha_accidente']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Trimestre del accidente</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['trimestre']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Lugar del accidente</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['accidente']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Clasificacion del accidente</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['clasificacion_accidente']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Detalle del accidente</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['detalle_accidente']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Causa del accidente</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['causa']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Acto inseguro</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['acto_inseguro']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>

                                                                    <li>
                                                                        <div class="block">
                                                                            <div class="block_content">
                                                                                <h2 class="title">
                                                                                    <a>Condición insegura</a>
                                                                                </h2>
                                                                                <div class="byline"></div>
                                                                                <p class="excerpt"><?php echo $accidente['condicion_insegura']; ?></p>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>

                                                                <div class="form-group">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <a class="btn btn-success col-md-2 col-sm-2 col-xs-2" type="submit" id="btnCancel">
                                                                            <span class="glyphicon glyphicon-chevron-left pull-left"></span> Regresar
                                                                        </a>
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

            </div>
        </div>
    </div>

</div>


<?php echo $footer;?>
