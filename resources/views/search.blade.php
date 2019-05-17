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
        <title>P.T.F Immo | recherche</title>
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
				<div class="col-lg-8 single-list-page">
			@foreach($searchs as $search)
				<div class="col-lg-6 col-md-6">
					<!-- feature -->
					<div class="feature-item">
						<div class="feature-pic set-bg" data-setbg="img/feature/1.jpg">
							@if($search->categorie === "vente")
								<div class="sale-notic">{{$search->categorie}}</div>
							@elseif($search->categorie === "location")
								<div class="rent-notic">{{$search->categorie}}</div>	
							@endif()
							<?php
							$now   = time();
							$dateEvent = strtotime($search->created_at);
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
								<h5>{{$search->nom}}</h5>
								<p><i class="fa fa-map-marker"></i> {{$search->addresse}}</p>
											<?php if($search->categorie==="location"):?>
												<?php
													$now   = strtotime(date('y-m-d'));
													$explode=explode('-',$search->created_at);
													$explodeDay=explode(' ',$explode[2]);
													$created_at=$explode[0]."-".$explode[1]."-".$explodeDay[0];
													$offer_end=date('y-m-d', strtotime($created_at."+ ".$search->temps_location." day"));
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
								<a href="/{{$search->ref}}" class="col-md-8 col-xs-8 room-price">{{$search->prix}} FCFA
									@if($search->categorie === "location")
										/ Mois
									@endif()
								</a>
								<a href="/{{$search->ref}}" class="col-md-4 col-xs-4  consulter-feature">consulter</a>
							</div>
							</div>
					</div>
				</div>
				@endforeach
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
   
      <div class="row pull-right">
       <label>
        {!! $searchs->links() !!}
       </label>
      </div>
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
				</div>
				<!-- sidebar -->
				<div class="col-lg-4 col-md-7 sidebar">
					<div class="related-properties">
						<h2>Vous pourriez rechercher</h2>
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

  </body>
</html>
