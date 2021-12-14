<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\EmpleadoADG AS EmpleadoADGDao;

class EmpleadoADG extends Controller{

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
      </script>
html;
        $usuario = $this->__usuario;
        $empleado = EmpleadoADGDao::getAll();
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($empleado as $key => $value) {
            $estatus = $value['activo_incapacidad'];
            if($estatus == 0)
            {
                $estatus = "PENDIENTE";
            }
            if($estatus == 1)
            {
                $estatus = "ENTREGADO";
            }
            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_empleado_adg']}"/></td>
                    <td>{$value['ano_registro']}</td>
                    <td>{$value['descripcion_premio']}</td>
                    <td>{$value['trimestre']}</td>
                    <td>{$value['fecha_registro']}</td>
                    <td>$ {$value['cantidad_premio']}</td>
                    <td>$estatus</td>
                    <td class="center" >
                        <a href="/EmpleadoADG/Produccion/{$value['id_empleado_adg']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-user" style="color:white"></span> Candidatos</a>
                        <a href="/EmpleadoADG/Edit/{$value['id_empleado_adg']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                    </td>
                    <td class="center" >
                        <a href="/EmpleadoADG/Produccion/{$value['id_empleado_adg']}" type="submit" name="id_accidente" class="btn btn-success"><span class="fa fa-yelp" style="color:white"></span> Premiados</a>
                    </td>
                </tr>
html;
        }

        View::set('editarHidden',$editarHidden);
        View::set('tabla',$tabla);
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("empleadoadg_all");
    }

    public function add(){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#add").validate({
            rules:{
              ano:{
                required: true
              },
              fecha:{
                required: true
              },
              detalle:{
                required: true
              },
              cantidad:{
                required: true
              }
            },
            messages:{
              ano:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
              detalle:{
                required: "Este campo es requerido"
              },
              cantidad:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate
       

          $("#btnCancel").click(function(){
            window.location.href = "/EmpleadoADG/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("EmpleadoADG_add");
    }

    public function AccidentesAdd(){
        $accidente = new \stdClass();
        $incapacidad = new \stdClass();
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

        $incapacidad1 = MasterDom::getData('incapacidad');


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
        $incapacidad->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');
        if($incapacidad1 == 'on')
        {
            $accidente->_incapacidad_activa = 1;
        }
        else{
            $accidente->_incapacidad_activa = 0;
        }

        $id = AccidentesDao::insert($accidente);

        if($incapacidad1 == 'on')
        {
            AccidentesDao::insert1($incapacidad, $id);
            if($id >= 1 )
            {
                $this->alerta($id,'add');
            }
            else
            {
                $this->alerta($id,'error');
            }
        }

    }

    public function edit($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){

          $("#edit").validate({
            rules:{
              ano:{
                required: true
              },
              fecha:{
                required: true
              },
              detalle:{
                required: true
              },
              cantidad:{
                required: true
              }
            },
            messages:{
              ano:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
              detalle:{
                required: "Este campo es requerido"
              },
              cantidad:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate

          $("#btnCancel").click(function(){
            window.location.href = "/EmpleadoADG/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $empleado = EmpleadoADGDao::getById($id);
        $id_ = $id;
        View::set('id_',$id_);
        View::set('empleado',$empleado);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("empleadoADG_edit");
    }

    public function EmpleadoADGEdit(){
        $empleado = new \stdClass();
        $empleado->_id_empleado_adg = MasterDom::getData('id_empleado_adg');

        $descripcion = MasterDom::getData('detalle');
        $descripcion = MasterDom::procesoAcentosNormal($descripcion);
        $empleado->_detalle = $descripcion;
        $empleado->_fecha = MasterDom::getData('fecha');
        $empleado->_cantidad = MasterDom::getData('cantidad');

        $id = EmpleadoADGDao::update($empleado);
        if($id >= 1)
            $this->alerta($id,'edit');
        else
            $this->alerta($id,'nothing');

    }

    public function Produccion($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#btnCancel").click(function(){
            window.location.href = "/EmpleadoADG/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $sColaboradorAsistencia = "";
        foreach (EmpleadoADGDao::getColaboradorAsistecia($id) as $key => $value) {
            $selected = ($value['catalogo_colaboradores_id']==$value['nombre'])? 'selected' : '';
            $sColaboradorAsistencia .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }

        $id_c =$id;
        $empleado = EmpleadoADGDao::getAllPersonal($id);
        $tabla= '';
        foreach ($empleado as $key => $value) {
            $delete = $value['id_candidato_adg'];
            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_candidato_adg']}"/></td>
                    <td>{$value['nombre']}</td>
                     <td style="text-align:center; vertical-align:middle;">
                            <button class="btn btn-danger" type="button" id="button" onclick="gt_1($delete)"><span class="fa fa-trash" style="color:white"></button>
                      </td>
                </tr>
html;
        }


        View::set('header',$this->_contenedor->header(''));
        View::set('sColaboradorAsistencia',$sColaboradorAsistencia);
        View::set('id_c',$id_c);
        View::set('tabla',$tabla);
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("registro_candidato");
    }

    public function Delete(){

        $dato = EmpleadoADGDao::delete($_POST['a']);
        if($dato == 1){
            echo "true";
        }else{
            echo "false";
        }
    }

    public function CandidatoAdd(){
        $participante = new \stdClass();

        $participante->_id_candidato = MasterDom::getData('id_candidato_1');
        $participante->_id_colaborador = MasterDom::getData('nombre_colaborador');

        $id = EmpleadoADGDao::insertparticipantes($participante);
        if ($id) {
            echo 'success';

        } else {
            echo 'fail';
        }
    }

    public function alerta($id, $parametro){
        $regreso = "/EmpleadoADG/";

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
}
