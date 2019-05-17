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
        <title>P.T.F Immo | Nos offres</title>
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
<meta name="category" content="listing">
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
			<span><i class="fa fa-angle-right"></i>Toute nos offres</span>
		</div>
	</div>
	<div class="row col-md-12 ">
  @if(session()->get('error'))
    <label class="row col-md-12 alert alert-danger">
      {{ session()->get('error') }}  
    </label>
  @else
    <label class="row col-md-12 alert alert-success">
      {{ session()->get('success') }}  
    </label>
  @endif
		<h2 >Toute nos offres</h2>
	</div>
 <!--   <div class=" col-md-12">
      <label width="5%" class="sorting" data-sorting_type="asc" data-column_name="id" style="cursor: pointer">ID <span id="id_icon"></span></label>
       <label width="38%" class="sorting" data-sorting_type="asc" data-column_name="nom" style="cursor: pointer">Title <span id="post_title_icon"></span></label>
       
    </div>-->
	<!-- page -->
	<section class="page-section listings-page">
		<div class="container">
			<div class="row">
			@foreach($listings as $listing)
				<div class="col-lg-4 col-md-6">
					<!-- feature -->
					<div class="feature-item">
						<div class="feature-pic set-bg" data-setbg="img/feature/1.jpg">
							@if($listing->categorie === "vente")
								<div class="sale-notic">{{$listing->categorie}}</div>
							@elseif($listing->categorie === "location")
								<div class="rent-notic">{{$listing->categorie}}</div>	
							@endif()
							<?php
							$now   = time();
							$dateEvent = strtotime($listing->created_at);
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
								<h5>{{$listing->nom}}</h5>
								<p><i class="fa fa-map-marker"></i> {{$listing->addresse}}</p>
											<?php if($listing->categorie==="location"):?>
												<?php
													$now   = strtotime(date('y-m-d'));
													$explode=explode('-',$listing->created_at);
													$explodeDay=explode(' ',$explode[2]);
													$created_at=$explode[0]."-".$explode[1]."-".$explodeDay[0];
													$offer_end=date('y-m-d', strtotime($created_at."+ ".$listing->temps_location." day"));
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
								<a href="/{{$listing->ref}}" class="col-md-8 col-xs-8 room-price">{{$listing->prix}} FCFA
									@if($listing->categorie === "location")
										/ Mois
									@endif()
								</a>
								<a href="/{{$listing->ref}}" class="col-md-4 col-xs-4  consulter-feature">consulter</a>
							</div>
							</div>
					</div>
				</div>
				@endforeach
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="id" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
   
			</div>
      <div class="row pull-right">
       <label>
        {!! $listings->links() !!}
       </label>
      </div>
		</div>
	</section>
	<!-- page end -->


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
<script type="text/javascript">
$(document).ready(function(){

 function clear_icon()
 {
  $('#id_icon').html('');
  $('#post_title_icon').html('');
 }

 function fetch_data(page, sort_type, sort_by, query)
 {
  $.ajax({
   url:"/pagination/fetch_data?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
   success:function(data)
   {
    $('tbody').html('');
    $('tbody').html(data);
   }
  })
 }

 $(document).on('keyup', '#serach', function(){
  var query = $('#serach').val();
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();
  var page = $('#hidden_page').val();
  fetch_data(page, sort_type, column_name, query);
 });

 $(document).on('click', '.sorting', function(){
  var column_name = $(this).data('column_name');
  var order_type = $(this).data('sorting_type');
  var reverse_order = '';
  if(order_type == 'asc')
  {
   $(this).data('sorting_type', 'desc');
   reverse_order = 'desc';
   clear_icon();
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-bottom"></span>');
  }
  if(order_type == 'desc')
  {
   $(this).data('sorting_type', 'asc');
   reverse_order = 'asc';
   clear_icon
   $('#'+column_name+'_icon').html('<span class="glyphicon glyphicon-triangle-top"></span>');
  }
  $('#hidden_column_name').val(column_name);
  $('#hidden_sort_type').val(reverse_order);
  var page = $('#hidden_page').val();
  var query = $('#serach').val();
  fetch_data(page, reverse_order, column_name, query);
 });

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  var page = $(this).attr('href').split('page=')[1];
  $('#hidden_page').val(page);
  var column_name = $('#hidden_column_name').val();
  var sort_type = $('#hidden_sort_type').val();

  var query = $('#serach').val();

  $('li').removeClass('active');
        $(this).parent().addClass('active');
  fetch_data(page, sort_type, column_name, query);
 });

});
</script>
  </body>
</html>
