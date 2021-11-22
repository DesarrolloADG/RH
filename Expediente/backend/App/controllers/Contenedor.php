<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\models\General AS GeneralDao;
use \Core\Controller;

//echo dirname(__DIR__);

require_once dirname(__DIR__).'/../public/librerias/mpdf/mpdf.php';
require_once dirname(__DIR__).'/../public/librerias/phpexcel/Classes/PHPExcel.php';

//require_once '/home/granja/backend/public/librerias/mpdf/mpdf.php';
//require_once '/home/granja/backend/public/librerias/phpexcel/Classes/PHPExcel.php';

class Contenedor extends Controller{


    function __construct(){
      parent::__construct();
      //echo "Este esl usuario: {$this->__usuario}+++++";
    }

    public function getUsuario(){
      return $this->__usuario;
    }

    public function header($extra = ''){
        $usuario = $this->__usuario;
        $empresa = Controller::getPermisosUsuario($usuario, "seccion_empresas", 1);
        $empresaAdd = Controller::getPermisosUsuario($usuario, "seccion_empresas", 4);
        $plantas = Controller::getPermisosUsuario($usuario, "seccion_plantas", 1);
        $plantasAdd = Controller::getPermisosUsuario($usuario, "seccion_plantas", 4);

        $departamentos = Controller::getPermisosUsuario($usuario, "seccion_departamentos", 1);
        $departamentosAdd = Controller::getPermisosUsuario($usuario, "seccion_departamentos", 4);

        $puestos = Controller::getPermisosUsuario($usuario, "seccion_puestos", 1);
        $puestosAdd = Controller::getPermisosUsuario($usuario, "seccion_puestos", 4);

        $colaboradores = Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 1);
        $colaboradoresAdd = Controller::getPermisosUsuario($usuario, "seccion_colaboradores", 4);

        $asignarIncentivos = Controller::getPermisosUsuario($usuario, "seccion_incentivosadd", 1);
        $periodo = Controller::getPermisosUsuario($usuario, "seccion_periodo", 1);
        $registroIncidencias = Controller::getPermisosUsuario($usuario, "seccion_registro_incidencias", 1);
        $resumen = Controller::getPermisosUsuario($usuario, "seccion_resumen", 1);
        $prorrateo = Controller::getPermisosUsuario($usuario, "seccion_prorrateo", 1);

        $arr = array($asignarIncentivos,$periodo,$registroIncidencias,$resumen,$prorrateo);
        $activo_menu = array_sum($arr);
        $permisosGlobales = Controller::getPermisosUsuario($usuario, "permisos_globales",7);

        $permisoRH = Controller::getPermisoRecursosHumanos($usuario);

        $admin = GeneralDao::getDatosUsuarioLogeado($usuario);
      
     $header =<<<html
        <!DOCTYPE html>
        <html lang="en">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <!-- Meta, title, CSS, favicons, etc. -->
            <meta charset="utf-8">

            <title>SAIRRHH - ADG</title>
            <link rel="shortcut icon" href="/img/iconlogogranja.png">
            <link href="/css/nprogress.css" rel="stylesheet">
            <link rel="stylesheet" href="/css/tabla/sb-admin-2.css">
            <link rel="stylesheet" href="/css/bootstrap/datatables.bootstrap.css">
            <link rel="stylesheet" href="/css/bootstrap/bootstrap.css">
            <link rel="stylesheet" href="/css/bootstrap/bootstrap-switch.css">
            <link rel="stylesheet" href="/css/validate/screen.css">
            <link rel="stylesheet" href="/css/extra.css" />
            <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
            <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />

            <link href="/css/bootstrap/bootstrap.min.css" rel="stylesheet">
          	<link href="/css/font-awesome.min.css" rel="stylesheet">
            <link href="/css/menu/menu5custom.min.css" rel="stylesheet">
            <link href="/css/green.css" rel="stylesheet">
            <link href="/css/custom.min.css" rel="stylesheet">

            <link href="/librerias/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="/librerias/vintage_flip_clock/jquery.flipcountdown.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
            
