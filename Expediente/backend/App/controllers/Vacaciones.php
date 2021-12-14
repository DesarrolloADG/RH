<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Vacaciones AS VacacionesDao;

class Vacaciones extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());

        if(Controller::getPermisosUsuario($this->__usuario, "seccion_plantas", 1) ==0)
          header('Location: /Principal/');
    }

    public function getUsuario(){
      return $this->__usuario;
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
            } );

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
      </script>
html;
      $vacaciones = VacacionesDao::getAll();
      $tabla= '';
      $tiempo = '';
      foreach ($vacaciones as $key => $value) {
        $tiempo = $value['dias_correspondientes'] - $value['dias_usados'];
        if($tiempo <= 1)
        {
            $tiempo = 0;
        }
        $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td><span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']} años</td>
                    <td>{$value['dias_correspondientes']} días</td>
                    <td>{$value['dias_usados']} días disfrutados</td>
                    <td>$tiempo días por disfrutar</td>
                    <td class="center" >
                        <a href="/Vacaciones/show/{$value['catalogo_colaboradores_id']}" type="submit" name="id_planta" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> Historial </a>
                    </td>
                </tr>
html;
      }

      View::set('tabla',$tabla);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("vacaciones_all");
    }

    public function show($id){
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
            } );

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
      </script>
html;


      $colaboradores= VacacionesDao::getColaborador($id);
      $vacaciones= VacacionesDao::getById($id);

        $tabla= '';
        foreach ($vacaciones as $key => $value) {

            $PAG= <<<html
               <span class="fa fa-check-circle" style="color:darkgreen"></span> PAGADO
html;
            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td><span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['fecha']}</td>
                    <td><span class="fa fa-calendar-check-o" style="color:rosybrown"></span> {$value['nomina']}</td>
                    <td>$PAG</td>
                </tr>
html;
        }
      View::set('tabla',$tabla);
      View::set('colaboradores',$colaboradores);
      View::set('header',$this->_contenedor->header(''));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("vacaciones_view");
    }

}
