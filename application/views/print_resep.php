<!DOCTYPE html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	  <title>Assignment | Feiruz Mei Putra</title>

	  <!-- Site favicon -->
	  <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/') ?>vendors/images/apple-touch-icon.png">
	  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/') ?>vendors/images/favicon-32x32.png">
	  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/') ?>vendors/images/favicon-16x16.png">

	  <!-- Mobile Specific Metas -->
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	  <!-- Google Font -->
	  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	  <!-- CSS -->
	  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendors/styles/core.css">
	  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendors/styles/icon-font.min.css">
	  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>src/plugins/datatables/css/dataTables.bootstrap4.min.css">
	  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>src/plugins/datatables/css/responsive.bootstrap4.min.css">
	  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>vendors/styles/style.css">

	  <!-- Global site tag (gtag.js) - Google Analytics -->
	  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	  <script>
	    window.dataLayer = window.dataLayer || [];
	    function gtag(){dataLayer.push(arguments);}
	    gtag('js', new Date());

	    gtag('config', 'UA-119386393-1');
	  </script>
	</head>
	<!-- <body style="font-size: 15px"> -->
	<body style="font-size: 15px" onload="window.print();"> 
		<div class="wrapper" style="margin-top: 15px; margin-left: 70px;margin-right: 70px">

	  	<div class="invoice-wrap">
				<div class="invoice-box">
					<div class="invoice-header">
						<div class="logo text-center">
							<img src="vendors/images/deskapp-logo.png" alt="">
						</div>
					</div>
					<h4 class="text-center mb-30 weight-600">RESEP OBAT</h4>
					<div class="row pb-30">
						<div class="col-md-6">
							<h5 class="mb-15"><?= $resep[0]->resep_jenis ?></h5>
							<p class="font-14 mb-5">Tanggal Resep : <strong class="weight-600"><?= substr($resep[0]->resep_create,6,2).'/'.substr($resep[0]->resep_create,4,2).'/'.substr($resep[0]->resep_create,0,4); ?></strong></p>
						</div>
					</div>
					<div class="invoice-desc pb-30">
						<div class="invoice-desc-head clearfix">
							<div class="invoice-sub">Nama Obat</div>
							<div class="invoice-rate">Signa</div>
							<div class="invoice-hours">Resep</div>
							<div class="invoice-hours">Quantity</div>
						</div>
						<div class="invoice-desc-body">
							<ul>
								<li class="clearfix">
									<div class="invoice-sub"><?= $resep[0]->resep_name ?></div>
									<div class="invoice-rate"><?= $resep[0]->resep_signa ?></div>
									<div class="invoice-hours"><?= $resep[0]->resep_obat ?></div>
									<div class="invoice-hours"><?= $resep[0]->resep_qty ?></div>
								</li>
							</ul>
						</div>
					</div>
					<h4 class="text-center pb-20">Terima Kasih</h4>
				</div>
			</div>

		</div>
	</body>
</html>

<style type="text/css">
	@media screen {
	  div.divFooter {
	    display: none;
	  }
	}
	@media print {
	  div.divFooter {
	    position: fixed;
	    bottom: 0;
	  }
	}
	@page {
	    size: auto;   /* auto is the initial value */
	    margin: 0;  /* this affects the margin in the printer settings */
	}
</style>