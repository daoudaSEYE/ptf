<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>Laravel</title>
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
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- //meta tags -->
	<!-- Stylesheets -->
	<!-- AJAX CRUD -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" >
        <!-- sweetalert-->
        <!-- datatables cdn-->
        <link href="{{asset('css/crud/jquery.dataTables.min.css')}}" rel="stylesheet">


        <!--start of scripts-->
        <!--jquery-->
        <script src="{{asset('js/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/crud/jquery.dataTables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/crud/bootstrap.min.js')}}" type="text/javascript"></script>
       <!-- AJAX CRUD -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/css/animate.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/owl.carousel.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/style.css') }}" rel="stylesheet" media="screen">
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<link href="{{ asset('css/upload/blueimp-gallery.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/upload/jquery.fileupload.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/upload/jquery.fileupload-ui.min.css') }}" rel="stylesheet" media="screen">

</head>
<body>
	<!-- Header + nav + preloader -->
@include('includes/header/header')


	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/page-top-bg.jpg">
		<div class="container text-white">
  @if(session()->get('success'))
    <label class="row col-md-12 alert alert-success">
      {{ session()->get('success') }}  
    </label>
  @endif
		<h2>Panel Admin
		</h2>
            @if (Route::has('login'))
                    @auth
						<a  href="/admin">
								<i class="fa fa-user-circle-o"></i>
							Panel Admin
						</a>
						 |
						<a  href="/logout">
								<i class="fa fa-power-circle-o"></i>
							Deconnexion
						</a>
					@else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
            @endif
		</div>
	</section>
	<!--  Page top end -->
	<!-- Breadcrumb -->
	<div class="site-breadcrumb">
		<div class="container">
			<a href="/"><i class="fa fa-home"></i>Acceuil</a>
			<span><i class="fa fa-angle-right"></i>Panel Admin</span>
		</div>
	</div>

	<!-- page -->
	<section class="page-section blog-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
<div class="container">
<label class="btn btn-info ml-3" id="create-new-user">Ajouter Nouveau</label>

    <h2 align="center">Liste de toutes mes Offres</h2>
    <table class="table table-bordered" id="table">
        <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Addresse</th>
			<th>Categorie</th>
			<th>Prix</th>
			 <th>Action</th>
        </tr>
        </thead>
    </table>
</div>
 



				</div>
			</div>
		</div>
	</section>
	<!-- page end -->


	<!-- Clients section -->
	<div class="clients-section">
		<div class="container">
			<div class="clients-slider owl-carousel">
				<a href="#">
					<img src="img/partner/1.png" alt="P.T.F Immo">
				</a>
				<a href="#">
					<img src="img/partner/2.png" alt="P.T.F Immo">
				</a>
				<a href="#">
					<img src="img/partner/3.png" alt="P.T.F Immo">
				</a>
				<a href="#">
					<img src="img/partner/4.png" alt="P.T.F Immo">
				</a>
				<a href="#">
					<img src="img/partner/5.png" alt="P.T.F Immo">
				</a>
			</div>
		</div>
	</div>
	<!-- Clients section end -->
	<!-- Footer -->
@include('includes/footer/footer')
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userCrudModal"></h4>
    </div>
    <div class="modal-body">
        <form method="POST"   action="{{ url('admin/store') }}" data-parsley-validate id="userForm" name="userForm" class="form-horizontal">
           @csrf
		   <input  type="hidden" name="id" id="id">
            <div class="form-group">
                <label for="nom" class="col-sm-2 control-label">nom</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter Name" value="" maxlength="50" required="">
                </div>
            </div>
 
            <div class="form-group">
                <label class="col-sm-2 control-label">categorie</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Enter Email" value="" required="">
                </div>
            </div>
			 <div class="form-group">
                <label class="col-sm-2 control-label">addresse</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="addresse" name="addresse" placeholder="Enter Email" value="" required="">
                </div>
            </div>
			 <div class="form-group">
                <label class="col-sm-2 control-label">prix</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="prix" name="prix" placeholder="Enter Email" value="" required="">
                </div>
            </div>
			 <div class="form-group">
                <label class="col-sm-2 control-label">superficie</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="superficie" name="superficie" placeholder="Enter Email" value="" required="">
                </div>
            </div>
			 <div class="form-group">
                <label class="col-sm-2 control-label">Chambre</label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="chambre" name="chambre" placeholder="Enter Email" value="" required="">
                </div>
            </div>
            <div class="col-sm-offset-2 col-sm-10">
             <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save changes
             </button>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        
    </div>
</div>
</div>
</div>


