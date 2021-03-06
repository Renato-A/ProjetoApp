<!DOCTYPE html>
<?php 
    include('php/restrito.php');
                //msg de teste 
                //echo $_COOKIE["cookie_pass"];
                //$la=$_COOKIE["cookie_user"];
                //echo $la;
?>
<html lang="pt-BR">

<head>

  		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Manutencao de computadores, smartphones, notebooks e tablets.">
		<meta name="author" content="CJR">

		<title>CJR - Área do cliente</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="js/script.js"></script>
</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand" role="presentation"><a href="./index.html">Home</a></li>
            <li><a href="./area-cliente.php">Área do cliente</a></li>
            <li><a href="./novo-pedido.php">Novo pedido</a></li>
            <li><a href="./conta-cliente.php">Minha conta</a></li>
            <li><a href="./php/restrito.php?out=true">Sair</a></li>
        </ul>
    </nav>
<div class="container"> 
    <ol class="breadcrumb">
    <li><a href="#home1" id="home-tab1" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i></a></li>
    <li><a href="./area-cliente.php">Área do cliente</a></li>
    <li><a href="./novo-pedido.php">Novos pedidos</a></li>
    </ol>
    <div class="page-header">
        <h1>Entre em contato:</h1>
    </div>
    <!--novo pedido-->
    <form  action="javascript:enviarRegisto();">
        <div id="reload" class="form-group ">
            <div class="row">
                <div class="col-xs-12   col-sm-6   col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2  ">
                    <div class="input-group ">
                        <div class="input-group-addon" >Aparelho</div>
                        <select class="form-control" id="aparelho" name="aparelho">
                        <option value="0">selecione</option>
                        <option value="computador">computador</option>
                        <option value="notebook">notebook</option>
                        <option value="smartphone">smartphone</option>
                        <option value="tablet">tablet</option>
                        </select>
                    </div>
                    <br><!--necessário por problema de responsabilidade-->
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 ">
                    <div class="input-group">
                        <div class="input-group-addon">Serviço</div>
                        <select class="form-control" id="servico" name="servico">
                        <option value="0">selecione</option>
                        <option value="formatacao">formatação</option>
                        <option value="limpeza">limpeza</option>
                        <option value="assistencia tecnica">assistência técnica</option>
                        <option value="troca de peca">troca de peça</option>
                        </select>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12  col-sm-12    col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                    <div class="input-group">
                        <div class="input-group-addon">Descrição</div>
                        <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Está com algum problema?" maxlength="100" onKeyDown="textCounter(this.form.descricao,this.form.remLen,100);" onKeyUp="textCounter(this.form.descricao,this.form.remLen,100);"></textarea>
						
						<br>
						<input readonly type="text" name="remLen" class="form-control" maxlength=3 value="100">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-xs-12  col-sm-12  col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
                    <div class="input-group">
                    <button class="btn btn-default" type="submit">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <div class='alert alert-info alert-dismissible ' role='alert'>
                <div id="textDiv"></div>
            </div>
        </div>
        </div>
    </form>
</div>

    


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    //contador do campo descricao
        function textCounter(field, countfield, maxlimit) {
if (field.value.length > maxlimit)
field.value = field.value.substring(0, maxlimit);
else 
countfield.value = maxlimit - field.value.length;
}
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });
    // Disable Google Maps scrolling
    // See http://stackoverflow.com/a/25904582/1607849
    // Disable scroll zooming and bind back the click event
    var onMapMouseleaveHandler = function(event) {
        var that = $(this);
        that.on('click', onMapClickHandler);
        that.off('mouseleave', onMapMouseleaveHandler);
        that.find('iframe').css("pointer-events", "none");
    }
    var onMapClickHandler = function(event) {
            var that = $(this);
            // Disable the click handler until the user leaves the map area
            that.off('click', onMapClickHandler);
            // Enable scrolling zoom
            that.find('iframe').css("pointer-events", "auto");
            // Handle the mouse leave event
            that.on('mouseleave', onMapMouseleaveHandler);
        }
        // Enable map zooming with mouse scroll when the user clicks the map
    $('.map').on('click', onMapClickHandler);
    </script>

</body>

</html>
