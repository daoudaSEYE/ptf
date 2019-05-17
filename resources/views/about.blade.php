<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>P.T.F Immo | A propos de nous</title>
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
<link href="{{ asset('css/font-awesome.min') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/css/animate.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<!-- Header + nav +preloader -->
@include('includes/header/header')


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
			<h2>A propos de nous</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="/"><i class="fa fa-home"></i>Acceuil</a>
			<span><i class="fa fa-angle-right"></i>A propos de nuos</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section">
		<div class="container">
			<img class="mb-5" src="img/about.jpg" alt="P.T.F Immo">
			<div class="row about-text">
				<div class="col-xl-6 about-text-left">
					<h5>A PROPOS DE NOUS</h5>
					<p style="text-align:justify;">P.T.F Immo, agence immobilière basée à Saly (Mbour, Sénégal), quartier Saly Tapé, en face Hôtel Rhino, vous accompagne, particuliers, propriétaires et professionnels, à travers divers services immobiliers, suivant la législation sénégalaise.
Nous intervenons aussi dans la location ou la vente d’appartements, de studios, de villas, de terrains, ou de tout autre bien.
.</p>
				<p><a href="/location" class="site-btn fs-submit">Nos locations</a> - <a href="/vente" class="site-btn fs-submit">Nos ventes</a>	</p>
				</div>
				<div class="col-xl-6 about-text-right">
					<h5>POURQUOI NOUS FAIRE CONFIANCE</h5>
					<p>Nous sommes disposés à faire bénéficier de notre expertise sécurisante :</p>
					<div class="row justify">
					<div class="col-md-6 col-xl-6">
					<ul class="about-list">
						<li><i class="fa fa-check-circle-o"></i><strong>*</strong> A vous qui cherchez à devenir propriétaires ou locataires d’un bien immobilier, </li>
							<li><i class="fa fa-check-circle-o"></i><strong>*</strong> A vous qui êtes propriétaires d’un immeuble bâti sur un titre foncier (TF), et souhaitez disposer d’un règlement de copropriété aux fins de vendre vos appartements et studios, suivant les règles de l’art,</li>
							<li><i class="fa fa-check-circle-o"></i><strong>*</strong> Aux héritiers légalement déclarés comme tels dans des affaires de succession, pour vos procès-verbaux de partage successoraux, </li>
						</ul>
					</div>
					<div class="col-md-6 col-xl-6">
					<ul class="about-list">
						<li><i class="fa fa-check-circle-o"></i><strong>*</strong> Vos demandes, de bail, de cession définitive afin de devenir plein propriétaire au lieu d’un simple locataire (titulaire d’un bail) ou permissionnaire (titulaire d’un acte administratif délivré par la mairie).</li>
							<li><i class="fa fa-check-circle-o"></i><strong>*</strong> Vos demandes de Certificat d’urbanisme, </li>
							<li><i class="fa fa-check-circle-o"></i><strong>*</strong> A vous industriels ou promoteurs immobiliers, désireux d’acquérir des terrains de grandes superficies </li>
						</ul>
					</div>
					</div>

				</div>
			</div>
		</div>
		
		<!-- Review section -->
		<section class="review-section set-bg" data-setbg="img/review-bg.jpg">
			<div class="container">
				<div class="review-slider owl-carousel">
					<div class="review-item text-white">
						<div class="rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						<h5>Abdoulaye DIOUF</h5>
						<span>Gérant P.T.F Immo</span></br>
						<span>Ancien agent des Bureaux  de conservation de la propriété et des droits fonciers de Dakar et de Grand Dakar.</br>
						Ancien Clerc de Notaire a :</br>
						Etude Me Serigne Mbaye BADIANE (Dakar)</br>
						Etude Me Khady SOSSEH NIANG (Saly)</span>
						<span>13 années de conservations foncieres General & 11 années de cléricature</span>
						
						<div class="clint-pic set-bg" data-setbg="img/review/1.jpg"></div>
					</div>
				</div>
			</div>
		</section>
		<!-- Review section end-->


		<!-- Team section -->
		<section class="team-section spad pb-0">
			<div class="container">
				
			</div>
		</section>
		<!-- Team section end-->
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
  </body>
</html>
