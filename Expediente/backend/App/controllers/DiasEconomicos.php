<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Economico AS EconomicoDao;
use \App\models\General AS GeneralDao;

class DiasEconomicos extends Controller{

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

        });
         $(document).ready(function(){
            $("#muestra-cupones1").tablesorter();
          var oTable = $('#muestra-cupones1').DataTable({
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
            $("#checkAll1").click(function () {
              if(checkAll1==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });

        });
      </script>
html;
        $usuario = $this->__usuario;
        $economico = EconomicoDao::getAll();
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($economico as $key => $value) {
            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_dia_economico']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_solicitud']}</td>
                    <td>{$value['fecha_dia_economico']}</td>
                    <td>{$value['estatus']}</td>
                    <td>-</td>
                    <td class="center" >
                        <a href="/DiasEconomicos/Edit/{$value['id_dia_economico']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/DiasEconomicos/Show/{$value['id_dia_economico']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
                    </td>
                </tr>
html;
        }

        $economico = EconomicoDao::getAllDias();
        $tabla1= '';
        foreach ($economico as $key => $value) {
            $tabla1.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['dias_usados']}</td>
                    <td>{$value['dias_sobrantes']}</td>
                </tr>
html;
        }

        View::set('editarHidden',$editarHidden);
        View::set('eliminarHidden',$eliminarHidden);
        View::set('tabla',$tabla);
        View::set('tabla1',$tabla1);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("dias_economicos_all");
    }

    public function getColaboradorNombre(){
        $colaborador = '';
        foreach (AccidentesDao::getColaboradorNombre() as $key => $value) {
            $colaborador .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        return $colaborador;
    }

    public function getLugarAccidente(){
        $lugar = '';
        foreach (AccidentesDao::getLugarAccidente() as $key => $value) {
            $lugar .=<<<html
        <option value="{$value['id_lugar_accidente']}">{$value['detalle']}</option>
html;
        }
        return $lugar;
    }

    public function getCalsificacionAccidente(){
        $clasificacion = '';
        foreach (AccidentesDao::getClasificacionrAccidente() as $key => $value) {
            $clasificacion .=<<<html
        <option value="{$value['id_clasificacion_accidente']}">{$value['detalle']}</option>
html;
        }
        return $clasificacion;
    }

    public function edit($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){

          $("#edit").validate({
            rules:{
              fecha_inicio:{
                required: true
              }
            },
            messages:{
             fecha_inicio:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate

          $("#btnCancel").click(function(){
            window.location.href = "/DiasEconomicos/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $economico = EconomicoDao::getById($id);

        $sColaborador = "";
        foreach (EconomicoDao::getColaboradorNombre() as $key => $value) {
            $selected = ($economico['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
            $sColaborador .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }


        View::set('sColaborador',$sColaborador);
        View::set('economico',$economico);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("dias_economicos_edit");
    }

    public function DiasEconomicosEdit(){
        $economicos = new \stdClass();
        $economicos->_id_accidente = MasterDom::getData('id_dia_economico');
        $economicos->_fecha_accidente = MasterDom::getData('fecha_inicio');

        $id = EconomicoDao::update($economicos);
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
        $regreso = "/DiasEconomicos/";

        if($parametro == 'add'){
            $mensaje = "Se ha agregado correctamente";
            $class = "warning";
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
