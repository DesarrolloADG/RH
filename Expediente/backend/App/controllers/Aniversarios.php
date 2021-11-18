<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Aniversario AS AniversarioDao;

class Aniversarios extends Controller{

    private $_contenedor;

    function __construct(){
      parent::__construct();
      $this->_contenedor = new Contenedor;
      View::set('header',$this->_contenedor->header());
      View::set('footer',$this->_contenedor->footer());
	    //echo "es el usuario : ---{$this->_contenedor->getUsuario()}----+++++";
    }

    public function fechaCastellano ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        $datos = $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
        return $datos;
    }

    public function index() {
      $extraFooter =<<<html
        <script>
        $(document).ready(function(){
          $("#muestra-aniversarios").tablesorter();

          var oTable = $('#muestra-aniversarios').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-aniversarios input[type=search]').keyup( function () {
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
      </script>

        <script>
                $(document).ready(function(){
                  $("#muestra-aniversarios-vallejo").tablesorter();
        
                  var oTable = $('#muestra-aniversarios-vallejo').DataTable({
                        "columnDefs": [{
                            "orderable": false,
                            "targets": 0
                        }],
                         "order": false
                    });
        
                    // Remove accented character from search input as well
                    $('#muestra-aniversarios-vallejo input[type=search]').keyup( function () {
                        var table = $('#example').DataTable();
                        table.search(
                            jQuery.fn.DataTable.ext.type.search.html(this.value)
                        ).draw();
                    });
        
                    var checkAll = 0;
                    $("#checkAllVallejo").click(function () {
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
              
        <script>
                        $(document).ready(function(){
                          $("#muestra-aniversarios-liquidos").tablesorter();
                
                          var oTable = $('#muestra-aniversarios-liquidos').DataTable({
                                "columnDefs": [{
                                    "orderable": false,
                                    "targets": 0
                                }],
                                 "order": false
                            });
                
                            // Remove accented character from search input as well
                            $('#muestra-aniversarios-liquidos input[type=search]').keyup( function () {
                                var table = $('#example').DataTable();
                                table.search(
                                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                                ).draw();
                            });
                
                            var checkAll = 0;
                            $("#checkAllLiquidos").click(function () {
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

        <script>
                $(document).ready(function(){
                  $("#muestra-aniversarios-deshidratados").tablesorter();
        
                  var oTable = $('#muestra-aniversarios-deshidratados').DataTable({
                        "columnDefs": [{
                            "orderable": false,
                            "targets": 0
                        }],
                         "order": false
                    });
        
                    // Remove accented character from search input as well
                    $('#muestra-aniversarios-deshidratados input[type=search]').keyup( function () {
                        var table = $('#example').DataTable();
                        table.search(
                            jQuery.fn.DataTable.ext.type.search.html(this.value)
                        ).draw();
                    });
        
                    var checkAll = 0;
                    $("#checkAllDeshidratados").click(function () {
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

        <script>
                $(document).ready(function(){
                  $("#muestra-aniversarios-produccion").tablesorter();
        
                  var oTable = $('#muestra-aniversarios-produccion').DataTable({
                        "columnDefs": [{
                            "orderable": false,
                            "targets": 0
                        }],
                         "order": false
                    });
        
                    // Remove accented character from search input as well
                    $('#muestra-aniversarios-produccion input[type=search]').keyup( function () {
                        var table = $('#example').DataTable();
                        table.search(
                            jQuery.fn.DataTable.ext.type.search.html(this.value)
                        ).draw();
                    });
        
                    var checkAll = 0;
                    $("#checkAllProduccion").click(function () {
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

        <script>
                        $(document).ready(function(){
                          $("#muestra-aniversarios-enero").tablesorter();
                
                          var oTable = $('#muestra-aniversarios-enero').DataTable({
                                "columnDefs": [{
                                    "orderable": false,
                                    "targets": 0
                                }],
                                 "order": false
                            });
                
                            // Remove accented character from search input as well
                            $('#muestra-aniversarios-enero input[type=search]').keyup( function () {
                                var table = $('#example').DataTable();
                                table.search(
                                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                                ).draw();
                            });
                
                            var checkAll = 0;
                            $("#checkAllEnero").click(function () {
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

        <script>
                        $(document).ready(function(){
                          $("#muestra-aniversarios-febrero").tablesorter();
                
                          var oTable = $('#muestra-aniversarios-febrero').DataTable({
                                "columnDefs": [{
                                    "orderable": false,
                                    "targets": 0
                                }],
                                 "order": false
                            });
                
                            // Remove accented character from search input as well
                            $('#muestra-aniversarios-febrero input[type=search]').keyup( function () {
                                var table = $('#example').DataTable();
                                table.search(
                                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                                ).draw();
                            });
                
                            var checkAll = 0;
                            $("#checkAllFebrero").click(function () {
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

        <script>
                                $(document).ready(function(){
                                  $("#muestra-aniversarios-marzo").tablesorter();
                        
                                  var oTable = $('#muestra-aniversarios-marzo').DataTable({
                                        "columnDefs": [{
                                            "orderable": false,
                                            "targets": 0
                                        }],
                                         "order": false
                                    });
                        
                                    // Remove accented character from search input as well
                                    $('#muestra-aniversarios-marzo input[type=search]').keyup( function () {
                                        var table = $('#example').DataTable();
                                        table.search(
                                            jQuery.fn.DataTable.ext.type.search.html(this.value)
                                        ).draw();
                                    });
                        
                                    var checkAll = 0;
                                    $("#checkAllMarzo").click(function () {
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

        <script>
                                        $(document).ready(function(){
                                          $("#muestra-aniversarios-abril").tablesorter();
                                
                                          var oTable = $('#muestra-aniversarios-abril').DataTable({
                                                "columnDefs": [{
                                                    "orderable": false,
                                                    "targets": 0
                                                }],
                                                 "order": false
                                            });
                                
                                            // Remove accented character from search input as well
                                            $('#muestra-aniversarios-abril input[type=search]').keyup( function () {
                                                var table = $('#example').DataTable();
                                                table.search(
                                                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                                                ).draw();
                                            });
                                
                                            var checkAll = 0;
                                            $("#checkAllAbril").click(function () {
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

        <script>
                                        $(document).ready(function(){
                                          $("#muestra-aniversarios-mayo").tablesorter();
                                
                                          var oTable = $('#muestra-aniversarios-mayo').DataTable({
                                                "columnDefs": [{
                                                    "orderable": false,
                                                    "targets": 0
                                                }],
                                                 "order": false
                                            });
                                
                                            // Remove accented character from search input as well
                                            $('#muestra-aniversarios-mayo input[type=search]').keyup( function () {
                                                var table = $('#example').DataTable();
                                                table.search(
                                                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                                                ).draw();
                                            });
                                
                                            var checkAll = 0;
                                            $("#checkAllMayo").click(function () {
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
        
        <script>
        $(document).ready(function(){
          $("#muestra-aniversarios-junio").tablesorter();

          var oTable = $('#muestra-aniversarios-junio').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-aniversarios-junio input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAllJunio").click(function () {
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

        <script>
        $(document).ready(function(){
          $("#muestra-aniversarios-julio").tablesorter();

          var oTable = $('#muestra-aniversarios-julio').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-aniversarios-julio input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAllJulio").click(function () {
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

        <script>
                $(document).ready(function(){
                  $("#muestra-aniversarios-agosto").tablesorter();
        
                  var oTable = $('#muestra-aniversarios-agosto').DataTable({
                        "columnDefs": [{
                            "orderable": false,
                            "targets": 0
                        }],
                         "order": false
                    });
        
                    // Remove accented character from search input as well
                    $('#muestra-aniversarios-agosto input[type=search]').keyup( function () {
                        var table = $('#example').DataTable();
                        table.search(
                            jQuery.fn.DataTable.ext.type.search.html(this.value)
                        ).draw();
                    });
        
                    var checkAll = 0;
                    $("#checkAllAgosto").click(function () {
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

        <script>
        $(document).ready(function(){
          $("#muestra-aniversarios-septiembre").tablesorter();

          var oTable = $('#muestra-aniversarios-septiembre').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-aniversarios-septiembre input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAllSeptiembre").click(function () {
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

        <script>
        $(document).ready(function(){
          $("#muestra-aniversarios-octubre").tablesorter();

          var oTable = $('#muestra-aniversarios-octubre').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-aniversarios-octubre input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAllOctubre").click(function () {
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

        <script>
        $(document).ready(function(){
          $("#muestra-aniversarios-noviembre").tablesorter();

          var oTable = $('#muestra-aniversarios-noviembre').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-aniversarios-noviembre input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAllNoviembre").click(function () {
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

        <script>
        $(document).ready(function(){
          $("#muestra-aniversarios-diciembre").tablesorter();

          var oTable = $('#muestra-aniversarios-diciembre').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-aniversarios-diciembre input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAllDiciembre").click(function () {
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
      $usuario = $this->__usuario;
      $aniversariosXochimilco = AniversarioDao::getAllXOCHIMILCO();
      $tabla= '';
      foreach ($aniversariosXochimilco as $key => $value) {
         $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
         $fechaActual = date('Y-m-d');

         $buy = new Aniversarios();
          $variable = $buy->fechaCastellano($dateNew);

         $tabla1 = "";
         if($fechaActual == $dateNew)
         {
             $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
         }
         else
         {
             $tabla1.=<<<html
                    <td>$variable </td>
html;
         }

        $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                </tr>
html;
      }

      $aniversariosVallejo = AniversarioDao::getAllVALLEJO();
      $tablaVallejo= '';
      foreach ($aniversariosVallejo as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }

            $tablaVallejo.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                </tr>
html;
        }

      $aniversariosLiquidos = AniversarioDao::getAllLIQUIDOS();
      $tablaLiquidos= '';
      foreach ($aniversariosLiquidos as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }

            $tablaLiquidos.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                </tr>
html;
        }

      $aniversariosDeshidratados = AniversarioDao::getAllDESHIDRATADOS();
      $tablaDeshidratados= '';
      foreach ($aniversariosDeshidratados as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }

            $tablaDeshidratados.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                </tr>
html;
        }

      $aniversariosProduccion = AniversarioDao::getAllPRODUCCION();
      $tablaProduccion= '';
      foreach ($aniversariosProduccion as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }

            $tablaProduccion.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                </tr>
html;
        }

      $aniversariosEnero = AniversarioDao::getAllEnero();
      $tablaEnero= '';
      foreach ($aniversariosEnero as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";

            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }

            $empresa = "";
            if($value['empresa'] == '')
            {
               $empresa = 'ADMINISTRATIVOS';
            }
            else
            {
                $empresa = $value['empresa'];
            }

            $tablaEnero.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosFebrero = AniversarioDao::getAllFebrero();
      $tablaFebrero= '';
      foreach ($aniversariosFebrero as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }

            $tablaFebrero.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosMarzo = AniversarioDao::getAllMarzo();
      $tablaMarzo= '';
      foreach ($aniversariosMarzo as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }

            $tablaMarzo.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosAbril = AniversarioDao::getAllAbril();
      $tablaAbril= '';
      foreach ($aniversariosAbril as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }

          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }

            $tablaAbril.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosMayo = AniversarioDao::getAllMayo();
      $tablaMayo= '';
      foreach ($aniversariosMayo as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }
            $tablaMayo.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosJunio = AniversarioDao::getAllJunio();
      $tablaJunio= '';
      foreach ($aniversariosJunio as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }
            $tablaJunio.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosJulio = AniversarioDao::getAllJulio();
      $tablaJulio= '';
      foreach ($aniversariosJulio as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }

            $tablaJulio.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosAgosto = AniversarioDao::getAllAgosto();
      $tablaAgosto= '';
      foreach ($aniversariosAgosto as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }
            $tablaAgosto.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosSeptiembre = AniversarioDao::getAllSeptiembre();
      $tablaSeptiembre= '';
      foreach ($aniversariosSeptiembre as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }
            $tablaSeptiembre.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosOctubre = AniversarioDao::getAllOctubre();
      $tablaOctubre= '';
      foreach ($aniversariosOctubre as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }
            $tablaOctubre.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosNoviembre = AniversarioDao::getAllNoviembre();
      $tablaNoviembre= '';
      foreach ($aniversariosNoviembre as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }
            $tablaNoviembre.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

      $aniversariosDiciembre = AniversarioDao::getAllDiciembre();
      $tablaDiciembre= '';
      foreach ($aniversariosDiciembre as $key => $value) {
            $dateNew = date_create_from_format("Y-m-d", $value['cuando'])->format("Y-m-d");
            $fechaActual = date('Y-m-d');;

            $buy = new Aniversarios();
            $variable = $buy->fechaCastellano($dateNew);

            $tabla1 = "";
            if($fechaActual == $dateNew)
            {
                $tabla1.=<<<html
                    <td><i class="fa fa-bell"></i> | HOY ES SU ANIVERSARIO</td>
html;
            }
            else
            {
                $tabla1.=<<<html
                    <td>$variable </td>
html;
            }
          $empresa = "";
          if($value['empresa'] == '')
          {
              $empresa = 'ADMINISTRATIVOS';
          }
          else
          {
              $empresa = $value['empresa'];
          }
            $tablaDiciembre.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['catalogo_colaboradores_id']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>{$value['tiempo_colaborado']}</td>
                    <td>{$value['cumplira']}</td>
                    $tabla1
                    <td>$empresa</td>
                </tr>
html;
        }

        $pdfHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 2)==1)?  "" : "style=\"display:none;\"";
      $excelHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 3)==1)? "" : "style=\"display:none;\"";
      View::set('pdfHidden',$pdfHidden);
      View::set('excelHidden',$excelHidden);
      View::set('tabla',$tabla);
      View::set('tablaVallejo',$tablaVallejo);
      View::set('tablaLiquidos',$tablaLiquidos);
      View::set('tablaDeshidratados',$tablaDeshidratados);
      View::set('tablaProduccion',$tablaProduccion);
      View::set('tablaEnero',$tablaEnero);
      View::set('tablaFebrero',$tablaFebrero);
      View::set('tablaMarzo',$tablaMarzo);
      View::set('tablaAbril',$tablaAbril);
      View::set('tablaMayo',$tablaMayo);
      View::set('tablaJunio',$tablaJunio);
      View::set('tablaJulio',$tablaJulio);
      View::set('tablaAgosto',$tablaAgosto);
      View::set('tablaSeptiembre',$tablaSeptiembre);
      View::set('tablaOctubre',$tablaOctubre);
      View::set('tablaNoviembre',$tablaNoviembre);
      View::set('tablaDiciembre',$tablaDiciembre);
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("aniversarios_all");
    }

    public function generarPDF(){
      $ids = MasterDom::getDataAll('borrar');
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

      $mpdf->WriteHTML($style,1);
      $mpdf->WriteHTML($tabla,2);

      //$nombre_archivo = "MPDF_".uniqid().".pdf";/* se genera un nombre unico para el archivo pdf*/
  	  print_r($mpdf->Output());/* se genera el pdf en la ruta especificada*/
  	  //echo $nombre_archivo;/* se imprime el nombre del archivo para poder retornarlo a CrmCatalogo/index */

      exit;
      //$ids = MasterDom::getDataAll('borrar');
      //echo shell_exec('php -f /home/granja/backend/public/librerias/mpdf_apis/Api.php Antiguedad '.json_encode(MasterDom::getDataAll('borrar')));
    }

    public function generarExcel(){
      $ids = MasterDom::getDataAll('borrar');
      $objPHPExcel = new \PHPExcel();
      $objPHPExcel->getProperties()->setCreator("jma");
      $objPHPExcel->getProperties()->setLastModifiedBy("jma");
      $objPHPExcel->getProperties()->setTitle("Reporte");
      $objPHPExcel->getProperties()->setSubject("Reorte");
      $objPHPExcel->getProperties()->setDescription("Descripcion");
      $objPHPExcel->setActiveSheetIndex(0);

      /*AGREGAR IMAGEN AL EXCEL*/
      //$gdImage = imagecreatefromjpeg('http://52.32.114.10:8070/img/ag_logo.jpg');
      $gdImage = imagecreatefrompng('http://52.32.114.10:8070/img/ag_logo.png');
      // Add a drawing to the worksheetecho date('H:i:s') . " Add a drawing to the worksheet\n";
      $objDrawing = new \PHPExcel_Worksheet_MemoryDrawing();
      $objDrawing->setName('Sample image');$objDrawing->setDescription('Sample image');
      $objDrawing->setImageResource($gdImage);
      //$objDrawing->setRenderingFunction(\PHPExcel_Worksheet_MemoryDrawing::RENDERING_JPEG);
      $objDrawing->setRenderingFunction(\PHPExcel_Worksheet_MemoryDrawing::RENDERING_PNG);
      $objDrawing->setMimeType(\PHPExcel_Worksheet_MemoryDrawing::MIMETYPE_DEFAULT);
      $objDrawing->setWidth(50);
      $objDrawing->setHeight(125);
      $objDrawing->setCoordinates('A1');
      $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());

      $estilo_titulo = array(
        'font' => array('bold' => true,'name'=>'Verdana','size'=>16, 'color' => array('rgb' => 'FEAE41')),
        'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
        'type' => \PHPExcel_Style_Fill::FILL_SOLID
      );

      $estilo_encabezado = array(
        'font' => array('bold' => true,'name'=>'Verdana','size'=>14, 'color' => array('rgb' => 'FEAE41')),
        'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
        'type' => \PHPExcel_Style_Fill::FILL_SOLID
      );

      $estilo_celda = array(
        'font' => array('bold' => false,'name'=>'Verdana','size'=>12,'color' => array('rgb' => 'B59B68')),
        'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER),
        'type' => \PHPExcel_Style_Fill::FILL_SOLID

      );


      $fila = 9;
      $adaptarTexto = true;

      $controlador = "Economicos";
      $columna = array('A','B','C');
      $nombreColumna = array('Id','Nombre','Status');
      $nombreCampo = array('catalogo_departamento_id','nombre','status');

      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$fila, 'Reporte de Departamentos');
      $objPHPExcel->getActiveSheet()->mergeCells('A'.$fila.':'.$columna[count($nombreColumna)-1].$fila);
      $objPHPExcel->getActiveSheet()->getStyle('A'.$fila)->applyFromArray($estilo_titulo);
      $objPHPExcel->getActiveSheet()->getStyle('A'.$fila)->getAlignment()->setWrapText($adaptarTexto);

      $fila +=1;

      /*COLUMNAS DE LOS DATOS DEL ARCHIVO EXCEL*/
      foreach ($nombreColumna as $key => $value) {
        $objPHPExcel->getActiveSheet()->SetCellValue($columna[$key].$fila, $value);
        $objPHPExcel->getActiveSheet()->getStyle($columna[$key].$fila)->applyFromArray($estilo_encabezado);
        $objPHPExcel->getActiveSheet()->getStyle($columna[$key].$fila)->getAlignment()->setWrapText($adaptarTexto);
        $objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($key)->setAutoSize(true);
      }
      $fila +=1; //fila donde comenzaran a escribirse los datos

      /* FILAS DEL ARCHIVO EXCEL */
      if($ids!=''){
        foreach ($ids as $key => $value) {
          $departamento = DepartamentoDao::getByIdReporte($value);
          foreach ($nombreCampo as $llave => $campo) {
            $objPHPExcel->getActiveSheet()->SetCellValue($columna[$llave].$fila, html_entity_decode($departamento[$campo], ENT_QUOTES, "UTF-8"));
            $objPHPExcel->getActiveSheet()->getStyle($columna[$llave].$fila)->applyFromArray($estilo_celda);
            $objPHPExcel->getActiveSheet()->getStyle($columna[$llave].$fila)->getAlignment()->setWrapText($adaptarTexto);
          }
          $fila +=1;
        }
      }else{
        foreach (DepartamentoDao::getAll() as $key => $value) {
          foreach ($nombreCampo as $llave => $campo) {
            $objPHPExcel->getActiveSheet()->SetCellValue($columna[$llave].$fila, html_entity_decode($value[$campo], ENT_QUOTES, "UTF-8"));
            $objPHPExcel->getActiveSheet()->getStyle($columna[$llave].$fila)->applyFromArray($estilo_celda);
            $objPHPExcel->getActiveSheet()->getStyle($columna[$llave].$fila)->getAlignment()->setWrapText($adaptarTexto);
          }
          $fila +=1;
        }
      }

      $objPHPExcel->getActiveSheet()->getStyle('A1:'.$columna[count($columna)-1].$fila)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      for ($i=0; $i <$fila ; $i++) {
        $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(20);
      }

      $objPHPExcel->getActiveSheet()->setTitle('Reporte');

      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="Reporte AG '.$controlador.'.xlsx"');
      header('Cache-Control: max-age=0');
      header('Cache-Control: max-age=1');
      header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
      header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
      header ('Cache-Control: cache, must-revalidate');
      header ('Pragma: public');

      \PHPExcel_Settings::setZipClass(\PHPExcel_Settings::PCLZIP);
      $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
      $objWriter->save('php://output');
    }

    public function alerta($id, $parametro){
      $regreso = "/Economicos/";

      if($parametro == 'add'){
        $mensaje = "Se ha agregado correctamente";
        $class = "success";
      }

      if($parametro == 'edit'){
        $mensaje = "Se ha modificado correctamente";
        $class = "success";
      }

      if($parametro == 'nothing'){
        $mensaje = "Al parecer no intentaste actualizar ningún campo";
        $class = "warning";
      }

      if($parametro == 'delete'){
        $mensaje = "Se ha eliminado el departamento con id {$id}, ya que cambiaste el estatus a eliminado";
        $class = "success";
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

    public function alertas($title, $array, $regreso){
      $mensaje = "";
      foreach ($array as $key => $value) {
        if($value['seccion'] == 2){
          $mensaje .= <<<html
            <div class="alert alert-danger" role="alert">
              <h4>El ID <b>{$value['id']}</b>, no se puede eliminar, ya que esta siendo utilizado por el Catálogo de Gestión Colaboradores</h4>
            </div>
html;
        }

        if($value['seccion'] == 1){
          $mensaje .= <<<html
            <div class="alert alert-success" role="alert">
              <h4>El ID <b>{$value['id']}</b>, se ha eliminado</h4>
            </div>
html;
        }
      }
      View::set('regreso', $regreso);
      View::set('mensaje', $mensaje);
      View::set('titulo', $title);
      View::render("alertas");
    }
}
