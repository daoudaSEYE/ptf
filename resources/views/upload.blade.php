@extends('_layouts.default')

@section('title', 'Pictures')

@section('css')
<link href="{{ asset('css/upload/blueimp-gallery.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/upload/jquery.fileupload.min.css') }}" rel="stylesheet" media="screen">
<link href="{{ asset('css/upload/jquery.fileupload-ui.min.css') }}" rel="stylesheet" media="screen">

	<!-- Stylesheets -->
	<!-- AJAX CRUD -->

        <!--start of scripts-->
        <!--jquery-->
<!-- AJAX CRUD -->
  <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" media="screen">

@endsection

@section('header')
    <i class="fa fa-picture-o"></i> Pictures
@endsection

@section('breadcrumbs')
    <li><span>Pictures</span></li>
@endsection

@section('content')
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
    <div class="alert alert-info">Max upload size is 2M, only images allowed</div>
    <form id="fileupload" action="{{ route('pictures.store') }}" method="post" enctype="multipart/form-data">
        @csrf
		<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                    <input type="file"  name="files[]" multiple>
                </span>
				    <input type="hidden" id="offreId" name="offreId" />
                
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
                <button type="button" class="btn btn-danger delete">
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
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
    </div>
    <div class="modal-footer">
        
    </div>
</div>
</div>
</div>


@endsection

@section('js')
    @include('_partials.x-template')


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
 

@endsection