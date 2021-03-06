<?php
namespace Core;
defined("APPPATH") OR die("Access denied");

use \Core\App;

Class MasterDom{

static $_dominio = 'coinkcoink.com';
static $_data;
static $_imgProductos = '/img/';
static $_imgTiendas = '/tiendas/';
static $_imgMarca = 'https://s3-us-west-2.amazonaws.com/ecommercee/';

  public function curlPost($data){

        $url = 'localhost/testing_prueba.php';

        $dato = http_build_query($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dato);
        //execute
        $output = curl_exec($ch);
        if ($output === FALSE) {
            echo "cURL Error: " . curl_error($ch);
            return -1;
        }
        curl_close($ch);
        return $output;
  }

  public static function procesoExcel($method='getColumna', $nombre = false, $columna = false){
        $complemento = '';
        if($method == 'getColumna' || $method == 'completeArray')
            //$complemento = "ProcesoExcel::".$method."(\"".$nombre."\",\"".$columna."\")";
            $complemento = "ProcesoExcel::$method('$nombre','$columna')";
        else
            //$complemento = "ProcesoExcel::".$method."(\"".$nombre."\")";
            $complemento = "ProcesoExcel::$method.('$nombre')";

        $ruta = dirname(__FILE__).'\..\App\controllers\ProcesoExcel.php';
            //$comando = "php -r"." 'include \"/home/smsmkt/App/PHPExcel/ProcesoExcel.php\"; ".$complemento.";'";
        //$comando = "C:\wamp\bin\php\php5.6.31\php.exe -r"." 'include \"$ruta\"; ".$complemento.";'";
        $comando = "C:\wamp\bin\php\php5.6.31\php.exe -r"." \"include '$ruta'; ".$complemento.";\"";
        //echo $comando;
            $excel = shell_exec($comando);

        return $excel;
    }

  public static function moverDirectorio($file, $customer, $preijo = 'cso'){

        $filename = $file['name'];
        if(empty($filename) || empty($customer))
            return false;

        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $ext = strtolower($ext);

        $name = $preijo.'-'.strtotime("now").'-'.$customer.'.'.$ext;
	$target = dirname(__FILE__).'/../App/PHPExcel/archivos/'.$name;
        //$target = self::$_target.$name;
        if(move_uploaded_file($file['tmp_name'], $target)){
               return array('ext'=>$ext, 'nombre'=>$name);
        }else{
               return false;
        }
    }

  function getIPClient() {
    if (isset($_SERVER["HTTP_CLIENT_IP"])){
        return $_SERVER["HTTP_CLIENT_IP"];
    }elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
        return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }elseif (isset($_SERVER["HTTP_X_FORWARDED"])){
        return $_SERVER["HTTP_X_FORWARDED"];
    }elseif (isset($_SERVER["HTTP_FORWARDED_FOR"])){
        return $_SERVER["HTTP_FORWARDED_FOR"];
    }elseif (isset($_SERVER["HTTP_FORWARDED"])){
        return $_SERVER["HTTP_FORWARDED"];
    }else{
        return $_SERVER["REMOTE_ADDR"];
    }
  }

    public static function getSesion($campo){
        return $_SESSION[$campo];
    }

    public static function getPathImage(){
      return "http://{$_SERVER['HTTP_HOST']}/GetImage/format/";
    }

    public static function userAgent($redireccin = 'movil'){

	$useragent=$_SERVER['HTTP_USER_AGENT'];

	if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){

	    $uri = ($_SERVER['REQUEST_URI'] == '') ? '/ofertas/' : $_SERVER['REQUEST_URI'];
	    header("Location: http://m.coinkcoink.com.mx$uri");
	    exit();
	}
    }

    public static function userAgentMovil($redireccin = 'movil'){

        $useragent=$_SERVER['HTTP_USER_AGENT'];

        if(!preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){

            $uri = ($_SERVER['REQUEST_URI'] == '') ? '/ofertas/' : $_SERVER['REQUEST_URI'];
            header("Location: http://www.coinkcoink.com.mx$uri");
            exit();
        }
    }

    public static function mensajeError(){
	$html=<<<html
<META HTTP-EQUIV="Refresh" Content="2; URL=/">
<section class="container">
        <section class="row">
        <section class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h1>Lo sentimos ocurri?? un error. Entre las causas el registro puede estar repetido, algun error en la base de datos, etc;  Favor de contactar al departamento de sistemas.</h1>
            <img class="img-responsive center-block" src="/img/not_found.png" alt=""/>
            <h2><a href="/">Regresar</a></h2>
        </section>
    </section>
</section>
html;
	return $html;
    }

    public static function setTituloIdWeb($titulo, $id){
	return trim(self::setTituloWeb($titulo).'-'.$id);
    }

    public static function getIdTitle($titulo){
	return array_pop(explode('-',$titulo));
    }

    public static function noAcentos($string){
        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??', '??'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extra??o
        $string = str_replace(
        array("\\", "??", "??", "~",
             "#", "@", "|", "!", "\"",
             "??", "$", "%", "&", "/",
             "(", ")", "?", "'", "??",
             "??", "[", "^", "`", "]",
             "+", "}", "{", "??", "??",
             ">", "< ", ";", ",", ":",
             "."),
             '',
             $string
        );

        return $string;
    }

    public static function limpiaCadena($string){

	$string = preg_replace(
	array('/\bante\b/','/\bbajo\b/','/\bcabe\b/','/\bcon\b/','/\bcontra\b/','/\bde\b/',
	      '/\bdesde\b/','/\ben\b/','/\bentra\b/','/\bhacia\b/','/\bhasta\b/','/\bpara\b/',
	      '/\bpor\b/','/\bsegun\b/','/\bsin\b/','/\bsobre\b/','/\btras\b/','/\bnada\b/'),
	    '',
	    $string
	);

	$string = preg_replace(
        array('/\bel\b/','/\bla\b/','/\blo\b/','/\bal\b/','/\blos\b/','/\blas\b/','/\bdel\b/','/\bun\b/','/\bunos\b/','/\buna\b/','/\bunas\b/',
	       '/\bpor\b/','/\bsegun\b/','/\bsin\b/','/\bsobre\b/','/\besta\b/','/\bestas\b/','/\bese\b/','/\besos\b/'),
            '',
            $string
        );

	$string = preg_replace(
        array('/\by\b/','/\bcomo\b/','/\bpara\b/','/\bcon\b/','/\bdonde\b/','/\bquien\b/','/\bcuando\b/','/\bque\b/','/\bcual\b/','/\bcuales\b/','/\btodo\b/',
               '/\bpara que\b/','/\bporque\b/','/\bpor que\b/','/\bsobre\b/','/\ba\b/','/\be\b/','/\bi\b/','/\bo\b/','/\bu\b/'),
            '',
            $string
        );

	return $string;
    }

    public static function noSoloAcentos($string){
        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??', '??'),
            array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??', '??', '??', '??', '??'),
            array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
            $string
        );

        $string = str_replace(
            array('??', '??', '??', '??'),
            array('n', 'N', 'c', 'C',),
            $string
        );

        return $string;
    }

    public static function getTituloWeb($value){
        return str_replace('-',' ',$value);
    }

    public static function setTituloWeb($value){
        return strtolower(self::noAcentos(str_replace(' ','-',$value)));
    }

    public static function getUriPage(){
        return $_SERVER['REQUEST_URI'];
    }

    public static function getParams(){
        return self::$_data;
    }

    /*SHOW DATA VIEW*/
    public static function setParams($key, $value){
        self::$_data[$key] = $value;
    }

    public static function getData($value){

        if(!self::whiteListeIp())
            return false;

        $data = '';
        if(isset($_GET[$value])){
            $data = self::cleanData($_GET[$value]);
        }else if(isset($_POST[$value])){
            $data = self::cleanData($_POST[$value]);
        }else{
          if(isset($_FILES[$value])){
            $data = $_FILES[$value];
          }else{
            $data = '';
          }
        }
        return $data;
    }

    public static function getDataAll($value){

	if(!self::whiteListeIp())
            return false;

        $data = '';
        if(isset($_GET[$value]))
            $data = $_GET[$value];
        else if(isset($_POST[$value]))
            $data = $_POST[$value];
        else
            $data = '';

        return $data;
    }

    public static function cleanData($value){

        $clean = strip_tags($value);
        return htmlentities($clean);
    }

    public static function setCookies($name, $value, $dia = 10){

        if(!self::whiteListeIp())
            return false;

        $dias = (86400 * $dia);
        try{
            setcookie( $name, $value, time() + ($dias), "/", $_SERVER["HTTP_HOST"], isset($_SERVER["HTTPS"]), true);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public static function getCookies($value){

        if(!self::whiteListeIp())
            return false;

        if(isset($_COOKIE[$value]))
            return $_COOKIE[$value];

        return false;
    }

    public static function deleteCookies($value){

        if(!self::whiteListeIp())
            return false;

        try{
            unset($_COOKIE[$value]);
            setcookie($value, '', time() - 86400, "/", $_SERVER["HTTP_HOST"], isset($_SERVER["HTTPS"]), true);
	unset($_COOKIE[$value]);
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public static function setParamSecure($value){

	$string = 'COINK'.$value.'COINK'.date('Y-m-d').'COINK';
	$str = base64_encode($string);

	return $str;
    }

    public static function getParamSecure($value){

	if($value == '')
	    return false;
	$string = base64_decode($value);
	$str = explode('COINK',$string);
	$key = (int)$str[1];
	$fecha = (string)$str[2];
	if(!$key)
	    return false;

	if((strtotime($fecha) >= strtotime('-1 month')) && strtotime($fecha) <= strtotime(date('Y-m-d')))
	    $validate = true;
	else
	    return false;

	return $key;
    }

    /**
    * Unaccent the input string string. An example string like `???????????????????????`
    * will be translated to `AOeyIOzoBY`. More complete than :
    *   strtr( (string)$str,
    *          "??????????????????????????????????????????????????????????????????????????????????????????????????????????",
    *          "aaaaaaaaaaaaooooooooooooeeeeeeeecciiiiiiiiuuuuuuuuynn" );
    *
    * @param $str input string
    * @param $utf8 if null, function will detect input string encoding
    * @return string input string without accent
    */
    public static function removeAccents( $str, $utf8=true ){
    $str = (string)$str;
    if( is_null($utf8) ) {
        if( !function_exists('mb_detect_encoding') ) {
            $utf8 = (strtolower( mb_detect_encoding($str) )=='utf-8');
        } else {
            $length = strlen($str);
            $utf8 = true;
            for ($i=0; $i < $length; $i++) {
                $c = ord($str[$i]);
                if ($c < 0x80) $n = 0; # 0bbbbbbb
                elseif (($c & 0xE0) == 0xC0) $n=1; # 110bbbbb
                elseif (($c & 0xF0) == 0xE0) $n=2; # 1110bbbb
                elseif (($c & 0xF8) == 0xF0) $n=3; # 11110bbb
                elseif (($c & 0xFC) == 0xF8) $n=4; # 111110bb
                elseif (($c & 0xFE) == 0xFC) $n=5; # 1111110b
                else return false; # Does not match any model
                for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
                    if ((++$i == $length)
                        || ((ord($str[$i]) & 0xC0) != 0x80)) {
                        $utf8 = false;
                        break;
                    }

                }
            }
        }

    }

    if(!$utf8)
        $str = utf8_encode($str);
    $transliteration = array(
    '??' => 'I', '??' => 'O','??' => 'O','??' => 'U','??' => 'a','??' => 'a',
    '??' => 'i','??' => 'o','??' => 'o','??' => 'u','??' => 's','??' => 's',
    '??' => 'A','??' => 'A','??' => 'A','??' => 'A','??' => 'A','??' => 'A',
    '??' => 'A','??' => 'A','??' => 'A','??' => 'A','??' => 'C','??' => 'C',
    '??' => 'C','??' => 'C','??' => 'C','??' => 'D','??' => 'D','??' => 'E',
    '??' => 'E','??' => 'E','??' => 'E','??' => 'E','??' => 'E','??' => 'E',
    '??' => 'E','??' => 'E','??' => 'G','??' => 'G','??' => 'G','??' => 'G',
    '??' => 'H','??' => 'H','??' => 'I','??' => 'I','??' => 'I','??' => 'I',
    '??' => 'I','??' => 'I','??' => 'I','??' => 'I','??' => 'I','??' => 'J',
    '??' => 'K','??' => 'K','??' => 'K','??' => 'K','??' => 'K','??' => 'L',
    '??' => 'N','??' => 'N','??' => 'N','??' => 'N','??' => 'N','??' => 'O',
    '??' => 'O','??' => 'O','??' => 'O','??' => 'O','??' => 'O','??' => 'O',
    '??' => 'O','??' => 'R','??' => 'R','??' => 'R','??' => 'S','??' => 'S',
    '??' => 'S','??' => 'S','??' => 'S','??' => 'T','??' => 'T','??' => 'T',
    '??' => 'T','??' => 'U','??' => 'U','??' => 'U','??' => 'U','??' => 'U',
    '??' => 'U','??' => 'U','??' => 'U','??' => 'U','??' => 'W','??' => 'Y',
    '??' => 'Y','??' => 'Y','??' => 'Z','??' => 'Z','??' => 'Z','??' => 'a',
    '??' => 'a','??' => 'a','??' => 'a','??' => 'a','??' => 'a','??' => 'a',
    '??' => 'a','??' => 'c','??' => 'c','??' => 'c','??' => 'c','??' => 'c',
    '??' => 'd','??' => 'd','??' => 'e','??' => 'e','??' => 'e','??' => 'e',
    '??' => 'e','??' => 'e','??' => 'e','??' => 'e','??' => 'e','??' => 'f',
    '??' => 'g','??' => 'g','??' => 'g','??' => 'g','??' => 'h','??' => 'h',
    '??' => 'i','??' => 'i','??' => 'i','??' => 'i','??' => 'i','??' => 'i',
    '??' => 'i','??' => 'i','??' => 'i','??' => 'j','??' => 'k','??' => 'k',
    '??' => 'l','??' => 'l','??' => 'l','??' => 'l','??' => 'l','??' => 'n',
    '??' => 'n','??' => 'n','??' => 'n','??' => 'n','??' => 'n','??' => 'o',
    '??' => 'o','??' => 'o','??' => 'o','??' => 'o','??' => 'o','??' => 'o',
    '??' => 'o','??' => 'r','??' => 'r','??' => 'r','??' => 's','??' => 's',
    '??' => 't','??' => 'u','??' => 'u','??' => 'u','??' => 'u','??' => 'u',
    '??' => 'u','??' => 'u','??' => 'u','??' => 'u','??' => 'w','??' => 'y',
    '??' => 'y','??' => 'y','??' => 'z','??' => 'z','??' => 'z','??' => 'A',
    '??' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A',
    '???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A',
    '???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A','???' => 'A',
    '???' => 'A','???' => 'A','???' => 'A','??' => 'B','??' => 'G','??' => 'D',
    '??' => 'E','??' => 'E','???' => 'E','???' => 'E','???' => 'E','???' => 'E',
    '???' => 'E','???' => 'E','???' => 'E','??' => 'Z','??' => 'I','??' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I',
    '??' => 'T','??' => 'I','??' => 'I','??' => 'I','???' => 'I','???' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I','???' => 'I',
    '???' => 'I','???' => 'I','???' => 'I','??' => 'K','??' => 'L','??' => 'M',
    '??' => 'N','??' => 'K','??' => 'O','??' => 'O','???' => 'O','???' => 'O',
    '???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O','??' => 'P',
    '??' => 'R','???' => 'R','??' => 'S','??' => 'T','??' => 'Y','??' => 'Y',
    '??' => 'Y','???' => 'Y','???' => 'Y','???' => 'Y','???' => 'Y','???' => 'Y',
    '???' => 'Y','???' => 'Y','??' => 'F','??' => 'X','??' => 'P','??' => 'O',
    '??' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O',
    '???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O',
    '???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O','???' => 'O',
    '???' => 'O','??' => 'a','??' => 'a','???' => 'a','???' => 'a','???' => 'a',
    '???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a',
    '???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a',
    '???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a','???' => 'a',
    '???' => 'a','???' => 'a','???' => 'a','??' => 'b','??' => 'g','??' => 'd',
    '??' => 'e','??' => 'e','???' => 'e','???' => 'e','???' => 'e','???' => 'e',
    '???' => 'e','???' => 'e','???' => 'e','??' => 'z','??' => 'i','??' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','??' => 't','??' => 'i',
    '??' => 'i','??' => 'i','??' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i',
    '???' => 'i','???' => 'i','???' => 'i','???' => 'i','???' => 'i','??' => 'k',
    '??' => 'l','??' => 'm','??' => 'n','??' => 'k','??' => 'o','??' => 'o',
    '???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o',
    '???' => 'o','??' => 'p','??' => 'r','???' => 'r','???' => 'r','??' => 's',
    '??' => 's','??' => 't','??' => 'y','??' => 'y','??' => 'y','??' => 'y',
    '???' => 'y','???' => 'y','???' => 'y','???' => 'y','???' => 'y','???' => 'y',
    '???' => 'y','???' => 'y','???' => 'y','???' => 'y','???' => 'y','???' => 'y',
    '???' => 'y','???' => 'y','??' => 'f','??' => 'x','??' => 'p','??' => 'o',
    '??' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o',
    '???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o',
    '???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o',
    '???' => 'o','???' => 'o','???' => 'o','???' => 'o','???' => 'o','??' => 'A',
    '??' => 'B','??' => 'V','??' => 'G','??' => 'D','??' => 'E','??' => 'E',
    '??' => 'Z','??' => 'Z','??' => 'I','??' => 'I','??' => 'K','??' => 'L',
    '??' => 'M','??' => 'N','??' => 'O','??' => 'P','??' => 'R','??' => 'S',
    '??' => 'T','??' => 'U','??' => 'F','??' => 'K','??' => 'T','??' => 'C',
    '??' => 'S','??' => 'S','??' => 'Y','??' => 'E','??' => 'Y','??' => 'Y',
    '??' => 'A','??' => 'B','??' => 'V','??' => 'G','??' => 'D','??' => 'E',
    '??' => 'E','??' => 'Z','??' => 'Z','??' => 'I','??' => 'I','??' => 'K',
    '??' => 'L','??' => 'M','??' => 'N','??' => 'O','??' => 'P','??' => 'R',
    '??' => 'S','??' => 'T','??' => 'U','??' => 'F','??' => 'K','??' => 'T',
    '??' => 'C','??' => 'S','??' => 'S','??' => 'Y','??' => 'E','??' => 'Y',
    '??' => 'Y','??' => 'd','??' => 'D','??' => 't','??' => 'T','???' => 'a',
    '???' => 'b','???' => 'g','???' => 'd','???' => 'e','???' => 'v','???' => 'z',
    '???' => 't','???' => 'i','???' => 'k','???' => 'l','???' => 'm','???' => 'n',
    '???' => 'o','???' => 'p','???' => 'z','???' => 'r','???' => 's','???' => 't',
    '???' => 'u','???' => 'p','???' => 'k','???' => 'g','???' => 'q','???' => 's',
    '???' => 'c','???' => 't','???' => 'd','???' => 't','???' => 'c','???' => 'k',
    '???' => 'j','???' => 'h'
    );
    $str = str_replace( array_keys( $transliteration ),
                        array_values( $transliteration ),
                        $str);
    return $str;
    }

    public static function ipCoink(){

	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ips = explode(' ', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $ip = count($ips) > 0 ? $ips[1] : $ips;
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

	return $ip;
    }

    public static function onlyUri($string){

        if(preg_match("/\?(.*)/i",$string)){
            preg_match("/(.*)\?(.*)/i",$string,$nuevo);
            return $nuevo[1];
        }else
            return $string;
    }

    public static function whiteListeIp(){

        return true;

        $form_uris = array(
                'ecommerce.coinkcoink.com'
        );

        if(isset($_SERVER['HTTP_REFERER']) OR isset($_SERVER['SERVER_NAME'])) {
            if(!in_array($_SERVER['HTTP_REFERER'], $form_uris))
                return false;
        }
        return true;
    }

    public static function procesoAcentos($string){

	if(!self::whiteListeIp())
            return false;

	$str = utf8_encode(self::noSoloAcentos(self::getDataAll($string)));
	$str = htmlentities(self::getDataAll($string), ENT_QUOTES,'UTF-8');

	return $str;
    }

    public static function procesoAcentosNormal($string){

	if(!self::whiteListeIp())
            return false;

        $str = htmlentities($string, ENT_QUOTES,'UTF-8');

        return $str;
    }

    public static function regresoAcentos($param){

	return html_entity_decode($param);
    }

    public function reformatDate($date) {
        $arr = explode('/', $date);
        $newDate = $arr[2].'-'.$arr[1].'-'.$arr[0];
        return $newDate;
    }

    /*
        Obtener la fecha para procesarla texto 
        Ejm: 2017-11-01 a Lunes 01 de septiembre 2017 
    */
    public static function getFecha($fecha){
        $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
        $meses = array(1=>'enero',2=>'febrero',3=>'marzo',4=>'abril',5=>'mayo',6=>'junio',7=>'julio',8=>'agosto',9=>'septiembre',10=>'octubre',11=>'noviembre',12=>'diciembre');
            $getAnio = date('o', strtotime($fecha));
            $getMes = date("m",strtotime($fecha));
            $getDia = $dias[date('N', strtotime($fecha))];
            $dia = explode("-", $fecha);

            foreach ($meses as $key => $value) {
                if($key == $getMes)
                    $mes = $value;
            }

        return " {$getDia} {$dia[2]} de {$mes} del {$getAnio} ";
    }

    public static function alertas($caso = 'error_general', $url = '/menu', $titulo = 'Carrier', $texto = ''){

        $class = 'danger';
        $mensaje = '';
        if($caso == 'success_add'){
            $mensaje = 'Success.';
            $class = 'success';
        }elseif($caso == 'error_general')
            $mensaje = 'Lo sentimos ocurri&oacute; un error. Entre las causas el registro puede estar repetido, algun error en la base de datos, etc;  Favor de contactar al departamento de sistemas';
        elseif($caso == 'error_carrier')
            $mensaje = 'Ocurri&oacute; un error en reinicio de plataforma.';
        elseif($caso == 'personal')
        $mensaje = $texto;
        else
            $mensaje = 'Ocurri&oacute; algo inesperado.';

        View::set('regreso',$url);
        View::set('class', $class);
        View::set('titulo',$titulo);
        View::set('mensaje', $mensaje);
        View::render("alertas");
        exit();
    }
}
