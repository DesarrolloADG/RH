<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Baja AS BajaDao;
use \App\models\General AS GeneralDao;

class Baja extends Controller{

  private $_contenedor;

  function __construct(){
    parent::__construct();
    $this->_contenedor = new Contenedor;
    View::set('header',$this->_contenedor->header());
    View::set('footer',$this->_contenedor->footer());
  }

    public function index() {
        $extraFooter =<<<html
      <script>
    
        $(document).ready(function(){
            $("#muestra-cupones").tablesorter();
          var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-cupones input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });

            $("#export_pdf").click(function(){
              $('#all').attr('action', '/Economicos/generarPDF/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

            $("#export_excel").click(function(){
              $('#all').attr('action', '/Economicos/generarExcel/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

        });
        
           $(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		console.log('El código es: ' + id );
		var url = "/bajas/" + id;
		$('#edit').modal('show');
        $('#iframePDF').attr('src', url);
	});
});
           
                   $(document).ready(function(){
	$(document).on('click', '.upload', function(){
		var id=$(this).val();
		console.log('docuemento : ' + id );
		$('#Modal_Documentacion').modal('show');
        $('#id_colaborador').val(id);
	});
});
      </script>
html;
        $usuario = $this->__usuario;
        $baja = BajaDao::getAll();
        $baja_semanal = BajaDao::getAllSemanal();
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        $tabla_semanal= '';
        foreach ($baja as $key => $value) {
            $check = $value['lista'];
            $check_tabla = "";
            $cuestionario_salida = $value['cuestionario_salida'];
            $cuestionario_tabla = "";

            if($value['pago'] == 'Quincenal')
            {
                if($check == 0)
                {
                    $check_tabla.=<<<html
               <button type="button" class="btn btn-primary upload" value="{$value['id_baja']}"><i class="glyphicon glyphicon-cloud-upload" style="color:white" aria-hidden="true"></i> Subir</button>
                <span class="bi bi-x-circle-fill fa-2x" style="color:#F73F35;"></span>
html;
                }

                if($check == 1)
                {
                    $check_tabla .=<<<html
               <button type="button" class="btn btn-success edit" value="{$value['url']}"><span class="fa fa-eye" style="color:white"></span> Ver</button>
               <span class="bi bi-check-circle-fill fa-2x" style="color:#7DE300;"></span>
html;
                }
            }
            else
            {
                $check_tabla .=<<<html
           * NO APLICA <span class="bi bi-check-circle-fill fa-2x" style="color:#7DE300;"></span>
html;
            }

            if($cuestionario_salida == 0)
            {
            $cuestionario_tabla .=<<<html
            * Sin Responder <span class="bi bi-x-circle-fill fa-2x" style="color:#F73F35;"></span>
html;
            }

            if($cuestionario_salida == 1)
            {
                $cuestionario_tabla .=<<<html
               
                        <a href="/Accidentes/Edit/{$value['id_accidente']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="glyphicon glyphicon-print" style="color:white"></span> </a>
                        <a href="/Accidentes/Show/{$value['id_accidente']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
                        <span class="bi bi-check-circle-fill fa-2x" style="color:#7DE300;"></span>
               
html;
            }
            $Tipo = $value['pago'];
            $Tipo_Empleado = "";
            if($Tipo == 'Quincenal')
            {
                $Tipo_Empleado = 'ADMINISTRATIVO';
            }
            else
            {
                $Tipo_Empleado = 'PRODUCCIÓN';
            }

            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_baja']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>$Tipo_Empleado</td>
                    <td><span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['fecha_inicio']}</td>
                    <td><span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['fecha_termino']}</td>
                    <td>$cuestionario_tabla</td>
                    <td>$check_tabla</td>
                  
                </tr>
html;
        }

