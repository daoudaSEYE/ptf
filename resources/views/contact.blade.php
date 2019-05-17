<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>P.T.F Immo | Nous Contacter</title>
<!-- meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Daouda SEYE">
<meta name="identifier-url" content="http://daouda.webhostapp.com/">
<meta name="distribution" content="global">
<meta name="robots" content="all" />
<meta name="language" content="fr-FR" />
<meta name="category" content="categorie">
<meta name="description" content="description" />
<meta name="keywords" lang="FR" content="mots cles"/>
<meta name="geo.region" content="SN-DK" />
<meta name="geo.placename" content="Dakar" />
<meta name="geo.position" content="14.699585;-17.466233" />
<meta name="ICBM" content="14.699585, -17.466233" />
<!-- //meta tags -->
	<!-- Stylesheets -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/css/animate.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Header + nav + preloader -->
@include('includes/header/header')


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>Nous Contacter</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="/"><i class="fa fa-home"></i>Acceuil</a>
			<span><i class="fa fa-angle-right"></i>Nous Contacter</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section blog-page">
		<div class="container">
			<div id="map-canvas"></div>
			<div class="contact-info-warp">
				<p><i class="fa fa-map-marker"></i>SALY TAPEE, FACE RHINO HOTEL</p>
				<p><i class="fa fa-envelope"></i>contact@tpfimmo.com</p>
				<p><i class="fa fa-phone"></i> (+221) 33 957 59 34 - 77 734 03 83 - 70 640 60 87</p>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<img src="img/contact.jpg" alt="P.T.F Immo">
				</div>
				<div class="col-lg-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>Ptf Immo</h3>
						</div>
						<form class="contact-form">
							<div class="row">
								<p>
									P.T.F Immo, agence immobilière basée à Dakar au Sénégal, vous accompagne particuliers, propriétaire et professionnels à travers divers services immobiliers. Nous intervenons ainsi dans la location ou la vente d’appartement, de villas, terrains et autres biens.
								</p>
								<ul class="about-list">
						<li><i class="fa fa-check-circle-o"></i>Gestion locative : nous nous chargeons de l'administration de votre patrimoine immobilier.</li>
						<li><i class="fa fa-check-circle-o"></i>Comptabilité : Nous faisons mensuellement un compte rendu de vos avoirs pour preserver la confiance </li>
					</ul>
					<p><a href="/location" class="site-btn fs-submit">Nos locations</a> - <a href="/vente" class="site-btn fs-submit">Nos ventes</a>	</p>
				
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- page end -->


	<!-- Footer -->
@include('includes/footer/footerHead')
<ul>
	@foreach($firstFourPlaces as $first)
		<li><a href="/{{$first->nom}}">{{$first->nom}}</a></li>
	@endforeach
</ul>
<ul>
	@foreach($lastFourPlaces as $last)
		<li><a href="/{{$last->nom}}">{{$last->nom}}</a></li>
	@endforeach
</ul>
@include('includes/footer/footerBottom')
	<!--====== Javascripts & Jquery ======-->
  <script src="{{ asset('js/jquery-3.2.1.min.js') }}" defer></script> 
  <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> 
  <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script> 
  <script src="{{ asset('js/masonry.pkgd.min.js') }}" defer></script> 
  <script src="{{ asset('js/magnific-popup.min.js') }}" defer></script> 
  <script src="{{ asset('js/main.js') }}" defer></script> 
	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="{{ asset('js/map.js') }}" defer></script> 
  </body>
</html>
