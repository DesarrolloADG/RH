<?php
    echo $header;
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/iconlogogranja.png">
    <title>Login | ADG </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<div  id="particles-js">
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <div style="text-align: center;">
                    <img  src="/img/logogranja.png" alt="Login">
                </div>
                <br>
                <form id="login" action="/Login/crearSession" method="POST" class="form-horizontal">
                    <h1 style="color: #ed9f34; font-size: 30px; text-align: center;">Iniciar Sesión</h1>
                    <div class="col-md-1 col-sm-1 col-xs-1"><span id="availability"> </span></div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" name="usuario" id="usuario" class="form-control col-md-6 col-xs-12" placeholder="Usuario" required="">
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="password" name="password" id="password" class="form-control col-md-5 col-xs-12" placeholder="Contraseña" required="" >
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <button type="button" id="btnEntrar" class="btn btn-warning col-md-4 col-sm-4 col-xs-4 pull-right">Entrar <i class="glyphicon glyphicon-log-in"></i></button>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> Alimentos De La Granja</h1>
                            <p>© 2021 Todos los derechos reservados, Alimentos De La Granja, usted acepta los terminos de Privacidad y Condiciones al loguearse al sistema</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>

    </div>
</div>


<?php echo $footer; ?>

