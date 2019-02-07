<?php

require_once 'app/config/config.php';
require_once 'app/modules/hg-api.php';

$hg      = new HG_API(HG_API_KEY);
$dollar  = $hg->dollar_quotation();  //Dollar
$euro    = $hg->euro_quotation();    //Euro
$libra   = $hg->libra_quotation();   //Pound Sterling
$peso    = $hg->peso_quotation();    //Argentine Peso

if ($hg->is_error() == false):
	$dollar_variation = ($dollar['variation'] < 0 ? 'down' : 'up');
	$euro_variation   = ($euro['variation']   < 0 ? 'down' : 'up');
	$libra_variation  = ($libra['variation']  < 0 ? 'down' : 'up');
	$peso_variation   = ($peso['variation']   < 0 ? 'down' : 'up');
endif;
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="/favicon.ico">
    <!-- Bootstrap CSS -->
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <title>Cotação De Moedas</title>
  </head>
  <body>

   <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Cotação De Moedas</h5>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">COTAÇÕES</h1>
      <p class="lead">Aqui você pode ver cotações das principais moedas em tempo real</p>
    </div>

  	<div class="container">
      <div class="row">
      	<div class="col-6 col-sm-3 text-center">
      		<div class="card mb-4 shadow-sm">
      			<div class="card-header">
      				<h4 class="my-0 font-weight-normal">USD Dólar</h4>
      			</div>
      			<?php if ($hg->is_error() == false): ?>
      			<div class="card-body">
      				<h4 class="card-title pricing-card-title"><i class="fa fa-chevron-<?php echo ($dollar_variation); ?>"></i> R$ <?php echo (number_format($dollar['buy'],3, ',', '.')); ?></h4>
      				<ul class="list-unstyled mt-3 mb-4">
      					<li class="variation-color"><p class="<?php echo ($dollar_variation); ?>"><?php echo $dollar['variation']; ?> %</p></li>
      				</ul>
      			</div>
      		    <?php else: ?>
      		    <div class="card-body">
      		        <p><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>   	
      		    </div>	
      		<?php endif; ?>
      		</div>
      	</div>

      	<div class="col-6 col-sm-3 text-center">
      		<div class="card mb-4 shadow-sm">
      			<div class="card-header">
      				<h4 class="my-0 font-weight-normal">EUR Euro</h4>
      			</div>
      			<?php if ($hg->is_error() == false): ?>
      			<div class="card-body">
      				<h4 class="card-title pricing-card-title"><i class="fa fa-chevron-<?php echo ($euro_variation); ?>"></i> R$ <?php echo (number_format($euro['buy'],3, ',', '.')); ?></h4>
      				<ul class="list-unstyled mt-3 mb-4">
      					<li class="variation-color"><p class="<?php echo ($euro_variation); ?>"><?php echo $euro['variation']; ?> %</p></li>
      				</ul>
      			</div>
      		    <?php else: ?>
      		    <div class="card-body">
      		        <p><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>   	
      		    </div>	
      		<?php endif; ?>
      		</div>
      	</div>

      	<div class="col-6 col-sm-3 text-center">
      		<div class="card mb-4 shadow-sm">
      			<div class="card-header">
      				<h4 class="my-0 font-weight-normal">GBP Libra</h4>
      			</div>
      			<?php if ($hg->is_error() == false): ?>
      			<div class="card-body">
      				<h4 class="card-title pricing-card-title"><i class="fa fa-chevron-<?php echo ($libra_variation); ?>"></i> R$ <?php echo (number_format($libra['buy'],3, ',', '.')); ?></h4>
      				<ul class="list-unstyled mt-3 mb-4">
      					<li class="variation-color"><p class="<?php echo ($libra_variation); ?>"><?php echo $libra['variation']; ?> %</p></li>
      				</ul>
      			</div>
      		    <?php else: ?>
      		    <div class="card-body">
      		        <p><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>   	
      		    </div>	
      		<?php endif; ?>
      		</div>
      	</div>

      	<div class="col-6 col-sm-3 text-center">
      		<div class="card mb-4 shadow-sm">
      			<div class="card-header">
      				<h4 class="my-0 font-weight-normal">ARS Peso</h4>
      			</div>
      			<?php if ($hg->is_error() == false): ?>
      			<div class="card-body">
      				<h4 class="card-title pricing-card-title"><i class="fa fa-chevron-<?php echo ($peso_variation); ?>"></i> R$ <?php echo (number_format($peso['buy'],3, ',', '.')); ?></h4>
      				<ul class="list-unstyled mt-3 mb-4">
      					<li class="variation-color"><p class="<?php echo ($peso_variation); ?>"><?php echo $peso['variation']; ?> %</p></li>
      				</ul>
      			</div>
      		    <?php else: ?>
      		    <div class="card-body">
      		        <p><span class="badge badge-pill badge-danger">Serviço Indisponível</span></p>   	
      		    </div>	
      		<?php endif; ?>
      		</div>
      	</div>
      </div>

     <footer class="pt-4 my-md-5 pt-md-5 border-top">
        <div class="row">
          <div class="col-12 col-md">
            <img class="mb-2" src="images/bootstrap-solid.svg" alt="" width="24" height="24">
            <small class="d-block mb-3 text-muted">&copy; <?php echo date('Y'); ?></small>
          </div>
        </div>
      </footer>
  	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

