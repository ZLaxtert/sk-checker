<?php 
	session_start(); 
        require 'server.php';

	if (!isset($_SESSION['username'])) {
		
		header('location: ../login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../login.php");
	}
	
	$username = $_SESSION['username'];
$qUser = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
$fUser = mysqli_fetch_assoc($qUser);
              
             
?>

<!DOCTYPE html>
<html lang="en">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	
    <title>BlackNetID | Checker</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="https://blacknetid.my.id/img/one.gif">
    <script src='https://www.google.com/recaptcha/api.js?hl=en'></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic" rel="stylesheet">
    <link href="https://blacknetid.my.id/cctest/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://blacknetid.my.id/css/dist/sweetalert.css">
 <script type="text/javascript" src="https://blacknetid.my.id/css/dist/sweetalert.min.js"></script>

		<link rel="stylesheet" type="text/css" href="https://blacknetid.my.id/cctest/css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="https://blacknetid.my.id/cctest/css/style.css" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
	</head>
	<body>
		<div class="row">
			<div class="col-sm-3">
			    <div class="sidebar-nav">
			      <div class="navbar navbar-default" role="navigation">
			        <div class="navbar-header">
			          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			          </button>
			          <span class="visible-xs navbar-brand">BlackNetID | Checker</span>
			        </div>
			        <div class="navbar-collapse collapse sidebar-navbar-collapse">
			          <ul class="nav navbar-nav">
			            <li class="active"><a href="https://blacknetid.my.id/index.php">Dashboard</a></li>
			            <li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Checker <b class="caret"></b></a>
			              <ul class="dropdown-menu">
			                <li><a href="#">Cc Gate1</a></li>
			                <li><a href="#">Cc Gate2</a></li>
			                <li><a href="#">Cc Gate3</a></li>
			                <li><a href="#">Cc Gate4</a></li>
			            </li>
			          </ul>
			            <li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Tools <b class="caret"></b></a>
			              <ul class="dropdown-menu">
			                <li><a href="#">Cc-Gen1</a></li>
			                <li><a href="#">Cc-Gen2</a></li>
			                <li><a href="#">SK Checker</a></li>
			                <li><a href="#">Validator Amazon</a></li>
			                <li><a href="#">Validator Apple</a></li>
			                <li><a href="#">Validator PayPal</a></li>
			                <li><a href="#">Validator Netflix</a></li>
			             </li>
			           </ul>
			            <li class="dropdown">
			              <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
			              <ul class="dropdown-menu">
			              <li><a href="#"><?= $username; ?></a></li>
			                <li><a href="#">(<?= $fUser['level']; ?>)</a></li>
			                <li><a href="#"><span class="fas fa-dollar-sign"> <?= number_format($fUser['saldo'],0,',','.'); ?></a></li>
			                <li class="divider"></li>
			                <li class="dropdown-header">Lainnya</li>
			                <li class="nav-link"><a href="../index.php?logout='1'" class="fas fa-door-open">Log out</a></li>
                                         
			              </ul>
			            </li>
			            
			           </ul>
			        </div><!--/.nav-collapse -->
			      </div>
			    </div>
			  </div>
			
		</div>
	</div>
      
      <!-- End Navbar -->

<div class="col-sm-9">
<center>
        <div class="row col-md-12">
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
<div class="card col-sm-12">
  <h2 class="card-body"><strong><a href="https://t.me/BlackNetID" style="text-javascript;color:black;">Secret Key Checker</a></strong></h2>
  <br>
  </br>
  <div class="card-body">
<div class="md-form">
    <div class="col-md-12">
        <span>LIVE:</span>&nbsp<span id="cLive" class="label label-success">0</span>
    <span>DIE:</span>&nbsp<span id="cDie" class="label label-danger"> 0</span>
    <span>LOAD:</span>&nbsp<span id="total" class="label label-info">0</span>
      <br>
      <textarea type="text" style="text-align: center;" id="lista" class="md-textarea form-control" rows="4" placeholder="Your Secret Key"></textarea>&nbsp;<br>
  <center>
 <button class="btn btn-primary" style="width: 200px; outline: none;" id="testar" onclick="enviar()" >START</button>
</center>
 </center>
</div>
</div>
<br>
</br>

</div>


</div>
</div>
</div>
</div>
</div>
    </div>
&nbsp;<br>&nbsp;<br>&nbsp;<br>
<div class="col-sm-9">
<div class="col-md-12">
<div class="container">
<div style="display: none;">
    </div>
  <div class="card-body">
  <span id=".aprovadas" class="copier" onclick=selectText('aprovadas') title="Copy all valid account">
    <h6 style="font-weight: bold;" class="card-title">LIVE - <span  id="cLive2" class="label label-success">0</span></h6>
    <div id="bode2"><span id=".aprovadas" class="aprovadas"></span>
    </div>
  </div>
</div>
</div>

<br>
<br>

<div class="col-md-12">
<div class="container">
<div style="display: none;">
    </div>
<div class="card-body">
<span id=".reprovadas" class="copier" onclick=selectText('reprovadas') title="Copy all valid account">
    <h6 style="font-weight: bold;" class="card-title">DIE - <span id="cDie2" class="label label-danger">0</span></h6>
    <div class="container" id="bode2"><span id=".reprovadas" class="reprovadas"></span>
    </div>
  </div>
</div>
</div>
  </div>
</div>
</div>
<br>
</center>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js" type="text/javascript"></script>
<script title="ajax do checker">
    function enviar() {
        var linha = $("#lista").val();
        var linhaenviar = linha.split("\n");
        var total = linhaenviar.length;
        var ap = 0;
        var ed = 0;
        var rp = 0;
        linhaenviar.forEach(function(value, index) {
            setTimeout(
                function() {
                    $.ajax({
                        url: 'api.php?sk=' + value ,
                        type: 'GET',
                        async: true,
                        success: function(resultado) {
                            if (resultado.match("LIVE")) {
                                removelinha();
                                ap++;
                                aprovadas(resultado + "");
                            }
                               else if(resultado.match("DEAD")) {
                                removelinha();
                                rp++;
                                reprovadas(resultado + "");
                            }
                            $('#carregadas').html(total);
                            var fila = parseInt(ap) + parseInt(rp);
                            $('#cLive').html(ap);
                            $('#cWarn').html(ed);
                            $('#cDie').html(rp);
                            $('#total').html(fila);
                            $('#cLive2').html(ap);
                            $('#cWarn2').html(ed);
                            $('#cDie2').html(rp);
                        }
                    });
                }, 2500 * index);
        });
    }
    function aprovadas(str) {
        $(".aprovadas").append(str + "<br>");
    }
    function reprovadas(str) {
        $(".reprovadas").append(str + "<br>");
    }
    function removelinha() {
        var lines = $("#lista").val().split('\n');
        lines.splice(0, 1);
        $("#lista").val(lines.join("\n"));
    }
</script>


<script type="text/javascript" src="https://blacknetid.my.id/js/jquery.min.js"></script>
		<script type="text/javascript" src="https://blacknetid.my.id/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js">
<script type="text/javascript" src="https://blacknetid.my.id/cctest/js/jquery.js"></script>
<script type="text/javascript" src="https://blacknetid.my.id/cctest/js/jquery-ui.js"></script>
	</body>
</html>
	
