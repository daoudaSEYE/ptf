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
        <title>P.T.F Immo | Nos Offres</title>
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
			<h2></h2>
		</div>
	</section>
	<!--  Page top end -->

	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="/"><i class="fa fa-home"></i>Acceuil</a>
			<span><i class="fa fa-angle-right"></i>Offre</span>
		</div>
	</div>

	<!-- Page -->
	<section class="page-section">
		<div class="container">
			<div class="row">
				@foreach($offers as $offer)
				<div class="col-lg-8 single-list-page">
					<div class="single-list-slider owl-carousel" id="sl-slider">
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/1.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/2.jpg">
							<div class="rent-notic">FOR Rent</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/3.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/4.jpg">
							<div class="rent-notic">FOR Rent</div>
						</div>
						<div class="sl-item set-bg" data-setbg="img/single-list-slider/5.jpg">
							<div class="sale-notic">FOR SALE</div>
						</div>
					</div>
					<div class="owl-carousel sl-thumb-slider" id="sl-slider-thumb">
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/1.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/2.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/3.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/4.jpg"></div>
						<div class="sl-thumb set-bg" data-setbg="img/single-list-slider/5.jpg"></div>
					</div>
					<div class="single-list-content">
						<div class="row">
							<div class="col-xl-8 sl-title">
								<h2>{{$offer->nom}}</h2>
								<p><i class="fa fa-map-marker"></i>{{$offer->addresse}} / {{$offer->ref}}</p>
							</div>
							<div class="col-xl-4">
								<a href="#" class="price-btn">{{$offer->prix}} FCFA
								@if($offer->categorie = "location")
								</br>/ Mois
								@endif</a>
							</div>
						</div>
						<h3 class="sl-sp-title">Details</h3>
						<div class="row property-details-list">
							<div class="col-md-4 col-sm-6">
										<?php if($offer->categorie==="location"):?>
												<?php
													$now   = strtotime(date('y-m-d'));
													$explode=explode('-',$offer->created_at);
													$explodeDay=explode(' ',$explode[2]);
													$created_at=$explode[0]."-".$explode[1]."-".$explodeDay[0];
													$offer_end=date('y-m-d', strtotime($created_at."+ ".$offer->temps_location." day"));
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
							
						</div>
						<?php if($offer->categorie === "vente"):?>
						<h3 class="sl-sp-title bd-no">Plan</h3>
						<div id="accordion" class="plan-accordion">
							<div class="panel">
								<div class="panel-header" id="headingOne">
									<button class="panel-link active" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">First Floor: <span>660 sq ft</span>	<i class="fa fa-angle-down"></i></button>
								</div>
								<div id="collapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="P.T.F Immo">
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingTwo">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Second Floor:<span>610 sq ft.</span>	<i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse2" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="P.T.F Immo">
									</div>
								</div>
							</div>
							<div class="panel">
								<div class="panel-header" id="headingThree">
									<button class="panel-link" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">Third Floor :<span>580 sq ft</span>	<i class="fa fa-angle-down"></i>
									</button>
								</div>
								<div id="collapse3" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="panel-body">
										<img src="img/plan-sketch.jpg" alt="P.T.F Immo">
									</div>
								</div>
							</div>
						</div>
						<?php else:?>
						<?php endif;?>
						

						<h3 class="sl-sp-title bd-no">Video</h3>
						<div class="perview-video">
							<img src="img/video.jpg" alt="P.T.F Immo">
							<a href="https://www.youtube.com/watch?v=v13nSVp6m5I" class="video-link"><img src="img/video-btn.png" alt="P.T.F Immo"></a>
						</div>
						<h3 class="sl-sp-title bd-no">Localisation Google Maps</h3>
						<div class="pos-map" id="map-canvas"></div>
					</div>
				</div>
				@endforeach
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar">
					<div class="author-card">
						<div class="author-img set-bg" data-setbg="img/author.jpg"></div>
						<div class="author-info">
							<h5>P.T.F Immo</h5>
						</div>
						<div class="author-contact">
							<p><i class="fa fa-phone"></i>(+221) 33 957 54 34 / 77 734 03 83</p>
							<p><i class="fa fa-envelope"></i> conact@P.T.F Immo.com</p>
						</div>
					</div>
					<div class="related-properties">
						<h2>Offre(s) recente(s)</h2>
						@foreach($recents as $recent)
						<div class="rp-item">
							<div class="rp-pic set-bg" data-setbg="img/feature/1.jpg">
								@if($recent->categorie === "vente")
								<div class="sale-notic">{{$recent->categorie}}</div>
								@elseif($recent->categorie === "location")
									<div class="rent-notic">{{$recent->categorie}}</div>	
								@endif()
							</div>
							<div class="rp-info">
								<h5>{{$recent->nom}}</h5>
								<p><i class="fa fa-map-marker"></i>{{$recent->addresse}}</p>
							</div>
							<div class="row">
								<a href="/{{$recent->ref}}" class="col-md-8 col-xs-8 rp-price">{{$recent->prix}} FCFA
									@if($recent->categorie === "location")
										/ Mois
									@endif()
								</a>
								<a href="/{{$recent->ref}}" class="col-md-4 col-xs-4  rp-price-consulter">consulter</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Page end -->


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
	<!-- load for map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0YyDTa0qqOjIerob2VTIwo_XVMhrruxo"></script>
	<script src="{{ asset('js/map-2.js') }}" defer></script> 
  </body>
</html>