<div class="modal fade" id="ajax-upload-modal" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title" id="userUploadModal"></h4>
    </div>
    <div class="modal-body">
    <div class="alert alert-info">La taille limite des images est de 2M</div>
    <form id="fileupload" action="{{ route('pictures.store') }}" method="post" enctype="multipart/form-data">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Ajouter...</span>
                    <input type="file" name="files[]" multiple>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Uploader</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Annuler l'upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Supprimer</span>
                </button>
                <input type="checkbox" class="toggle">
                <!-- The global file processing state -->
                <span class="fileupload-process"></span>
            </div>
            <!-- The global progress state -->
            <div class="col-lg-5 fileupload-progress fade">
                <!-- The global progress bar -->
                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                </div>
                <!-- The extended global progress state -->
                <div class="progress-extended">&nbsp;</div>
            </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
    </form>
    <!-- The blueimp Gallery widget -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
        <div class="slides"></div>
        <h3 class="title"></h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <a class="play-pause"></a>
        <ol class="indicator"></ol>
    </div>
    @include('_partials.x-template')
    </div>
    <div class="modal-footer">
        
    </div>
</div>
</div>
</div>
<script>
    $(function() {
        $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ url('admin') }}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'nom', name: 'nom' },
                { data: 'categorie', name: 'categorie' },
               { data: 'addresse', name: 'addresse' },
               { data: 'prix', name: 'prix' },
			    {data: 'action', name: 'action'}
               ],
        order: [[0, 'desc']]
        });

		
 /*  When user click add user button */
    $('#create-new-user').click(function () {
        $('#btn-save').val("create-user");
        $('#id').val('');
        $('#userForm').trigger("reset");
        $('#userCrudModal').html("Add New User");
        $('#ajax-crud-modal').modal('show');
    });
 
   /* When click edit user */
    $('body').on('click', '#edit-user', function () {
      var id = $(this).data('id');
      $.get('admin/edit/'+id, function (data) {
         $('#name-error').hide();
         $('#email-error').hide();
         $('#userCrudModal').html("Modifier l'offre");
          $('#btn-save').val("edit-user");
          $('#ajax-crud-modal').modal('show');
          $('#id').val(data.id);
          $('#nom').val(data.nom);
          $('#categorie').val(data.categorie);
          $('#addresse').val(data.addresse);
          $('#prix').val(data.prix);
          $('#superficie').val(data.superficie);
          $('#chambre').val(data.chambre);
      })
   });
   /* When click edit user */
    $('body').on('click', '#upload', function () {
      var id = $(this).data('id');
      $.get('upload/', function (data) {
         $('#userUploadModal').html("Ajouter Image");
          $('#btn-save').val("edit-user");
          $('#ajax-upload-modal').modal('show');
          // $('#id').val(data.id);
      })
   });
    $('body').on('click', '#delete-user', function () {
 
        var id = $(this).data("id");
        confirm("Etes vous sure de vouloir le supprimer !");
 // alert();
        $.ajax({
            type: "get",
            url: '{{ url('admin') }}'+"/delete/"+id,
            success: function (data) {
            var oTable = $('#laravel_datatable').dataTable(); 
            oTable.fnDraw(false);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });		
// if ($("#userForm").length > 0) {
      // $("#userForm").submit({
 
     // submitHandler: function(form) {
 
      // var actionType = $('#btn-save').val();
      // $('#btn-save').html('Sending..');
      
      // $.ajax({
          // data: $('#userForm').serialize(),
          // url: '{{ url('admin') }}'+"/store",
          // type: "POST",
          // dataType: 'json',
          // success: function (data) {
 
              // $('#userForm').trigger("reset");
              // $('#ajax-crud-modal').modal('hide');
              // $('#btn-save').html('Save Changes');
              // var oTable = $('#laravel_datatable').DataTable();
              // oTable.fnDraw(false);
              
          // },
          // error: function (data) {
              // console.log('Error:', data);
              // $('#btn-save').html('Save Changes');
          // }
      // });
    // }
  // })
// }		
    });
</script>
	<!--====== Javascripts & Jquery ======-->
<script src="{{ asset('js/owl.carousel.min.js') }}" defer></script> 
  <script src="{{ asset('js/masonry.pkgd.min.js') }}" defer></script> 
  <script src="{{ asset('js/magnific-popup.min.js') }}" defer></script> 
  <script src="{{ asset('js/main.js') }}" defer></script> 


    <script src="{{ asset('js/vendor/jquery.ui.widget.min.js') }}"></script>
    <script src="{{ asset('js/upload/tmpl.min.js') }}"></script>
    <script src="{{ asset('js/upload/load-image.all.min.js') }}"></script>
<script src="{{ asset('js/upload/canvas-to-blob.min.js') }}"></script>
        <script src="{{ asset('js/upload/jquery.blueimp-gallery.min.js') }}"></script>
    <script src="{{ asset('js/upload/jquery.iframe-transport.min.js') }}"></script>
    <script src="{{ asset('js/upload/jquery.fileupload.min.js') }}"></script>
    <script src="{{ asset('js/upload/jquery.fileupload-process.min.js') }}"></script>
    <script src="{{ asset('js/upload/jquery.fileupload-image.min.js') }}"></script>
    <script src="{{ asset('js/upload/jquery.fileupload-validate.min.js') }}"></script>
    <script src="{{ asset('js/upload/jquery.fileupload-ui.min.js') }}"></script>
 <script src="{{ asset('js/app.js') }}"></script>
 </body>
</html>
