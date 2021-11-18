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
                                    <form class="form-label-left input_mask" id="add" action="/Colaboradores/DocumentoAdd" method="POST">
                                        <div class="form-group row" align="center">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading text-center">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                            </button>
                                                            <span><strong><span class="glyphicon glyphicon-hdd"></span> Carga de Archivos para Expediente</strong>
                                                                                    </span>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="col-md-5">
                                                                <div class="form-group">
                                                                    <label>Usted esta cargando los archivos de:</label>
                                                                    <?= $colaborador; ?>
                                                                    <?= $id_colab; ?>
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

                                                                    <div class="form-group">
                                                                        <label for="title">Título</label>
                                                                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="CURP">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="description">Descripción</label>
                                                                        <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ej. CURP MARIBEL MARTINEZ ACTUALIZADA">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="description">Tipo de Archivo</label>
                                                                        <select class="form-control" name="archivo" id="archivo">
                                                                            <option value="" disabled selected> Selecciona que Documentos se dará de alta</option>
                                                                            <?php echo $idLugar; ?>
                                                                        </select>
                                                                    </div>
                                                                    <br>
                                                                    <div class="form-group">
                                                                        <input type="file" accept="application/pdf" class="form-control" id="file" name="file">
                                                                    </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="col-md-6">
                                                                            Espacio máximo
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            783.0 KB
                                                                        </div>
                                                                        <br>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-2 col-xs-offset-3">
                                                                            <br>
                                                                            <button class="btn btn-danger col-md-5 col-sm-5 col-xs-5" type="button" id="btnCancel">Cancelar</button>
                                                                            <button class="btn btn-success col-md-5 col-sm-5 col-xs-5" id="btnAdd" type="submit">Subir Archivo</button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>


<?php echo $footer;?>