           <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
                    
                    </head>
html;
$menu =<<<html
<body class="nav-md">
  <div class="container body">
    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="/Principal/" class="site_title"><i class="fa fa-home"></i> <span>ADG - RH</span></a>
          </div>
          <div class="clearfix"></div>
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="/img/logo.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido</span>
html;
$menu.=<<<html
              <h2>{$usuario}</h2>
            </div>
          </div>
          <br/>
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="glyphicon glyphicon-folder-open"> </i>&nbsp; Catalogos <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
html;

        $RHSeccionUsuario = ($permisoRH == 2) ? "display:none;":"";
        $mostrar = ($colaboradores==1) ? "":"display:none;";
        $agregar = ($colaboradoresAdd==1) ? "":"display:none;";
        $operacionesColaboradores = ($colaboradores==1) ? "":"display:none;";

        $RH = ($permisoRH == 2) ? "":"display:none;";
        $menu.=<<<html
                    <!--li style="{$mostrar}"><a>Colaboradores <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Colaboradores">Mostrar</a></li>
                        <li style="{$agregar}"><a href="/Colaboradores/existente">Agregar</a></li>
                      </ul>
                    </li-->
                    <li style="{$operacionesColaboradores} {$RHSeccionUsuario}"><a href="/Colaboradores/">Colaboradores</a></li>
                    <li style="{$RH}"><a>Colaboradores<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Colaboradores/colaboradoresPropios">Propios</a></li>
                        <li><a href="/Colaboradores/">Todos</a></li>
                      </ul>
                    </li>
                  
html;
$mostrar = ($empresa==1) ? "":"style=\"display:none;\"";
$agregar = ($empresaAdd==1) ? "":"style=\"display:none;\"";
$menu.=<<<html
                    <li {$mostrar}><a a href="/Antiguedad/">Antiguedad Colaboradores</a>
                      
                    </li>
html;

        $menu.=<<<html
                    <li {$mostrar}><a a href="/Competencias/">Catalogo Competencias</a>
                      
                    </li>
html;




$menu.=<<<html
                    
</ul>
                </li>
html;

$OperacionesMostrarIncentivos = ($asignarIncentivos==1) ? "":"display:none;";
$OperacionesMostrarPeriodo= ($periodo==1) ? "":"display:none;";
$OperacionesMostrarRegistroIncidencias= ($registroIncidencias==1) ? "":"display:none;";
$OperacionesMostrarResumen= ($resumen==1) ? "":"display:none;";

$RHSeccionUsuario = ($permisoRH == 2) ? "display:none;":"";
$RH = ($permisoRH == 2) ? "":"display:none;";

if($admin['perfil_id'] == 1){
  $perfilShow = "";
}elseif($admin['perfil_id'] == 6 AND $admin['nombre_planta'] == "XOCHIMILCO"){
  $perfilShow = "";
}else{
  $perfilShow = "display:none;";
}

// 123123
$permisoRHColaboradoresPropios = ($admin['perfil_id'] == 6 || $admin['perfil_id'] == 1) ? "" : "display: none;";
if($admin['perfil_id'] == 6){
  $nombrePerfil = "RH";
}elseif($admin['perfil_id'] == 1){
  $nombrePerfil = "ROOT";
}else{
  $operacionasignarIncentivos = ($asignarIncentivos==1) ? "" : "display:none;";
  $operacionregistroIncidencias = ($registroIncidencias==1) ? "" : "display:none;";
  $OperacionesMostrarProrrateo= ($prorrateo==1) ? "":"display:none;"; //123123123
  $operacionesresumen = ($resumen==1) ? "":"display:none;"; //123123123
  $operacionperiodo = ($periodo==1) ? "" : "display:none;";
}
        $menu.=<<<html
                <li><a><i class="glyphicon glyphicon-wrench"></i> Operaciones <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">

                    <!-- Periodos -->
                   <li><a>Aniversarios<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Aniversarios/">Aniversario ADG</a></li>
                        <li><a href="/Cumpleanos/">Cumpleaños</a></li>
                      </ul>
                   </li>
                   