        foreach ($baja_semanal as $key => $value) {
            $check = $value['lista'];
            $check_tabla = "";
            $cuestionario_salida = $value['cuestionario_salida'];
            $cuestionario_tabla = "";

            if($value['pago'] == 'Quincenal')
            {
                if($check == 0)
                {
                    $check_tabla.=<<<html
               <button type="button" class="btn btn-primary upload" value="{$value['id_baja']}"><i class="glyphicon glyphicon-cloud-upload" style="color:white" aria-hidden="true"></i> Subir</button>
                <span class="bi bi-x-circle-fill fa-2x" style="color:#F73F35;"></span>
html;
                }

                if($check == 1)
                {
                    $check_tabla .=<<<html
               <button type="button" class="btn btn-success edit" value="{$value['url']}"><span class="fa fa-eye" style="color:white"></span> Ver</button>
               <span class="bi bi-check-circle-fill fa-2x" style="color:#7DE300;"></span>
html;
                }
            }
            else
            {
                $check_tabla .=<<<html
           * NO APLICA <span class="bi bi-check-circle-fill fa-2x" style="color:#7DE300;"></span>
html;
            }

            if($cuestionario_salida == 0)
            {
                $cuestionario_tabla .=<<<html
            * Sin Responder <span class="bi bi-x-circle-fill fa-2x" style="color:#F73F35;"></span>
html;
            }

            if($cuestionario_salida == 1)
            {
                $cuestionario_tabla .=<<<html
               
                        <a href="/Accidentes/Edit/{$value['id_accidente']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="glyphicon glyphicon-print" style="color:white"></span> </a>
                        <a href="/Accidentes/Show/{$value['id_accidente']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
                        <span class="bi bi-check-circle-fill fa-2x" style="color:#7DE300;"></span>
               
html;
            }
            $Tipo = $value['pago'];
            $Tipo_Empleado = "";
            if($Tipo == 'Quincenal')
            {
                $Tipo_Empleado = 'ADMINISTRATIVO';
            }
            else
            {
                $Tipo_Empleado = 'PRODUCCIÓN';
            }

            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_baja']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>$Tipo_Empleado</td>
                    <td><span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['fecha_inicio']}</td>
                    <td><span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['fecha_termino']}</td>
                    <td>$cuestionario_tabla</td>
                    <td>$check_tabla</td>
                  
                </tr>
html;
        }

        $pdfHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 2)==1)?  "" : "style=\"display:none;\"";
        $excelHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 3)==1)? "" : "style=\"display:none;\"";
        $agregarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 4)==1)? "" : "style=\"display:none;\"";
        View::set('pdfHidden',$pdfHidden);
        View::set('excelHidden',$excelHidden);
        View::set('agregarHidden',$agregarHidden);
        View::set('editarHidden',$editarHidden);
        View::set('eliminarHidden',$eliminarHidden);
        View::set('tabla',$tabla);
        View::set('tabla_semanal',$tabla_semanal);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("baja_all");
    }

    public function consulta(){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#existente").bootstrapSwitch();

          $('input[name="existente"]').on('switchChange.bootstrapSwitch', function(event, state) {
            if(state){
              $("#identificador").show();
              $("#tabla_muestra").show();
            }else{
              $("#identificador").hide();
              $("#tabla_muestra").hide();
              $("input[type=radio]").attr('checked', false);
            }
          });



          $("#muestra-cupones").tablesorter();

          var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false,
                 "language": {
                            "emptyTable": "No hay datos disponibles",
                            "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                            "info": "Mostrar _START_ a _END_ de _TOTAL_ registros",
                            "infoFiltered":   "(Filtrado de _MAX_ total de registros)",
                            "lengthMenu": "Mostrar _MENU_ registros",
                            "zeroRecords":  "No se encontraron resultados",
                            "search": "Buscar:",
                            "processing": "Procesando...",
                            "paginate" : {
                                "next": "Siguiente",
                                "previous" : "Anterior"
                            }
                        }
            });

            $('#muestra-cupones input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

        });//fin del document ready
      </script>
