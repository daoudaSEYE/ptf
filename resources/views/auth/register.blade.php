@extends('layouts.app')

@section('content')
	<section class="page-section blog-page">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<img src="img/contact.jpg" alt="">
				</div>
				<div class="col-lg-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>Creer un compte</h3>
						</div>
						<form method="POST"  action="{{ route('register') }}" id="contact_form" data-parsley-validate class="contact-form">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<input id="name" type="text" class="form-control col-lg-12{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Prenom & Nom" data-parsley-minlength="5" data-parsley-trigger="change" required="required" autofocus />
								@if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
								</div>
								<div class="col-md-6">
									<input id="email" type="email" class="form-control col-lg-12{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Votre Email" required="required" data-error="Email is required.">
								@if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
								</div>
								<div class="row">
								<input id="password" type="password" class="form-control  col-lg-6{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Mot de Passe" data-parsley-minlength="6" required="required" />
								  @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
								<input id="password-confirm" type="password" class="form-control col-lg-6" name="password_confirmation" class="form-control col-lg-6" placeholder="Confirmer mot de Passe" data-parsley-equalto="#password" required="required" />
								</div>
								<div class="col-md-12">
									<button type="submit" class="site-btn" id="register" for="register" name="register">{{ __('Creer') }}</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
