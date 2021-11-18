<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Incapacidades AS IncapacidadesDao;
use \App\models\General AS GeneralDao;

class Incapacidades extends Controller{

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

            
            $("#add").validate({
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
            window.location.href = "/Accidentes/";
          });//fin del btnAdd
            
            $("#delete").click(function(){
              var seleccionados = $("input[name='borrar[]']:checked").length;
              if(seleccionados>0){
                alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response){
                  if(response){
                    $('#all').attr('action', '/Economicos/delete');
                    $("#all").submit();
                    alertify.success("Se ha eliminado correctamente");
                  }
                });
              }else{
                alertify.confirm('Selecciona al menos uno para eliminar');
              }
            });
        });
        
                    $(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		console.log('El código es: ' + id );
		var url = "/files/" + id;
		$('#edit').modal('show');
        $('#efirstname').val(id);
	});
});
      </script>
html;
        $usuario = $this->__usuario;
        $incapacidades = IncapacidadesDao::getAll();
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($incapacidades as $key => $value) {
            $fechaActual = date('Y-m-d');
            $fecha_final = $value['fecha_fin'];

            if($fecha_final == '0000-00-00')
            {
                $estatus = "INCAPACIDAD NO INICIADA";
            }
            else
            {
                if($fechaActual >= $fecha_final)
                {
                    $estatus = "INCAPACIDAD FINALIZADA";
                }
                if($fechaActual <= $fecha_final)
                {
                    $estatus = "INCAPACIDAD ACTIVA";
                }
            }

            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_incapacidad']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_inicio']}</td>
                    <td>{$value['fecha_fin']}</td>
                    <td>{$value['clasificacion_incapacidad']}</td>
                    <td>$estatus</td>
                    <td class="center" >
                        <a href="/Incapacidades/Edit/{$value['id_incapacidad']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Incapacidades/Documentacion/{$value['id_incapacidad']}" type="submit" name="id_incapacidad" class="btn btn-info"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
                    </td>
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
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("incapacidades_all");
    }

    public function getClasificacionIncapacidades(){
        $clasificacion = '';
        foreach (IncapacidadesDao::getClasificacionIncapacidades() as $key => $value) {
            $clasificacion .=<<<html
        <option value="{$value['id_catalogo_clasificacion_incapacidades']}">{$value['detalle']}</option>
html;
        }
        return $clasificacion;
    }

    public function IncapacidadesAdd(){
        $incapacidad = new \stdClass();
        $incapacidad->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');

        $incapacidad->_fecha_inicio = MasterDom::getData('fecha_inicio');
        $incapacidad->_fecha_fin = MasterDom::getData('fecha_fin');

        $incapacidad->_clasificacion = MasterDom::getData('clasificacion');

        $id = IncapacidadesDao::insert($incapacidad);
       //if($incapacidad == 'on')
       // {
       //    AccidentesDao::insert1($incapacidad, $id);
       //}

        if($id >= 1 )
        {
            $this->alerta($id,'add');
        }
        else
        {
            $this->alerta($id,'error');
        }


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
              fecha_inicio:{
                required: true
              },
              fecha_fin:{
                required: true
              },
              clasificacion:{
                required: true
              }
            },
            messages:{
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha_inicio:{
                required: "Este campo es requerido"
              },
              fecha_fin:{
                required: "Este campo es requerido"
              },
               clasificacion:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate
       

          $("#btnCancel").click(function(){
            window.location.href = "/Incapacidades/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('idColaborador',$this->getColaboradorNombre());
        View::set('idClasificacion',$this->getClasificacionIncapacidades());
        View::render("incapacidades_add");
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
              fecha_inicio:{
                required: true
              },
              fecha_fin:{
                required: true
              },
              clasificacion:{
                required: true
              }
            },
            messages:{
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha_inicio:{
                required: "Este campo es requerido"
              },
              fecha_fin:{
                required: "Este campo es requerido"
              },
               clasificacion:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate

          $("#btnCancel").click(function(){
            window.location.href = "/Incapacidades/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $incapacidad = IncapacidadesDao::getById($id);

        $sColaborador = "";
        foreach (IncapacidadesDao::getColaboradorNombre() as $key => $value) {
            $selected = ($incapacidad['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
            $sColaborador .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        $sClasificacion = "";
        foreach (IncapacidadesDao::getClasificacionIncapacidades() as $key => $value) {
            $selected = ($incapacidad['id_catalogo_clasificacion_incapacidades']==$value['id_catalogo_clasificacion_incapacidades'])? 'selected' : '';
            $sClasificacion .=<<<html
        <option {$selected} value="{$value['id_catalogo_clasificacion_incapacidades']}">{$value['detalle']}</option>
html;
        }

        View::set('sColaborador',$sColaborador);
        View::set('sClasificacion',$sClasificacion);
        View::set('incapacidad',$incapacidad);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("incapacidades_edit");
    }

    public function IncapacidadesEdit(){
        $incapacidad = new \stdClass();
        $incapacidad->_id_incapacidad = MasterDom::getData('id_incapacidad');
        $incapacidad->_fecha_inicio = MasterDom::getData('fecha_inicio');
        $incapacidad->_fecha_fin = MasterDom::getData('fecha_fin');
        $incapacidad->_clasificacion = MasterDom::getData('clasificacion');

        $id = IncapacidadesDao::update($incapacidad);
        if($id >= 1 )
        {
            $this->alerta($id,'add');
        }
        else
        {
            $this->alerta($id,'nothing');
        }
    }

    public function alerta($id, $parametro){
        $regreso = "/Incapacidades/";

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

    public function Documentacion($id){
        $extraHeader =<<<html
      <link href="/css/bootstrap-datetimepicker.css" rel="stylesheet">
      <style>
        .incentivo{
          margin: 2px;
          background-color: #18bf7f;
          font: message-box;
          height:25px;
          -webkit-box-shadow: 9px 13px 23px -9px #18bf7f;
          -moz-box-shadow: 9px 13px 23px -9px #18bf7f;
          box-shadow: 9px 13px 23px -9px #18bf7f;
        }

        .incentivo:hover{
          background-color: #c9069b;
          -webkit-box-shadow: 9px 13px 23px -9px #c9069b;
          -moz-box-shadow: 9px 13px 23px -9px #c9069b;
          box-shadow: 9px 13px 23px -9px #c9069b;
        }
        .foto{
          width:150px;
          height:150px;
          border-radius: 50px;
          margin:10px;
          float:left;
        }

        .btn span.glyphicon {
          opacity: 0;
        }
        .btn.active span.glyphicon {
          opacity: 1;
        }

      </style>
html;
        $extraFooter =<<<html
      <script src="/js/moment/moment.min.js"></script>
      <script src="/js/datepicker/scriptdatepicker.js"></script>
      <script src="/js/datepicker/datepicker2.js"></script>

      <script>
    
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
           $('#muestra-cupones1 input[type=search]').keyup( function () {
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

          $("#btnCancel").click(function(){
             window.location.href = "/Colaboradores/";
          });//fin del btnAdd
          
        });
        
         $(document).ready(function(){
	$(document).on('click', '.edit', function(){
		var id=$(this).val();
		console.log('El código es: ' + id );
		var url = "/incapacidad/" + id;
		$('#edit').modal('show');
        $('#iframePDF').attr('src', url);
	});
});
      </script>

html;

        $usuario = $this->__usuario;
        $documentos = IncapacidadesDao::getDocumentos($id);
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($documentos as $key => $value) {

            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id']}"/></td>
                    <td> {$value['title']} </td>
                    <td> {$value['filename']} </td>
                    <td> {$value['description']} </td>
                    <td> {$value['created_at']} </td>
                    <td class="center" >
                        <button type="button" class="btn btn-success edit" value="{$value['filename']}"><span class="fa fa-eye" style="color:white"></span></button>
                    </td>
                </tr>
html;
        }

        $nombre = IncapacidadesDao::getColaboradorNombre1($id);
        $nombre_colaborador ='';
        foreach ($nombre as $key => $value) {
        $nombre_colaborador.=<<<html
                 <div class="form-group">
                     <p class="excerpt"><span class="bi bi-file-person" style="color:grey"></span> | {$value['nombre']}</p>
                 </div>
html;

            $nombre_colaborador_1.=<<<html
                     <span class="bi bi-file-person" style="color:grey"></span> | {$value['nombre']}</p>
                
html;
        }

        $sArchivo = "";
        foreach (IncapacidadesDao::getArchivo() as $key => $value) {
            $sArchivo.=<<<html
        <option value="{$value['id_catalogo_clasificacion_incapacidades']}">{$value['detalle']}</option>
html;
        }

        $nombre = IncapacidadesDao::getDescripcionIncapacidad($id);
        $nombre_incapacidad ='';
        foreach ($nombre as $key => $value) {
            $nombre_incapacidad.=<<<html
                 <div class="form-group">
                     <p class="excerpt"><span class="fa fa-file" style="color:grey"></span> | {$value['detalle']}</p>
                 </div>
html;
        }

        $id_incapacidad= '';
        $id_incapacidad.=<<<html
                 <div class="form-group">
                      <input type="hidden" class="form-control" id="id_incapacidad" name="id_incapacidad" value="$id">
                 </div>
html;


        View::set('nombre_colaborador', $nombre_colaborador);
        View::set('nombre_colaborador_1', $nombre_colaborador_1);
        View::set('id_incapacidad', $id_incapacidad);
        View::set('TipoArchivo', $this->getTipoArchivo());
        View::set('nombre_incapacidad', $nombre_incapacidad);
        View::set('eliminarHidden',$eliminarHidden);
        View::set('tabla',$tabla);
        View::set('sArchivo',$sArchivo);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("incapacidades_documentacion");
    }

    public function getColaboradorNombre(){
        $colaborador = '';
        foreach (IncapacidadesDao::getColaboradorNombre() as $key => $value) {
            $colaborador .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        return $colaborador;
    }

    public function getTipoArchivo(){
        $TipoArchivo = '';
        foreach (IncapacidadesDao::getTipoArchivo() as $key => $value) {
            $TipoArchivo.=<<<html
        <option value="{$value['id_archivo']}">{$value['descripcion']}</option>
html;
        }
        return $TipoArchivo;
    }
    public function DocumentoAdd(){
        $documento = new \stdClass();

        $fechamovimiento =  date('Y-m-d H:i:s');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $documento->_id_c = $_POST['id_incapacidad'];
            $incapacidad = $_POST['id_incapacidad'];
            $documento->_titulo = $_POST['title'];
            $titulo = $_POST['title'];
            $documento->_descripcion = $_POST['description'];
            $documento->_id_archivo = $_POST['archivo'];
            $documento->_fecha = $fechamovimiento;


            $fichero = $_FILES["file"];
            move_uploaded_file($fichero["tmp_name"], "incapacidad/".$incapacidad.$titulo.'.pdf');

            $documento->_url = $incapacidad.$titulo.'.pdf';
            $id = IncapacidadesDao::insert_documento_incapacidades($documento);

            if ($id) {
                echo 'success';

            } else {
                echo 'fail';
            }
        } else {
            echo 'fail';
        }
    }
}
