<?php echo $header;?>
<div class="right_col">
    <div class="row">
        <div class="col-sm-1"> </div>
        <div class="col align-self-center">
            <div class="col align-self-center">
                <div class="center-block">
                                        <div class="clearfix"></div>
                                        <div>
                                            <div>

                                                <div class="x_content">
                                                    <div class="panel-body">
                                                        <div class="x_content">
                                                            <div class="row">
                                                                <div class="col-sm-2 col-sm-12 col-xs-12"></div>
                                                                <div class="col align-self-center">
                                                                    <div class="col align-self-center">
                                                                        <div class="center-block">
                                                                            <div class="col-md-8 col-sm-12 col-xs-12">
                                                                                <div class="x_content">
                                                                                    <div class="form-group row" align="center">
                                                                                        <div class="row">
                                                                                            <div class="">
                                                                                                <div class="panel panel-default">
                                                                                                    <div class="panel-heading text-center">
                                                                            <span><strong><i class="fa fa-check"
                                                                                             aria-hidden="true"></i> Cuestionario de Induci??n a Alimentos de la Granja </strong>
                                                                                    </span>
                                                                                                    </div>
                                                                                                    <div class="panel-body">
                                                                                                        <div class="x_content">
                                                                                                            <h7>OBJETIVO:
                                                                                                                El siguiente cuestionario, tiene como finalidad evaluar la efectividad del curso de induccion brindado acada nuevo miembro de Alimentos de la Granja SA de CV
                                                                                                            </h7>
                                                                                                            <br>
                                                                                                            <hr>
                                                                                                            <h7>Usted,
                                                                                                                declara que todos los datos porporcionados
                                                                                                                en la solicitud de empleo y a trav??s de los
                                                                                                                documentos personales son ver??dicos y
                                                                                                                leg??timos as?? como las respuestas dadas en
                                                                                                                la presente.
                                                                                                            </h7>
                                                                                                            <br>
                                                                                                            <hr>

                                                                                                            <form class="form-label-left input_mask" id="add" action="/Encuestas/IngresoAdd" method="POST">
                                                                                                                <div class="wp-block-column col-9">
                                                                                                                    <div class="form-group col-md-6">
                                                                                                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                                                                                                            <input type="hidden" name="id" id="id" class="form-control col-md-7 col-xs-12" value="<?php echo $encuesta ?>">
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <br>
                                                                                                                    <div class="form-group col-sm-12">
                                                                                                                        <div style="background-color:#F0F8FF">
                                                                                                                            <label><h5><b>1.- "Nuestro ??xito es hacer exitosos a nuestros clientes con nuestros ingredientes y servicios" Esta es:</b></h5></label>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="radio" id="uno" name="uno" value="SI" required/> a) Misi??n<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="radio" id="uno" name="uno" value="NO" /> b) Visi??n<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="radio" id="uno" name="uno" value="NO" /> c) Pol??tica del Sistema de Gesti??n Integrado<br />
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                        <span id="availabilityuno"></span>
                                                                                                                        <br>
                                                                                                                    </div>

                                                                                                                    <div class="form-group col-sm-12">
                                                                                                                        <div style="background-color:#F0F8FF">
                                                                                                                        <label><h5><b>2.- En Alimentos de la Granja: Buscamos la perfeccion en la elaboraci??n de productos de huevo, mediante la mejora
                                                                                                                                continua de procesos de Producci??n, Comercializaci??n e Inovaci??n y Desarrollo. Comprometi??ndonos con:
                                                                                                                                <br><br>
                                                                                                                                        <li>Calidad: Ofreciendo Productos y Servicios que satisfagan las necesidades de nuestros clientes.</li>
                                                                                                                                        <br>
                                                                                                                                        <li>Seguridad Laboral: Generando un entorno seguro y saludable para el personal.</li>
                                                                                                                                        <br>
                                                                                                                                        <li>Sustentabilidad: Siendo responsables con nuestros colaboradores,el medio ambiente y la sociedad.</li>

                                                                                                                                </b></h5></label>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="radio" id="dos" name="dos" value="SI" required/> a) Misi??n<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="radio" id="dos" name="dos" value="NO" /> b) Pol??tica del Sistema de Gesti??n Integrado<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="radio" id="dos" name="dos" value="NO" /> c) Pol??tica de Salud<br />
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                        <span id="availabilitydos"></span>
                                                                                                                        <br>
                                                                                                                    </div>

                                                                                                                    <div class="form-group col-sm-12">
                                                                                                                        <div style="background-color:#F0F8FF">
                                                                                                                            <label><h5><b>3.- Selecciona por lo menos 4 valores de Alimentos de la Granja:</b></h5></label>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> a) Servicio</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> b) Inovaci??n</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> c) Respeto</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> d) Conocimientos T??cnicos</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> e) Gesti??n Comercial.</label>
                                                                                                                            </div>

                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> f) Comunicaci??n Comercial.</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> g) Orientaci??n al logro del objetivo.</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-2">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> h) Armonia</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-2">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> i) Paz</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> j) Tranquilidad</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-2">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> k) Confianza</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="tres" value="tres"> <label for="tres"> l) Curiosidad</label>
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                        <span id="availabilitytres"></span>
                                                                                                                        <br>
                                                                                                                    </div>

                                                                                                                    <div class="form-group col-sm-12">
                                                                                                                        <div style="background-color:#F0F8FF">
                                                                                                                            <label><h5><b>4.- Las personas encargadas de supervisar producci??n, deben ocuparse y asegurarse de no permitir alg??n colaborador trabaje
                                                                                                                                    en ??reas de proceso de alimentos si: Saben o sospechan que sufren alguna enfermedad que pueda contaminar losproductos alimenticios
                                                                                                                                    , observan alguna alteraci??n o infecci??n de la piel o heridas abiertas . Cualquier persona que se vea afectada por alguno de los puntos anteriores
                                                                                                                                    debe reportarlo inmediatamente a su supervisor o a Recursos Humanos.</b></h5></label>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-5">
                                                                                                                                <input type="radio" id="uno" name="uno" value="SI" required/> a) Pol??tica del Sistema de Gesti??n Integrado<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="radio" id="uno" name="uno" value="NO" /> b) Pol??tica de Salud<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="radio" id="uno" name="uno" value="NO" /> c)Pol??tica de Riesgo<br />
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                        <span id="availabilitycuatro"></span>
                                                                                                                        <br>
                                                                                                                    </div>

                                                                                                                    <div class="form-group col-sm-12">
                                                                                                                        <div style="background-color:#F0F8FF">
                                                                                                                            <label><h5><b>5.- Son lineamientos de higiene que nos permiten garantizar la inocuidad del producto.</b></h5></label>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-5">
                                                                                                                                <input type="radio" id="cinco" name="cinco" value="SI" required/> a) Buenas pr??cticas de manofactura<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="radio" id="cinco" name="cinco" value="NO" /> b) Pol??tica de Limpieza<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="radio" id="cinco" name="cinco" value="NO" /> c) Pol??tica de Calidad<br />
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                        <span id="availabilitycinco"></span>
                                                                                                                        <br>
                                                                                                                    </div>

                                                                                                                    <div class="form-group col-sm-12">
                                                                                                                        <div style="background-color:#F0F8FF">
                                                                                                                            <label><h5><b>6.- Es importante contar con buenas practicas de manufactura por: </b></h5></label>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-5">
                                                                                                                                <input type="radio" id="seis" name="seis" value="SI" required/> a) Buenas pr??cticas de manofactura<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="radio" id="seis" name="seis" value="NO" /> b) Pol??tica de Limpieza<br />
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="radio" id="seis" name="seis" value="NO" /> c) Pol??tica de Calidad<br />
                                                                                                                            </div>

                                                                                                                        <siete
                                                                                                                        <span id="availabilityseis"></span>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <br>
                                                                                                                    <div class="form-group col-sm-12">
                                                                                                                        <div style="background-color:#F0F8FF">
                                                                                                                            <label><h5><b>7.- Selecciona por lo menos tres reglas que debemos de cumplir para poder ingresar a ??reas de proceso productivo: </b></h5></label>
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="siete" value="siete"> <label for="siete"> a) Uso de Cofia</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-3">
                                                                                                                                <input type="checkbox" id="siete" value="siete"> <label for="siete"> b) Gel Antibacterial</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-5">
                                                                                                                                <input type="checkbox" id="siete" value="siete"> <label for="siete"> c) Lavado de Botas al ingresar a Planta</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="checkbox" id="siete" value="siete"> <label for="siete"> d) Ingresar sin Maquillaje</label>
                                                                                                                            </div>
                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="checkbox" id="siete" value="siete"> <label for="siete"> e) Uso y desinfecci??n de Guantes</label>
                                                                                                                            </div>

                                                                                                                            <div class="col-sm-4">
                                                                                                                                <input type="checkbox" id="siete" value="siete"> <label for="siete"> f) Uso de Casco de Seguridad</label>
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                        <span id="availabilitysiete"></span>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <br>
                                                                                                                    <br>
                                                                                                                    <br>
                                                                                                                    <br>
                                                                                                                    <div class="form-group">
                                                                                                                        <button type="submit" name="btnAdd" id="btnAdd"
                                                                                                                                class="btn btn-primary btn-block">Terminar Cuestionario
                                                                                                                        </button>
                                                                                                                        <br>
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
                                            </div>
                                        </div>


                    </div>

                </div>
            </div>
        </div>

    </div>


<?php echo $footer;?>
