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
                                                                                             aria-hidden="true"></i> Cuestionario de Salida </strong>
                                                                                    </span>
                                                                                                    </div>
                                                                                                    <div class="panel-body">
                                                                                                        <div class="x_content">
                                                                                                            <h7>AVISO DE PRIVACIDAD
                                                                                                                ALIMENTOS DE LA GRANJA con domicilio en
                                                                                                                Camino Real a Xochimilco No. 63, Tepepan,
                                                                                                                Deleg. Xochimilco, C??digo Postal 16020,
                                                                                                                M??xico, Distrito Federal, hace de su
                                                                                                                conocimiento que los datos que le sean
                                                                                                                recabados para incluir su proceso de
                                                                                                                selecci??n ser??n tratados conforme a los
                                                                                                                principios y lineamientos de la Ley Federal
                                                                                                                de Protecci??n de Datos Personales en
                                                                                                                Posesi??n de los Particulares. Para dichos
                                                                                                                efectos, Usted reconoce haber sido informado
                                                                                                                y como consecuencia de ello acepta en forma
                                                                                                                expresa el tratamiento de los datos
                                                                                                                personales que se le han recabado o que se
                                                                                                                le recabar??n con la finalidad de que
                                                                                                                ALIMENTOS DE LA GRANJA se encuentre en
                                                                                                                posibilidades de analizar su perfil, su
                                                                                                                experiencia y su capacidad para una eventual
                                                                                                                contrataci??n.
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
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>1.- ??Has trabajado anteriormente en ADG?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="uno" name="uno" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="uno" name="uno" value="NO" /> No<br />
                                                                                                                        </div>
                                                                                                                        <span id="availabilityuno"></span>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>2.- ??Tienes amigos o familiares trabajando o que han trabajado en ADG?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="dos" name="dos" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="dos" name="dos" value="NO" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <span id="availabilitydos"></span>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>3.- Actualmente, ??trabajas formalmente en otra empresa?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="tres" name="tres" value=SI required/> S??<br />
                                                                                                                            <input type="radio" id="tres" name="tres" value="NO" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <span id="availabilitytres"></span>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>4.- ??Tienes un cr??dito Infonavit vigente?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="cuatro" name="cuatro" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="cuatro" name="cuatro" value="SI" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <span id="availabilitycuatro"></span>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>5.- ??Tienes un cr??dito Fonacot vigente?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="cinco" name="cinco" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="cinco" name="cinco" value="SI" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <span id="availabilitycinco"></span>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>6.- ??Eres al??rgico al huevo o alg??n alimento?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="seis" name="seis" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="seis" name="seis" value="SI" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <span id="availabilityseis"></span>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>7.- ??Padeces alguna enfermedad cr??nica o degenerativa?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="siete" name="siete" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="siete" name="siete" value="SI" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>8.- ??Tienes alg??n impedimento para realizar trabajo pesado?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="ocho" name="ocho" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="ocho" name="ocho" value="SI" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                    </div>
                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>9.- ??Eres al??rgico a alg??n medicamento?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="nueve" name="nueve" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="nueve" name="nueve" value="NO" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                    </div>

                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>10.- ??Te han realizado alguna cirug??a? </b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="diez" name="diez" value="SI" required/> S??<br />
                                                                                                                            <input type="radio" id="diez" name="diez" value="NO" required/> No<br />
                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                    </div>

                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>11.- ??Cu??l es tu tipo de sangre?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <input type="radio" id="once" name="once" value="A positivo (A +)" required/> A positivo (A +)<br />
                                                                                                                            <input type="radio" id="once" name="once" value="A negativo (A-)" required/> A negativo (A-)<br />
                                                                                                                            <input type="radio" id="once" name="once" value="B positivo (B +)" required/> B positivo (B +)<br />
                                                                                                                            <input type="radio" id="once" name="once" value="B negativo (B-)" required/> B negativo (B-)<br />
                                                                                                                            <input type="radio" id="once" name="once" value="O positivo (O+)" required/> O positivo (O+)<br />
                                                                                                                            <input type="radio" id="once" name="once" value="O negativo (O-)" required/> O negativo (O-)<br />

                                                                                                                        </div>
                                                                                                                        <br>
                                                                                                                    </div>

                                                                                                                    <div class="form-group">
                                                                                                                        <label><h2><b>12.- ??Cu??l es el n??mero al que podemos marcar y el nombre de la persona en caso de que tengas alg??n accidente?</b></h2></label>
                                                                                                                        <div class="respuestas">
                                                                                                                            <div class="form-group col-md-6">
                                                                                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="nombre">Nombre contacto: <span class="required">*</span></label>
                                                                                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                                                                                    <input type="text" name="nombre" id="nombre" class="form-control col-md-7 col-xs-12" placeholder="Ej. MARCELA PILAR VALDEZ" required>
                                                                                                                                </div>
                                                                                                                                <span id="availability"></span>
                                                                                                                            </div>
                                                                                                                            <div class="form-group col-md-6">
                                                                                                                                <label class="control-label col-md-4 col-sm-3 col-xs-12" for="numero">N??mero: <span class="required">*</span></label>
                                                                                                                                <div class="col-md-8 col-sm-6 col-xs-12">
                                                                                                                                    <input type="number" maxlength="10" name="numero" id="numero" class="form-control col-md-7 col-xs-12" placeholder="55 55 55 5555" required>
                                                                                                                                </div>
                                                                                                                                <span id="availability"></span>
                                                                                                                            </div>

                                                                                                                        </div>
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
