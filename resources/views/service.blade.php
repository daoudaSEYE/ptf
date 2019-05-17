<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>P.T.F Immo | Nos services</title>
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
			<h2>NOS SERVICES</h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="/"><i class="fa fa-home"></i>Acceuil</a>
			<span><i class="fa fa-angle-right"></i>Nos services</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section">
		<div class="container">
			<div class="row about-text">
				<div class="col-md-1 blog-share">
					<h5  style="display:none;">Share</h5>
					<div style="display:none;" class="share-links">
						<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
						<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
						<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
						<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
						<a href="#" class="pin"><i class="fa fa-thumb-tack"></i></a>
					</div>
				</div>
				<div class="col-md-10 singel-blog-content">
					<img src="img/blog/single-blog.jpg" alt="P.T.F Immo">
					<p>P.T.F Immo, agence immobilière basée à Saly (Mbour, Sénégal), quartier Saly Tapé, en face Hôtel Rhino, vous accompagne, particuliers, propriétaires et professionnels, à travers divers services immobiliers, suivant la législation sénégalaise.
Nous intervenons aussi dans la location ou la vente d’appartements, de studios, de villas, de terrains, ou de tout autre bien.
</p>
					<p>
					Nous sommes disposés à faire bénéficier de notre expertise sécurisante :
					</p>
					<div class="row justify">
					<div class="col-md-6 col-xl-6 ">
						<ul>
							<li><i class="fa fa-check-circle-o"></i>A vous qui cherchez à devenir propriétaires ou locataires d’un bien immobilier, </li>
							<li><i class="fa fa-check-circle-o"></i>A vous qui êtes propriétaires d’un immeuble bâti sur un titre foncier (TF), et souhaitez disposer d’un règlement de copropriété aux fins de vendre vos appartements et studios, suivant les règles de l’art,</li>
							<li><i class="fa fa-check-circle-o"></i>Aux héritiers légalement déclarés comme tels dans des affaires de succession, pour vos procès-verbaux de partage successoraux, </li>
						</ul>
					</div>
					<div class="col-md-6 col-xl-6 ">
						<ul>
							<li><i class="fa fa-check-circle-o"></i>Vos demandes, de bail, de cession définitive afin de devenir plein propriétaire au lieu d’un simple locataire (titulaire d’un bail) ou permissionnaire (titulaire d’un acte administratif délivré par la mairie).</li>
							<li><i class="fa fa-check-circle-o"></i>Vos demandes de Certificat d’urbanisme, </li>
							<li><i class="fa fa-check-circle-o"></i>A vous industriels ou promoteurs immobiliers, désireux d’acquérir des terrains de grandes superficies </li>
						</ul>
					</div>
					</div>
					
					
					<blockquote>
					Aliance d'une longue experience et d'un savoir-faire pour la sécurité de votre investissement.
					</blockquote>
					
				</div>
			</div>
		</div>
	</section>
	<!-- page end -->

	<section class="page-section blog-page" style="margin-top:-130px;">
		<div class="container">
			<div class="row">
				<!-- blog post -->
				<div class="col-lg-3 col-md-6 blog-item">
					<img src="img/blog/1.jpg" alt="P.T.F Immo">
					<h5><a href="/service">Conseil & Gérance</a></h5>
					<p class="justify">Vous etes coproprietaire ou etes a la recherche de biens immobiliers ? Beneficier de notre expertise en gestion de co propriete.</p>
				</div>
				<!-- blog post -->
				<div class="col-lg-3 col-md-6 blog-item">
					<img src="img/blog/2.jpg" alt="P.T.F Immo">
					<h5><a href="/service">Achat</a></h5>
					<p class="justify">Vous etes coproprietaire ou etes a la recherche de biens immobiliers ? Beneficier de notre expertise en gestion de co propriete.</p>
				</div>
				<!-- blog post -->
				<div class="col-lg-3 col-md-6 blog-item">
					<img src="img/blog/3.jpg" alt="P.T.F Immo">
					<h5><a href="/location">Location</a></h5>
					<p class="justify">Vous etes a la recherche d'une terrain, villa, maison ou d'un appartement a louer ou a vendr?..</p>
				</div>			
				<!-- blog post -->
				<div class="col-lg-3 col-md-6 blog-item">
					<img src="img/blog/4.jpg" alt="P.T.F Immo">
					<h5><a href="/vente">Vente</a></h5>
					<p class="justify">Vous possedez un ou plusieurs bins immobiliers que vous souhaiter faire gerer ? Decouvrer notre service.</p>
				</div>
				
			</div>
		</div>
	</section>
	<!-- page end -->


	<!-- Footer -->
@include('includes/footer/footerHead')
<ul>
	@foreach($lieux as $l)
		<li><a href="/{{$l->nom}}">{{$l->nom}}</a></li>
	@endforeach
</ul>
<ul>
	@foreach($lieux as $l)
		<li><a href="/{{$l->nom}}">{{$l->nom}}</a></li>
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
