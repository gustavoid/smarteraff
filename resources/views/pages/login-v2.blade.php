@extends('layouts.empty', ['paceTop' => true])

@section('title', 'Login Page')

@section('content')
	<!-- begin login-cover -->
	<div class="login-cover">
		<div class="login-cover-image" style="background-image: url(/assets/img/login-bg/login-bg-16.jpg)" data-id="login-cover-image"></div>
		<div class="login-cover-bg"></div>
	</div>
	<!-- end login-cover -->
	
	<!-- begin login -->
	<div class="login login-v2" data-pageload-addclass="animated fadeIn">
		<!-- begin brand -->
		<div class="login-header">
			<div class="brand">
				<span class="logo"></span> <b>Smarter</b> Aff
				<!-- <small>responsive bootstrap 4 admin template</small> -->
			</div>
			<div class="icon">
				<i class="fa fa-lock"></i>
			</div>
		</div>
		<!-- end brand -->
		<!-- begin login-content -->
		<div class="login-content">
			<form action="{{ route('login') }}" method="POST" class="margin-bottom-0">
				@csrf
				<div class="form-group m-b-20">
					<input id="email" type="email" name="email" class="form-control form-control-lg inverse-mode  @error('email') is-invalid @enderror" placeholder="Email Address"  value="{{ old('email') }}" required />
								@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
				</div>
				<div class="form-group m-b-20">
					<input type="password" class="form-control form-control-lg inverse-mode @error('password') is-invalid @enderror" name="password" placeholder="Password" required />		
							@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
				</div>
				<div class="checkbox checkbox-css m-b-20">
				<input type="checkbox" id="remember_checkbox" {{ old('remember') ? 'checked' : '' }}/> 
					<label for="remember_checkbox">
						Remember Me
					</label>
				</div>
				<div class="login-buttons">
					<button type="submit" class="btn btn-success btn-block btn-lg">Sign me in</button>
				</div>
				<div class="m-t-20">
					Not a member yet? Click here to register.
				</div>
			</form>
		</div>
		<!-- end login-content -->
	</div>
	<!-- end login -->
	
	<!-- begin login-bg -->
	
	<!-- end login-bg -->
@endsection

@push('scripts')
	<script src="/assets/js/demo/login-v2.demo.js"></script>
@endpush
