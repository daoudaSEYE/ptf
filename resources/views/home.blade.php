 <?php
 if(!function_exists('dateDiff'))
{
	function dateDiff($now, $dateEvent){
		$diff = abs($now - $dateEvent); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
		$retour = array();
	 
		$tmp = $diff;
		$retour['formatSecond'] = $tmp % 60;
		$retour['second'] = $retour['formatSecond']." S";
	 
		$tmp = floor( ($tmp - $retour['formatSecond']) /60 );
		$retour['formatMinute'] = $tmp % 60;
		$retour['minute'] = $retour['formatMinute']." M ";
	 
		$tmp = floor( ($tmp - $retour['formatMinute'])/60 );
		$retour['formatHour'] = $tmp % 24;
		$retour['hour'] = $retour['formatHour']." H ";
	 
		$tmp = floor( ($tmp - $retour['formatHour'])  /24 );
		
		if(($retour['day'] = $tmp) == 0 ){
			$retour['day'] = "";
		}else{
			 $retour['day'] = $tmp;
		}
		return $retour;
	}

}
 ?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>P.T.F Immo | Location, achat, vente, gérance</title>
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
	<!-- AJAX CRUD -->
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/crud/jquery.dataTables.min.css') }}" rel="stylesheet" media="screen">
  <script src="{{ asset('js/crud/jquery.js') }}" defer></script>
  <script src="{{ asset('js/crud/jquery.validate.js') }}" defer></script>   
    <script src="{{ asset('js/crud/jquery.dataTables.min.js') }}" defer></script> 
  <script src="{{ asset('js/crud/bootstrap.min.js') }}" defer></script> 
	<!-- AJAX CRUD -->
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
	<!-- Header + preloader -->
