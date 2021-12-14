<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\ProyectosMejora AS ProyectosMejoraDao;
use \App\models\General AS GeneralDao;

class ProyectosMejora extends Controller{

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
	$(document).on('click', '.upload', function(){
		var id=$(this).val();
		console.log('docuemento : ' + id );
		$('#Modal_Documentacion').modal('show');
        $('#id_colaborador').val(id);
	});
});
     
      $(document).ready(function(){
	$(document).on('click', '.ver_archivo_personal', function(){
		var id=$(this).val();
		console.log('El código es: ' + id );
		var url = "/reportes_personal/" + id; 
		$('#ver_archivo_personal').modal('show');
        $('#iframePDF').attr('src', url);
	});   
});     
      </script>
html;
        $usuario = $this->__usuario;
        $reportes = ProyectosMejoraDao::getAll();
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($reportes as $key => $value) {
            $check = $value['implementacion'];
            $check_tabla = "";
                if($check == 0)
                {
                    $check_tabla.=<<<html
                    <span class="bi bi-x-circle-fill fa-2x" style="color:#F73F35;"></span> NO
html;
                }
                else
                {
                    $check_tabla.=<<<html
               <span class="bi bi-check-circle-fill fa-2x" style="color:#7DE300;"></span> SI
html;
                }

            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_proyecto_mejora']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['nombrep']}</td>
                    <td><span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['fecha']}</td>
                    <td class="center">
                         $check_tabla
                    </td> 
                    <td class="center"> 
                        <a href="/ProyectosMejora/Edit/{$value['id_proyecto_mejora']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/ProyectosMejora/Show/{$value['id_proyecto_mejora']}" {$editarHidden} type="submit" name="id" class="btn btn-success"><span class="fa fa-eye" style="color:white"></span> </a>
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
        View::render("proyectos_mejora_all");
    }

    public function getColaboradorNombre(){
        $colaborador = '';
        foreach (ProyectosMejoraDao::getColaboradorNombre() as $key => $value) {
            $colaborador .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        return $colaborador;
    }
    public function PDF($id){
        $ids = $id;
        $mpdf=new \mPDF('c');
        $mpdf->defaultPageNumStyle = 'I';
        $mpdf->h2toc = array('H5'=>0,'H6'=>1);
        $style =<<<html
      <style>
        .imagen{
          width:100%;
          height: 150px;
          background: url(/img/ag_logo.png) no-repeat center center fixed;
          background-size: cover;
          -moz-background-size: cover;
          -webkit-background-size: cover
          -o-background-size: cover;
        }

        .titulo{
          width:100%;
          margin-top: 30px;
          color: #F5AA3C;
          margin-left:auto;
          margin-right:auto;
        }
      </style>
html;
        $tabla =<<<html
  <img class="imagen" src="/img/ag_logo.png"/>
  <br>
  <div style="page-break-inside: avoid;" align='center'>
  <H1 class="titulo">Empresas</H1>
  <table border="0" style="width:100%;text-align: center">
    <tr style="background-color:#B8B8B8;">
    <th><strong>Id</strong></th>
    <th><strong>Nombre</strong></th>
    <th><strong>Descripción</strong></th>
    <th><strong>Status</strong></th>
    </tr>
html;

        if($ids!=''){
            foreach ($ids as $key => $value) {
                $empresa = EmpresaDao::getByIdReporte($value);
                $tabla.=<<<html
              <tr style="background-color:#B8B8B8;">
              <td style="height:auto; width: 200px;background-color:#E4E4E4;">{$empresa['catalogo_empresa_id']}</td>
              <td style="height:auto; width: 200px;background-color:#E4E4E4;">{$empresa['nombre']}</td>
              <td style="height:auto; width: 200px;background-color:#E4E4E4;">{$empresa['descripcion']}</td>
              <td style="height:auto; width: 200px;background-color:#E4E4E4;">{$empresa['status']}</td>
              </tr>
html;
            }
        }else{
            foreach (ProyectosMejoraDao::getAll() as $key => $empresa) {
                $tabla.=<<<html
            <tr style="background-color:#B8B8B8;">
            <td style="height:auto; width: 200px;background-color:#E4E4E4;">{$empresa['catalogo_empresa_id']}</td>
            <td style="height:auto; width: 200px;background-color:#E4E4E4;">{$empresa['nombre']}</td>
            <td style="height:auto; width: 200px;background-color:#E4E4E4;">{$empresa['descripcion']}</td>
            <td style="height:auto; width: 200px;background-color:#E4E4E4;">{$empresa['status']}</td>
            </tr>
html;
            }
        }
        $tabla .=<<<html
      </table>
      </div>
html;
        $mpdf->WriteHTML($style,1);
        $mpdf->WriteHTML($tabla,2);
        //$nombre_archivo = "MPDF_".uniqid().".pdf";/* se genera un nombre unico para el archivo pdf*/
        print_r($mpdf->Output());/* se genera el pdf en la ruta especificada*/
        //echo $nombre_archivo;/* se imprime el nombre del archivo para poder retornarlo a CrmCatalogo/index */

        exit;
        //$ids = MasterDom::getDataAll('borrar');
        //echo shell_exec('php -f /home/granja/backend/public/librerias/mpdf_apis/Api.php Competencias '.json_encode(MasterDom::getDataAll('borrar')));
    }

    public function Add(){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#add").validate({
            rules:{
                 nombrep:{
                required: true
              },
              nombre_colaborador:{
                required: true
              },
              fecha:{
                required: true
              },
              detalle:{
                required: true
              },
              detalle1:{
                required: true
              }
            },
            messages:{
                nombrep:{
                required: "Este campo es requerido"
              },
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
              detalle:{
                required: "Este campo es requerido"
              },
              detalle1:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate
       

          $("#btnCancel").click(function(){
            window.location.href = "/ProyectosMejora/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('idColaborador',$this->getColaboradorNombre());
        View::render("proyecto_mejora_add");
    }

    public function ProyectosAdd(){
        $reporte_personal = new \stdClass();
        $reporte_personal->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');
        $reporte_personal->_fecha = MasterDom::getData('fecha');
        $reporte_personal->_detalle = MasterDom::getData('detalle');
        $reporte_personal->_detalle1 = MasterDom::getData('detalle1');
        $reporte_personal->_nombrep = MasterDom::getData('nombrep');
        $check = MasterDom::getData('check');
        if($check == 'on')
        {
            $reporte_personal->_check = 1;
        }
        else{
            $reporte_personal->_check = 0;
        }

            $id = ProyectosMejoraDao::insert($reporte_personal);

            if($id >= 1 )
            {
                $this->alerta($id,'add');
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
                 nombrep:{
                required: true
              },
              nombre_colaborador:{
                required: true
              },
              fecha:{
                required: true
              },
              detalle:{
                required: true
              },
              detalle1:{
                required: true
              }
            },
            messages:{
                nombrep:{
                required: "Este campo es requerido"
              },
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
              detalle:{
                required: "Este campo es requerido"
              },
              detalle1:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate

          $("#btnCancel").click(function(){
            window.location.href = "/ProyectosMejora/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $sProyectos = ProyectosMejoraDao::getById($id);
        $proyecto_mejora = $id;
        $sColaborador = "";
        foreach (ProyectosMejoraDao::getColaboradorNombre() as $key => $value) {
            $selected = ($sProyectos['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
            $sColaborador .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }

        View::set('sProyectos',$sProyectos);
        View::set('proyecto_mejora',$proyecto_mejora);
        View::set('sColaborador',$sColaborador);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("proyecto_mejora_edit");
    }

    public function show($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){

          $("#edit").validate({
           rules:{
                 nombrep:{
                required: true
              },
              nombre_colaborador:{
                required: true
              },
              fecha:{
                required: true
              },
              detalle:{
                required: true
              },
              detalle1:{
                required: true
              }
            },
            messages:{
                nombrep:{
                required: "Este campo es requerido"
              },
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
              detalle:{
                required: "Este campo es requerido"
              },
              detalle1:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate

          $("#btnCancel").click(function(){
            window.location.href = "/ProyectosMejora/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $sProyectos = ProyectosMejoraDao::getById($id);
        $proyecto_mejora = $id;
        $sColaborador = "";
        foreach (ProyectosMejoraDao::getColaboradorNombre() as $key => $value) {
            $selected = ($sProyectos['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
            $sColaborador .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }

        View::set('sProyectos',$sProyectos);
        View::set('proyecto_mejora',$proyecto_mejora);
        View::set('sColaborador',$sColaborador);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("proyecto_mejora_show");
    }

    public function ProyectosEdit(){
        $reporte_personal = new \stdClass();
        $reporte_personal->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');
        $reporte_personal->_fecha = MasterDom::getData('fecha');
        $reporte_personal->_detalle = MasterDom::getData('detalle');
        $reporte_personal->_detalle1 = MasterDom::getData('detalle1');
        $reporte_personal->_nombrep = MasterDom::getData('nombrep');
        $reporte_personal->_id_proyecto_mejora = MasterDom::getData('id_proyecto_mejora');
        $check = MasterDom::getData('check');
        if($check == 'on')
        {
            $reporte_personal->_check = 1;
        }
        else {
            $reporte_personal->_check = 0;
        }

        $id = ProyectosMejoraDao::update($reporte_personal);

        if($id >= 1 )
        {
            $this->alerta($id,'edit');
        }
        else
        {
            $this->alerta($id,'nothing');
        }

    }

    public function alerta($id, $parametro){
        $regreso = "/ProyectosMejora/";

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
            move_uploaded_file($fichero["tmp_name"], "reportes_personal/".$colaborador.$titulo.'.pdf');

            $documento->_url = $colaborador.$titulo.'.pdf';
            $id = ReportesDao::update_documento($documento);

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