html;
        $sIdentificador = "";
        foreach (BajaDao::getIdentificador() as $key => $value) {
            $sIdentificador .=<<<html
        <option value="{$value['identificador']}">{$value['identificador']}</option>
html;
        }

        $sColaboradorExistente = "";
        $colaboradores_existentes = BajaDao::getOperacionNoi();
        foreach ($colaboradores_existentes as $key => $value) {
            $value['nombre'] = utf8_encode($value['nombre']);
            $value['ap_pat'] = utf8_encode($value['ap_pat']);
            $value['ap_mat'] = utf8_encode($value['ap_mat']);
            $value['fecha_baja'] = utf8_encode($value['fecha_baja']);

            $sColaboradorExistente .=<<<html
        <tr>
          <td><input type="radio" name="colaborador_id" value="{$value['identificador']}{$value['clave']}"/></td>
          <td>{$value['nombre']}</td>
          <td>{$value['ap_pat']}</td>
          <td>{$value['ap_mat']}</td>
          <td>{$value['fecha_baja']}</td>
          <td class="center" >
              <a href="/Baja/AddConsulta/{$value['catalogo_colaboradores_id']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-arrow-down" style="color:white"></span> Procesar Baja</a>
          </td>

        </tr>
html;
        }

        View::set("sIdentificador",$sIdentificador);
        View::set("sColaboradorExistente",$sColaboradorExistente);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("consulta_bajas");
    }

    public function getColaboradorNombre(){
        $colaborador = '';
        foreach (BajaDao::getColaboradorNombre() as $key => $value) {
            $colaborador .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        return $colaborador;
    }

    public function getLugarAccidente(){
        $lugar = '';
        foreach (BajaDao::getLugarAccidente() as $key => $value) {
            $lugar .=<<<html
        <option value="{$value['id_lugar_accidente']}">{$value['detalle']}</option>
html;
        }
        return $lugar;
    }

    public function getCalsificacionAccidente(){
        $clasificacion = '';
        foreach (BajaDao::getClasificacionrAccidente() as $key => $value) {
            $clasificacion .=<<<html
        <option value="{$value['id_clasificacion_accidente']}">{$value['detalle']}</option>
html;
        }
        return $clasificacion;
    }

    public function add(){
        $extraFooter =<<<html
      <script>
       $(document).ready(function(){
          $("#add").validate({
            rules:{
              nombre_colaborador:{
                required: true
              },
              fecha:{
                required: true
              },
              motivo:{
                required: true
              }
            },
            messages:{
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
             motivo:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate
       

          $("#btnCancel").click(function(){
            window.location.href = "/Baja/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        $idMotivo = "";
        foreach (BajaDao::getIdMotivoBaja() as $key => $value) {
            $selected = ($value['catalogo_motivo_baja_id'] == $value['motivo'])? 'selected' : '';
            $idMotivo .=<<<html
        <option {$selected} value="{$value['catalogo_motivo_baja_id']}">{$value['nombre']}</option>
html;
        }

        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('idColaborador',$this->getColaboradorNombre());
        View::set('idMotivo', $idMotivo);
        View::render("baja_add");
    }

    public function addConsulta($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#add_consulta").validate({
            rules:{
              nombre_colaborador:{
                required: true
              },
              fecha:{
                required: true
              },
              motivo:{
                required: true
              }
            },
            messages:{
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
             motivo:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate
       

          $("#btnCancel").click(function(){
            window.location.href = "/Baja/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        $baja = BajaDao::getById($id);

        $idMotivo = "";
        foreach (BajaDao::getIdMotivoBaja() as $key => $value) {
            $selected = ($value['catalogo_motivo_baja_id'] == $value['motivo'])? 'selected' : '';
            $idMotivo .=<<<html
        <option {$selected} value="{$value['catalogo_motivo_baja_id']}">{$value['nombre']}</option>
html;
        }

        $sColaborador = "";
        foreach (BajaDao::getColaboradorNombreSemanal($id) as $key => $value) {
            $selected = ($baja['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
            $sColaborador .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }

        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('sColaborador',$sColaborador);
        View::set('baja',$baja);
        View::set('idMotivo', $idMotivo);
        View::render("baja_semanal_add");
    }

    public function BajaAddConsulta(){
        $baja = new \stdClass();
        $colaborador = new \stdClass();
        $baja->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');
        $baja ->_fecha_inicio = MasterDom::getData('fecha');
        $baja->_fecha_termino = MasterDom::getData('fecha');
        $baja->_motivo = MasterDom::getData('motivo');


        $colaborador->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');
        $colaborador->_fecha_baja = MasterDom::getData('fecha');
        $colaborador->_motivo = MasterDom::getData('motivo');

        $id = BajaDao::insert($baja);
        if($id >= 1)
        {
            echo "";
        }

        if($id >=1) {

            $id1 = BajaDao::update($colaborador);
            if($id1 >=1)
            {
                $this->alerta($id,'edit');
            }
            else
            {
                echo "No se inserto";
            }

        }
        else
        {
            $this->alerta($id,'error');
        }


    }

    public function BajaAdd(){
        $baja = new \stdClass();
        $colaborador = new \stdClass();

        $fechamovimiento =  date('Y-m-d H:i:s');

        $baja->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');
        $baja ->_fecha_inicio = $fechamovimiento;
        $baja->_fecha_termino = MasterDom::getData('fecha');
        $baja->_motivo = MasterDom::getData('motivo');


        $colaborador->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');
        $colaborador->_fecha_baja = MasterDom::getData('fecha');
        $colaborador->_motivo = MasterDom::getData('motivo');

        $id = BajaDao::insert($baja);
        if($id >= 1)
        {
            echo "";
        }

            if($id >=1) {

                $id1 = BajaDao::update($colaborador);
                if($id1 >=1)
                {
                    $this->alerta($id,'edit');
                }
                else
                {
                    echo "No se inserto";
                }

            }
            else
            {
                $this->alerta($id,'error');
            }


    }


    public function edit($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){

          $("#edit").validate({
            rules:{
              nombre_colaborador:{
                required: true
              },
              fecha:{
                required: true
              },
              trimestre:{
                required: true
              },
              lugar:{
                required: true
              },
	           clasificacion:{
                required: true
              },
              detalle:{
                required: true
              },
              causa:{
                required: true
              },
              acto:{
                required: true
              },
              condicion:{
                required: true
              }
            },
            messages:{
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
              trimestre:{
                required: "Este campo es requerido"
              },
               lugar:{
                required: "Este campo es requerido"
              },
              clasificacion:{
                required: "Este campo es requerido"
              },
              detalle:{
                required: "Este campo es requerido"
              },
               causa:{
                required: "Este campo es requerido"
              },
              acto:{
                required: "Este campo es requerido"
              },
	            condicion:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate

          $("#btnCancel").click(function(){
            window.location.href = "/Baja/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $accidente = AccidentesDao::getById($id);

        $sColaborador = "";
        foreach (BajaDao::getColaboradorNombre() as $key => $value) {
            $selected = ($accidente['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
            $sColaborador .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        $sClasificacion = "";
        foreach (BajaDao::getClasificacionrAccidente() as $key => $value) {
            $selected = ($accidente['id_clasificacion_accidente']==$value['id_clasificacion_accidente'])? 'selected' : '';
            $sClasificacion .=<<<html
        <option {$selected} value="{$value['id_clasificacion_accidente']}">{$value['detalle']}</option>
html;
        }
        $sLugar = "";
        foreach (BajaDao::getLugarAccidente() as $key => $value) {
            $selected = ($accidente['id_lugar_accidente']==$value['id_lugar_accidente'])? 'selected' : '';
            $sLugar .=<<<html
        <option {$selected} value="{$value['id_lugar_accidente']}">{$value['detalle']}</option>
html;
        }

        View::set('sColaborador',$sColaborador);
        View::set('sClasificacion',$sClasificacion);
        View::set('sLugar',$sLugar);
        View::set('accidente',$accidente);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("accidentes_edit");
    }

    public function AccidentesEdit(){
        $accidente = new \stdClass();
        $accidente->_id_accidente = MasterDom::getData('id_accidente');
        $accidente->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');

        $accidente->_fecha_accidente = MasterDom::getData('fecha');
        $fecha = MasterDom::getData('fecha');
        $fechaEntera = strtotime($fecha);
        $mes = date("m", $fechaEntera);

        if($mes == '1')
        {
            $accidente->_trimestre = 1;
        }
        if($mes == '2')
        {
            $accidente->_trimestre = 1;
        }
        if($mes == '3')
        {
            $accidente->_trimestre = 1;
        }
        if($mes == '4')
        {
            $accidente->_trimestre = 2;
        }
        if($mes == '5')
        {
            $accidente->_trimestre = 2;
        }
        if($mes == '6')
        {
            $accidente->_trimestre = 2;
        }
        if($mes == '7')
        {
            $accidente->_trimestre = 3;
        }
        if($mes == '8')
        {
            $accidente->_trimestre = 3;
        }
        if($mes == '9')
        {
            $accidente->_trimestre = 3;
        }
        if($mes == '10')
        {
            $accidente->_trimestre = 4;
        }
        if($mes == '11')
        {
            $accidente->_trimestre = 4;
        }
        if($mes == '12')
        {
            $accidente->_trimestre = 4;
        }

        $accidente->_id_lugar_accidente = MasterDom::getData('lugar');

        $detalle_accidente = MasterDom::getDataAll('detalle');
        $detalle_accidente = MasterDom::procesoAcentosNormal($detalle_accidente);
        $accidente->_detalle_accidente = $detalle_accidente;


        $causa = MasterDom::getDataAll('causa');
        $causa = MasterDom::procesoAcentosNormal($causa);
        $accidente->_causa = $causa;

        $accidente->_id_clasificacion_accidente = MasterDom::getData('clasificacion');
        $acto_inseguro = MasterDom::getDataAll('acto');
        $acto_inseguro = MasterDom::procesoAcentosNormal($acto_inseguro);
        $accidente->_acto_inseguro = $acto_inseguro;
        $condicion_insegura = MasterDom::getDataAll('condicion');
        $condicion_insegura = MasterDom::procesoAcentosNormal($condicion_insegura);
        $accidente->_condicion_insegura = $condicion_insegura;

        $id = AccidentesDao::update($accidente);
        if($id >= 1)
            $this->alerta($id,'edit');
        else
            $this->alerta($id,'nothing');

    }

    public function show($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#btnCancel").click(function(){
            window.location.href = "/Accidentes/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $accidente = AccidentesDao::getById($id);

        $sColaborador = "";
        foreach (AccidentesDao::getColaboradorNombre() as $key => $value) {
            $selected = ($accidente['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
            $sColaborador .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        $sClasificacion = "";
        foreach (AccidentesDao::getClasificacionrAccidente() as $key => $value) {
            $selected = ($accidente['id_clasificacion_accidente']==$value['id_clasificacion_accidente'])? 'selected' : '';
            $sClasificacion .=<<<html
        <option {$selected} value="{$value['id_clasificacion_accidente']}">{$value['detalle']}</option>
html;
        }
        $sLugar = "";
        foreach (AccidentesDao::getLugarAccidente() as $key => $value) {
            $selected = ($accidente['id_lugar_accidente']==$value['id_lugar_accidente'])? 'selected' : '';
            $sLugar .=<<<html
        <option {$selected} value="{$value['id_lugar_accidente']}">{$value['detalle']}</option>
html;
        }

        View::set('sColaborador',$sColaborador);
        View::set('sClasificacion',$sClasificacion);
        View::set('sLugar',$sLugar);
        View::set('accidente',$accidente);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("accidentes_view");
    }

    public function alerta($id, $parametro){
        $regreso = "/Baja/";

        if($parametro == 'add'){
            $mensaje = "Se ha agregado correctamente";
            $class = "success";
        }

        if($parametro == 'edit'){
            $mensaje = "Se ha modificado correctamente";
            $class = "success";
        }

        if($parametro == 'delete'){
            $mensaje = "Se ha eliminado la empresa {$id}, ya que cambiaste el estatus a eliminado";
            $class = "success";
        }

        if($parametro == 'nothing'){
            $mensaje = "Posibles errores: <li>No intentaste actualizar ningún campo</li> <li>Este dato ya esta registrado, comunicate con soporte técnico</li> ";
            $class = "warning";
        }

        if($parametro == 'no_cambios'){
            $mensaje = "No intentaste actualizar ningún campo";
            $class = "warning";
        }

        if($parametro == 'union'){
            $mensaje = "Al parecer este campo de está ha sido enlazada con un campo de Catálogo de Colaboradores, ya que esta usuando esta información";
            $class = "info";
        }

        if($parametro == "error"){
            $mensaje = "Al parecer ha ocurrido un problema";
            $class = "danger";
        }


        View::set('class',$class);
        View::set('regreso',$regreso);
        View::set('mensaje',$mensaje);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("alerta");
    }

    public function DocumentoAdd(){
        $documento = new \stdClass();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $documento->_id_c = $_POST['id_colaborador'];
            $colaborador = $_POST['id_colaborador'];

            $documento->_titulo = $_POST['title'];
            $titulo = $_POST['title'];

            $fichero = $_FILES["file"];
            move_uploaded_file($fichero["tmp_name"], "bajas/".$colaborador.$titulo.'.pdf');

            $documento->_url = $colaborador.$titulo.'.pdf';
            $id = BajaDao::update_documento($documento);

            if ($id) {
                echo 'success';

            } else {
                echo 'fail';
            }
        } else {
            echo 'fail REQUEST';
        }
    }
}
