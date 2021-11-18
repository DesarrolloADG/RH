<?php
namespace App\controllers;
defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Empleado AS EmpleadoDao;

class Antiguedad extends Controller{

    private $_contenedor;

    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());

        if(Controller::getPermisosUsuario($this->__usuario, "seccion_empresas", 1) ==0)
          header('Location: /Principal/');

    }

    public function getUsuario(){
      return $this->__usuario;
    }

    public function index() {

      $empresas = EmpleadoDao::getAll();
      $usuario = $this->__usuario;

      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::render("empleado_all");
    }

}
