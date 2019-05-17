@extends('layouts.app')

@section('content')
	<section class="page-section blog-page">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="contact-right">
						<div class="section-title">
							<h3>Se connecter</h3>
						</div>
						<form method="POST"  action="{{ route('login') }}" data-parsley-validate>
							@csrf
							<div class="row">
								<div class="col-md-12">
									<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Entrer votre addresse Email" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
								</div>
								<div class="col-md-12">
									<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="********" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
								</div>
								<div class="row">
								 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
								</div>
								<div class="col-md-12">
									<button type="submit" class="site-btn">{{ __('Se connecter') }}</button>
								@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié?') }}
                                    </a>
                                @endif
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