@include('includes/header/header')
	<!-- Hero section -->
	<section class="hero-section set-bg" data-setbg="img/bg.jpg">
		<div class="container hero-text text-white">
  @if(session()->get('error'))
    <label class="row col-md-12 alert alert-danger">
      {{ session()->get('error') }}  
    </label>
  @endif
  @if(session()->get('success'))
    <label class="row col-md-12 alert alert-success">
      {{ session()->get('success') }}  
    </label>
  @endif
			<h2>P.T.F Immo</h2>
			<h2>Partenaires du Titre Foncier</h2>
			<p>Avec ptf-immo trouvez, un appartement, un studio, une villa, des parcelles de terrains ou des terrains de grandes superficies (pour industriels ou promoteurs), avec rapidité et en toute simplicité.</p>
			<a href="/a-propos" class="site-btn">En savoir plus</a>
		</div>
	</section>
	<!-- Hero section end -->

	<!-- Filter form section -->
	<div class="filter-search">
		<div class="container">
			<form method="POST" class="filter-form"  action="{{ url('search') }}" data-parsley-validate>
			@csrf
				<input class="col-md-4 col-xs-4" type="text" id="search" name="search" placeholder="Taper votre recherche">
				<select class="col-md-4 col-xs-4" id="city" name="city">
				@foreach($lieux as $l)
					<option  value="{{$l->nom}}">{{$l->nom}}</option>
				@endforeach
				</select>
				<select class="col-md-4 col-xs-4" id="categorie" name="categorie">
					@foreach($categories as $categorie)
						<option  value="{{$categorie->nom}}">{{$categorie->nom}}</option>
				@endforeach
				</select>
				<button class="site-btn fs-submit">{{ __('Rechercher') }}</button>
			</form>
		</div>
	</div>
	<!-- Filter form section end -->



	<!-- Properties section -->
	<section class="properties-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>OFFRES RECENTS</h3>
				<p>Découvrez les dernières offres parues sur notre site.</p>
			</div>
			<div class="row">
			 @foreach($rencentListings as $rencentListing)
				<div class="col-md-6">
					<div class="propertie-item set-bg" data-setbg="img/propertie/1.jpg">
						@if($rencentListing->categorie === "location")
							<div class="sale-notic">{{$rencentListing->categorie}}</div>
						@elseif($rencentListing->categorie === "vente")
							<div class="rent-notic">{{$rencentListing->categorie}}</div>
						@endif()
							<a  href="{{$rencentListing->ref}}" class=" consulter pull-right">Consulter</a>
						<div class="propertie-info text-white">
							<div class="info-warp">
								<h5>{{$rencentListing->nom}}</h5>
								<p><i class="fa fa-map-marker"></i> {{$rencentListing->addresse}}</p>
							</div>
							<div class="price">{{$rencentListing->prix}} FCFA
								@if($rencentListing->categorie === "location")
								/ Mois
								@endif()
							</div>
						</div>
					</div>
				</div>
			@endforeach
			</div>
		</div>
	</section>
	<!-- Properties section end -->


	<!-- Services section -->
	<section class="services-section spad set-bg" data-setbg="img/service-bg.jpg">
		<div class="container">
					<h3 class="offset-lg-5 col-md-12" style="color:white;top:-50px;">NOS SERVICES</h3>
			<div class="row">
				<div class="col-lg-6">
					<img src="img/service.jpg" alt="P.T.F Immo">
				</div>
				<div class="col-lg-5 offset-lg-1 pl-lg-0">
					
					<div class="services">
						<div class="service-item">
							<i class="fa fa-comments"></i>
							<div class="service-text">
							<h5>Conseil & Gérance</h5>
								<p> Vous etes coproprietaire ou etes a la recherche de biens immobiliers ? Beneficier de notre expertise en gestion de co propriete</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-comments"></i>
							<div class="service-text">
							<h5>Achat</h5>
								<p> Vous etes coproprietaire ou etes a la recherche de biens immobiliers ? Beneficier de notre expertise en gestion de co propriete</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-home"></i>
							<div class="service-text">
								<h5>Location</h5>
								<p>Vous etes a la recherche d'une terrain, villa, maison ou d'un appartement a louer  ou a vendr?.</p>
							</div>
						</div>
						<div class="service-item">
							<i class="fa fa-briefcase"></i>
							<div class="service-text">
								<h5>Vente</h5>
								<p>Vous possedez un ou plusieurs bins immobiliers que vous souhaiter faire gerer ? Decouvrer notre service</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
				<a href="/service" class="site-btn pull-right">En savoir Plus</a>
				</div>
			</div>
		</div>
	</section>
	<!-- Services section end -->


	<!-- feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>Nos meilleurs Offres</h3>
			</div>
			<div class="row">
			@foreach($bestOffers as $bestOffer)
				<div class="col-lg-4 col-md-6">
					<!-- feature -->
					<div class="feature-item">
						<div class="feature-pic set-bg" data-setbg="img/feature/1.jpg">
							@if($bestOffer->categorie === "vente")
								<div class="sale-notic">{{$bestOffer->categorie}}</div>
							@elseif($bestOffer->categorie === "location")
								<div class="rent-notic">{{$bestOffer->categorie}}</div>	
							@endif()
							<?php
							$now   = time();
							$dateEvent = strtotime($bestOffer->created_at);
								// Test de la fonction
							$diff = dateDiff($now, $dateEvent);	
							?>
							<?php if($diff['day']<="20"):?>
							<div class="consulter pull-right">Nouveau</div>	
							<?php else:?>
							<?php endif;?>
						</div>
						<div class="feature-text">
							<div class="text-center feature-title">
								<h5>{{$bestOffer->nom}}</h5>
								<p><i class="fa fa-map-marker"></i> {{$bestOffer->addresse}}</p>
											<?php if($bestOffer->categorie==="location"):?>
												<?php
													$now   = strtotime(date('y-m-d'));
													$explode=explode('-',$bestOffer->created_at);
													$explodeDay=explode(' ',$explode[2]);
													$created_at=$explode[0]."-".$explode[1]."-".$explodeDay[0];
													$offer_end=date('y-m-d', strtotime($created_at."+ ".$bestOffer->temps_location." day"));
													$expiration_date=strtotime($offer_end);
													// Test de la fonction
													$diff = dateDiff($now, $expiration_date);
												?>
												<?php if($diff['day']>"0"):?>
												<p><i class="fa fa-user"></i>
													<label style="font-weight:bold;">Déja loué : Disponible dans <label style="color:red;"><?php echo $diff['day'];?> Jours</label></label>
												</p><?php else:?>
												<p><i class="fa fa-user"></i>
													<label style="font-weight:bold;">Disponible</label>
												</p><?php endif;?>
											<?php else:?>
												<p></br></br></p>
											<?php endif;?>
							</div>
							<div class="row">
								<a href="/{{$bestOffer->ref}}" class="col-md-8 col-xs-8 room-price">{{$bestOffer->prix}} FCFA
									@if($bestOffer->categorie === "location")
										/ Mois
									@endif()
								</a>
								<a href="/{{$bestOffer->ref}}" class="col-md-4 col-xs-4  consulter-feature">consulter</a>
							</div>
							</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- feature section end -->



	<!-- feature category section -->
	<section class="feature-category-section spad">
		<div class="container">
			<div class="section-title text-center">
				<h3>NOS ESPACES</h3>
				<p>Quelles genre de propriétes recherchez-vous? Nous pouvons vous aider.</p>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/1.jpg" alt="P.T.F Immo">
					<h5>Appartements</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/2.jpg" alt="P.T.F Immo">
					<h5>Villas</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/3.jpg" alt="P.T.F Immo">
					<h5>Studios</h5>
				</div>
				<div class="col-lg-3 col-md-6 f-cata">
					<img src="img/feature-cate/4.jpg" alt="P.T.F Immo">
					<h5>Terrains</h5>
				</div>
			</div>
		</div>
	</section>
	<!-- feature category section end-->



	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				@foreach($lieux as $lieu)
					<label ><h3 style="color:white;">{{$lieu->nom}}</h3></label>
				@endforeach
			</div>
		</div>
	</div>
	<!-- Clients section end -->
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