                   <li><a>Salud y Seguridad<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Accidentes/">Accidentes</a></li>
                        <li><a href="/Incapacidades/">Incapacidades</a></li>
                      </ul>
                   </li>
                   
                    <li><a>Prestaciones<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Vacaciones/">Vacaciones</a></li>
                        <li><a href="/DiasEconomicos/">Días Económicos</a></li>
                      </ul>
                   </li>
                   <li><a>Relaciones Laborales<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Baja/">Procesar Baja</a></li>
                      </ul>
                   </li>
                   
                   <li><a href="/Encuestas/">Encuestas</a></li>
                   <li><a href="/RegistroCapacitaciones/">Registro Capacitaciones</a></li>
</ul>
html;

//$mostrarIncentivos = ($asignarIncentivos==1) ? "":"display:none;";
$menu.=<<<html
                    <!-- INCENTIVOS -->
              
                

                <!--li><a><i class="glyphicon glyphicon-user"></i> Cliente <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="/Cliente/">Lista</a></li>
                    <li><a href="/Cliente/add">Agregar</a></li>
                  </ul>
                </li-->

html;

$global = ($permisosGlobales==1)?"":"display:none;";
$menu.=<<<html
                <li style="{$global}"><a><i class="glyphicon glyphicon-dashboard"></i> Configuracion <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a>Administradores <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Administradores">Mostrar</a></li>
                        <li><a href="/Administradores/add">Agregar</a></li>
                      </ul>
                    </li>
                    <li><a>Perfiles <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/Perfiles">Mostrar</a></li>
                        <li><a href="/Perfiles/add">Agregar</a></li>
                      </ul>
                    </li>
                    <li><a>Log <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/UtileriasLog/">Mostrar</a></li>
                      </ul>
                    </li>
                    <!--li><a>Base de Datos <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="#">Mostrar</a></li>
                        <li><a href="#">Agregar</a></li>
                      </ul>
                    </li-->
                  </ul>
                </li>
 <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    <img src="/img/usr/user.png" alt="">{$usuario}
                     <span class="fa fa-angle-down"></span>
                  </a>
              
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="/Usuario/"> Perfil</a></li>
                  <!--li>
                    <a href="">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configuración</span>
                      </a>
                  </li>
                  <li><a href="">Ayuda</a></li-->
                  <li><a href="/Login/cerrarSession"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesión</a></li>
                </ul>
              </li>
               <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">4</span>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                
                  </ul>
                </li>
            </ul>
            
            
            
          </nav>
        </div>
      </div>

    </div>

html;

    return $header.$extra.$menu;
    }

    public function footer($extra = ''){
        $footer =<<<html
            <footer>
              <div class="pull-right">
                <!--a href="#">AG Alimentos de Granja</a-->
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
          </div>
        <script src="/js/moment/moment.min.js"></script>
        <script src="/js/datepicker/scriptdatepicker.js"></script>
        <script src="/js/datepicker/datepicker2.js"></script>

        <!-- jQuery -->
        <script src="/js/jquery.min.js"></script>
        
        <!-- Bootstrap -->
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/bootstrap/bootstrap-switch.js"></script>
        <script src="/js/nprogress.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="/js/custom.min.js"></script>

        <script src="/js/validate/jquery.validate.js"></script>
        <script src="/js/alertify/alertify.min.js"></script>
        <script src="/js/login.js"></script>

        <script src="/js/tabla/jquery.dataTables.min.js"></script>
        <script src="/js/tabla/dataTables.editor.min.js"></script>
        <script src="/js/tabla/dataTables.bootstrap.min.js"></script>
        <script src="/js/tabla/jquery.tablesorter.js"></script>

        <!-- EXTENCIONES DE DATATABLE() PARA EXPORTAR  -->
        <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js" ></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js" ></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js" ></script>
        <script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js" ></script>

        <script src="/librerias/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <script type="text/javascript" src="/librerias/vintage_flip_clock/jquery.flipcountdown.js"></script>


  </body>
</html>
html;

    return $footer.$extra;
    }

}
