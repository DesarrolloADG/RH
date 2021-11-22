<?php echo $header; ?>
<div class="right_col">
    <div class="clearfix"></div>
    <div>
        <div class="x_panel">
            <div class="x_title">
                <h2>Catálogo de Gestión de Competencias <small>ADG - RH</small></h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <form name="all" id="all" action="/Competencias/delete" method="POST">
                    <div class="panel-body" <?php echo $visible; ?>>
                        <a href="/Competencias/add" type="button" class="btn btn-primary btn-circle" <?= $agregarHidden?>><i class="fa fa-plus"> <b>Nuevo</b></i></a>
                        <button id="delete" type="button" class="btn btn-danger btn-circle" <?= $eliminarHidden?>><i class="fa fa-remove"> <b>Eliminar</b></i></button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped jambo_table bulk_action" id="muestra-cupones">
                                    <thead>
                                    <tr>
                                        <th><input type="checkbox" name="checkAll" id="checkAll" value=""/></th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Etatus</th>
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
                </form>

            </div>
        </div>
    </div>

</div>
<?php echo $footer; ?>
